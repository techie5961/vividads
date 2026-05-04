<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    // register
    public function Register(){
        return view('users.auth.register',[
            'ref' => request('ref','')
        ]);
    }
    // login 
    public function Login(){
        return view('users.auth.login');
    }
    // dashboard
    public function Dashboard(){
        $total_earned=DB::table('transactions')->whereNot('type','deposit')->where('class','credit')->where('user_id',Auth::guard('users')->user()->id)->sum('amount');
        $total_withdrawn=DB::table('transactions')->where('type','withdrawal')->where('status','success')->where('user_id',Auth::guard('users')->user()->id)->sum('amount');
        $total_downlines=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->count();
        return view('users.dashboard',[
            'total_earned' => $total_earned,
            'total_withdrawn' => $total_withdrawn,
            'total_downlines' => $total_downlines,
            'social_settings' => json_decode(DB::table('settings')->where('key','social_settings')->first()->value ?? '{}'),

        ]);
    }

    // social settings
    public function SocialSettings(){
        return view('users.settings.social',[
            'socials' => json_decode(Auth::guard('users')->user()->socials)
        ]);
    }

    // payout settings
    public function PayoutSettings(){
        return view('users.settings.payout',[
            'bank' => json_decode(Auth::guard('users')->user()->bank)
        ]);
    }

    // profile settings
    public function ProfileSettings(){
        return view('users.settings.profile',[
            'package' => Auth::guard('users')->user()->package,
            'joined' => Carbon::parse(Auth::guard('users')->user()->date)->diffForHumans()
        ]);
    }

    // security settings
    public function SecuritySettings(){
        return view('users.settings.security');
    }

    // logout
    public function Logout(){
        Auth::guard('users')->logout();
        return redirect('users/login');
    }
    // post ads
    public function PostAds(){
    $categories=DB::table('task_categories')->orderBy('name','asc')->get();
        return view('users.ads.post',[
            'categories' => $categories
        ]);
    }
    // recharge
    public function Recharge(){
        return view('users.recharge',[
              'bank' => json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}')
        ]);

    }

    // transactions
    public function Transactions(){
        $transactions=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->whereNot('status','initiated');
       $transactions=$transactions->orderBy('date','desc')->paginate(10);
       $transactions->getCollection()->transform(function($each){
                $each->date_format=Carbon::parse($each->date)->format('M d, H:i:s');
                return $each;
       });
        return view('users.transactions',[
            'trx' => $transactions
        ]);
    }

    // transaction receipt
    public function TransactionReceipt(){
        $trx=DB::table('transactions')->where('id',request('id'))->first();
        $trx->date_format=Carbon::parse($trx->date)->format('M d, Y');
        $trx->time_format=Carbon::parse($trx->date)->format('H:i:s');
        return view('users.receipt',[
            'data' => $trx
        ]);
    }

    // daily tasks
    public function DailyTasks(){
        $settings=json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}');
        $free_tasks=$settings->free_users->daily_tasks;
        $upgraded=Auth::guard('users')->user()->upgraded;
        $today_proofs=DB::table('task_proofs')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->count();
        if($upgraded == 'no'){
            if($today_proofs >= $free_tasks){
                return redirect('users/upgrade/account');
            }
        }
       
        $tasks=DB::table('tasks')->where('status','active')->whereColumn('proofs','<','limit')->whereNotIn('id',function($q){
            $q->select('task->id')->where('user_id',Auth::guard('users')->user()->id)->from('task_proofs');
        })->orderBy('date','desc')->paginate(10);
            $tasks->getCollection()->transform(function($each){
                $each->type=json_decode($each->type);
                return $each;
            });
        return view('users.tasks',[
            'tasks' => $tasks
        ]);
    }

    // task
    public function Task(){
         $settings=json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}');
        $free_tasks=$settings->free_users->daily_tasks;
        $upgraded=Auth::guard('users')->user()->upgraded;
        $today_proofs=DB::table('task_proofs')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->count();
        if($upgraded == 'no'){
            if($today_proofs >= $free_tasks){
                return redirect('users/upgrade/account');
            }
        }
       
        $task=DB::table('tasks')->where('id',request('id'))->first();
        return view('users.task',[
            'task' => $task
        ]);
    }
    
    // withdraw
    public function Withdraw(){
        $wallets=collect(Wallets())->where('class','general')->all();
        $bank=Auth::guard('users')->user()->bank ?? '{}';
        $bank=json_decode($bank);
        $upgrade_settings=json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}');
        if($upgrade_settings->upgrade->portal == 'on' && Auth::guard('users')->user()->upgraded == 'no'){
            return redirect('users/upgrade/account');
        }

        
        if(empty($bank->account_number)){
        return redirect('users/payout/settings');
        }
        return view('users.withdraw',[
            'wallets' => $wallets,
            'bank' => $bank,
              'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}'),
         
        
        ]);
    }
    
    // upgrade account
    public function UpgradeAccount(){
        return view('users.upgrade',[
            'settings' => json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}'),
            'general' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}')
        ]);
    }

    // gift code
public function GiftCode(){
    return view('users.giftcode');
}

// index
public function Index(){
    return view('users.home');
}

// terms of service
public function TermsOfService(){
    return view('users.terms');
}

// privacy policy
public function PrivacyPolicy(){
    return view('users.privacy');
}

// referrals
public function Referrals(){
    $referrals=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orderBy('date','desc')->paginate(9);
    $referrals->getCollection()->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        $each->earned=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('json->type','referral_commission')->where('json->downline',$each->username)->sum('amount');
      
        return $each;
    });
    return view('users.referrals',[
        'referrals' => $referrals
    ]);
}

// daily spin
public function DailySpin(){
    //   return Auth::guard('users')->user()->last_spin;
    return view('users.dailyspin',[
        'last_spin' => Carbon::parse(Auth::guard('users')->user()->last_spin)
    ]);
}
}

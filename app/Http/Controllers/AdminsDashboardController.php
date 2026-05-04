<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminsDashboardController extends Controller
{
    // login
    public function Login(){
        return view('admins.auth.login');
    }
    // dashboard
    public function DashBoard(){
        return view('admins.dashboard',[
            'total_users' => DB::table('users')->count(),
            'today_users' => DB::table('users')->whereDate('date',Carbon::now())->count(),
            'pending_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('class','debit')->where('status','pending')->sum('amount'),
            'successfull_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('class','debit')->where('status','success')->sum('amount'),
            'rejected_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('class','debit')->where('status','rejected')->sum('amount'),
            'pending_deposits' => DB::table('transactions')->where('type','deposit')->where('class','credit')->where('status','pending')->sum('amount'),
            'successfull_deposits' => DB::table('transactions')->where('type','deposit')->where('class','credit')->where('status','success')->sum('amount'),
            'rejected_deposits' => DB::table('transactions')->where('type','deposit')->where('class','credit')->where('status','rejected')->sum('amount'),


        ]);
    }
    // transactions
    public function Transactions(){
        // variables
        $transactions=DB::table('transactions');
         $total=DB::table('transactions');
       $today=DB::table('transactions')->whereDate('date',Carbon::today());
       $sum=DB::table('transactions');

// pending

        if(request()->has('type')){
            $transactions=$transactions->where('type',request('type'));
            $total=$total->where('type',request('type'));
            $today=$today->where('type',request('type'));
            $sum=$sum->where('type',request('type'));
        }
        if(request()->has('status')){
            $transactions=$transactions->where('status',request('status'));
            $total=$total->where('status',request('status'));
            $today=$today->where('status',request('status'));
            $sum=$sum->where('status',request('status'));
        }
        if(request()->has('user_id')){
            $transactions=$transactions->where('user_id',request('user_id'));
            $total=$total->where('user_id',request('user_id'));
            $today=$today->where('user_id',request('user_id'));
            $sum=$sum->where('user_id',request('user_id'));
        }
        if(request()->has('gift_code_id')){
              $transactions=$transactions->where('json->gift_code_id',request('gift_code_id'));
            $total=$total->where('json->gift_code_id',request('gift_code_id'));
            $today=$today->where('json->gift_code_id',request('gift_code_id'));
            $sum=$sum->where('json->gift_code_id',request('gift_code_id'));
        }
       $transactions=$transactions->orderBy('date','desc')->paginate(10);
       $transactions->getCollection()->transform(function($each){
    $each->day=Carbon::parse($each->date)->format('M d, Y');
    $each->time=Carbon::parse($each->date)->format('H:i');
    $each->user=DB::table('users')->where('id',$each->user_id)->first();
    $each->frame=Carbon::parse($each->date)->diffForHumans();
    return $each;
       });
      
       
        return view('admins.transactions',[
            'total' => $total->count(),
            'today' => $today->count(),
            'sum' => $sum->sum('amount'),
            'trx' => $transactions,
            'type' => request('type'),
            'status' => request('status') == 'success' ? 'successful' : request('status')
        ]);
    }
    // transaction receipt
    public function TransactionReceipt(){
        $trx=DB::table('transactions')->where('id',request('id'))->first();
        $trx->day=Carbon::parse($trx->date)->format('d M Y');
        $trx->time=Carbon::parse($trx->date)->format('H:i');
        $trx->user=DB::table('users')->where('id',$trx->user_id)->first();
        $trx->user->frame=Carbon::parse($trx->user->date)->diffForHumans();
        return view('admins.receipt',[
            'data' => $trx
        ]);
    }

    // all users
    public function AllUsers(){
      
        $users=DB::table('users');
        if(request()->has('status')){
            $users=$users->where('status',request('status'));
        }
        if(request()->has('type')){
            $users=$users->where('type',request('type'));
        }
        if(request()->has('date')){
            $users=$users->whereDate('date',Carbon::today());
        }
         if(request()->has('new')){
            $users=$users->where('date',Carbon::today());
        }
        $users=$users->orderBy('date','desc')->paginate(10);
        $users->getCollection()->transform(function($each){
    $each->date_format=Carbon::parse($each->date)->format('d M Y');
    $each->frame=Carbon::parse($each->date)->diffForHumans();
    $each->ref_id=DB::table('users')->where('username',$each->ref ?? '0')->first()->id ?? '';
    $each->downlines=DB::table('users')->where('ref',$each->username)->count();
    return $each;
        });
        return view('admins.users',[
            'users' => $users,
            'status' => request()->has('status') ? request('status') : 'All',
            'total_users' => DB::table('users')->count(),
            'active_users' => DB::table('users')->where('status','active')->count(),
            'today_signups' => DB::table('users')->whereDate('date',Carbon::today())->count(),
        ]);
    }
    // user 
    public function User(){
        $user=DB::table('users')->where('id',request('id'))->first();
        $user->date_format=Carbon::parse($user->date)->format('d M Y');
    $user->frame=Carbon::parse($user->date)->diffForHumans();
    $user->socials=json_decode($user->socials);
     $user->ref_id=DB::table('users')->where('username',$user->ref ?? '0')->first()->id ?? '';
     $user->total_referred=DB::table('users')->where('ref',$user->username)->count();
      $user->downlines=DB::table('users')->where('ref',$user->username)->count();
      $user->last_spin=Carbon::parse($user->last_spin)->diffForHumans();
        return view('admins.user',[
           'data' => $user
        ]);

    }
    // site settings
    public function SiteSettings(){
        return view('admins.settings.index',[
            'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}'),
            'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}'),
           'social_settings' => json_decode(DB::table('settings')->where('key','social_settings')->first()->value ?? '{}'),

        ]);
    }
    // notifications
    public function Notifications(){
      
    $notifications=DB::table('notifications');
    $notifications=$notifications->orderBy('date','desc')->paginate(10);
    $notifications->getCollection()->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
    });
        return view('admins.notifications',[
        'total' => DB::table('notifications')->count(),
        'read' => DB::table('notifications')->where('status->admins','read')->count(),
        'unread' => DB::table('notifications')->where('status->admins','unread')->count(),
        'notifications' => $notifications
        ]);
    }

    // logout
    public function Logout(){
       Auth::guard('admins')->logout();
       return redirect('admins/login');
    }
    
    // bank settings
    public function BankSettings(){
        return view('admins.settings.bank',[
            'bank' => json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}')
        ]);
    }

    // add task category
    public function AddTaskCategory(){
        return view('admins.tasks.categories.add');
    }

    // manage tasks categories
    public function ManageTasksCategories(){
        $categories=DB::table('task_categories');
        $categories=$categories->orderBy('date','desc')->paginate(10);
        $categories->getCollection()->transform(function($each){
                        $each->frame=Carbon::parse($each->date)->diffForHumans();
                        return $each;
        });
        return view('admins.tasks.categories.manage',[
            'total' => DB::table('task_categories')->count(),
            'categories' => $categories
        ]);
    }

    // edit task category
    public function EditTaskCategory(){
        return view('admins.tasks.categories.edit',[
            'data' => DB::table('task_categories')->where('id',request('id'))->first()
        ]);
    }

    // post task
    public function PostTask(){
        return view('admins.tasks.post',[
            'categories' => DB::table('task_categories')->orderBy('name','asc')->get()
        ]);
    }

    // manage tasks
    public function ManageTasks(){
        $tasks=DB::table('tasks');

        $tasks=$tasks->orderBy('updated','desc')->paginate(10);
        $tasks->getCollection()->transform(function($each){
                    $each->type=json_decode($each->type);
                    $each->status=$each->proofs >= $each->limit ? 'completed' : 'active';
                    $each->user=DB::table('users')->where('id',$each->user_id)->first();
                    $each->frame=Carbon::parse($each->date)->diffForHumans();
                    return $each;
        });
        return view('admins.tasks.manage',[
            'tasks' => $tasks,
            'total' => DB::table('tasks')->count(),
            'total_active' => DB::table('tasks')->whereColumn('proofs','<','limit')->count(),
            'total_completed' => DB::table('tasks')->whereColumn('proofs','>=','limit')->count()
        ]);
    }

    // edit task
    public function EditTask(){
        $task=DB::table('tasks')->where('id',request('id'))->first();
        $task->type=json_decode($task->type);
        return view('admins.tasks.edit',[
            'task' => $task,
            'categories' => DB::table('task_categories')->orderBy('name','asc')->get()
        ]);
    }

    // submitted task proofs
    public function SubmittedTaskProofs(){
        $proofs=DB::table('task_proofs');
        if(request()->has('status')){
            $proofs=$proofs->where('status',request('status'));
        }
        $proofs=$proofs->orderBy('date','desc')->paginate(10);

        $proofs->getCollection()->transform(function($each){
                $each->user=DB::table('users')->where('id',$each->user_id)->first();
                $each->frame=Carbon::parse($each->date)->diffForHumans();
                $each->proofs=json_decode($each->proofs);
                $each->task=json_decode($each->task);
                $each->type=json_decode($each->task->type);
                return $each;
        });
    //    return $proofs[0]->task->type;
        return view('admins.tasks.proofs',[
            'proofs' => $proofs,
            'status' => request('status','all'),
            'total' => DB::table('task_proofs')->count(),
            'total_pending' => DB::table('task_proofs')->where('status','pending')->count(),
            'total_approved' => DB::table('task_proofs')->where('status','approved')->count(),
            'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}')
        ]);
    }

    // upgrade settings
    public function UpgradeSettings(){
        return view('admins.settings.upgrade',[
             'settings' => json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}')
        ]);
    }

    // create gift code
    public function CreateGiftCode(){
        return view('admins.giftcode.create');
    }

    // manage gift codes
    public function ManageGiftCodes(){
        $codes=DB::table('gift_codes');
        $codes=$codes->orderBy('updated','desc')->paginate(10);

        $codes->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->updated)->diffForHumans();
                $each->status=$each->redeemed >= $each->limit ? 'completed' : 'active';
                return $each;
        });
        return view('admins.giftcode.manage',[
            'total' => DB::table('gift_codes')->count(),
            'total_active' => DB::table('gift_codes')->where('limit','>','redeemed')->count(),
            'total_used' => DB::table('gift_codes')->where('limit','<=','redeemed')->count(),
            'codes' => $codes
        ]);
    }

    // edit gift code
    public function EditGiftCode(){
        return view('admins.giftcode.edit',[
            'data' => DB::table('gift_codes')->where('id',request('id'))->first()
        ]);
    }

    // delete gift code
    public function DeleteGiftCode(){
        DB::table('gift_codes')->where('id',request('id'))->delete();
        return redirect(url()->previous());
    }

    // add marketplace product
    public function AddMarketplaceProduct(){
       
        return view('admins.marketplace.add');
    }
    // manage products
    public function ManageProducts(){
        $products=DB::table('products');

        $products=$products->orderBy('updated','desc')->paginate(10);
        $products->getCollection()->transform(function($each){
                $each->frame=Carbon::parse($each->updated)->diffForHumans();
                return $each;
        });
        return view('admins.marketplace.manage',[
            'products' => $products,
            'total' => DB::table('products')->count(),
            'sold' => DB::table('products')->where('status','sold')->count(),
            'active' => DB::table('products')->where('status','active')->count(),
        ]);
    }

    // edit marketplace product
    public function EditMarketplaceProduct(){
        return view('admins.marketplace.edit',[
            'data' => DB::table('products')->where('id',request('id'))->first()
        ]);
    }

   
}

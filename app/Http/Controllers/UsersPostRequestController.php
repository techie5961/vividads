<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UsersPostRequestController extends Controller
{
    // register
    public function Register(){
       
        $name=trim(request('first_name')).' '.trim(request('last_name'));
        $name=ucwords(strtolower($name));
        $username=str_replace('-','_',request('username'));
        $username=trim(strtolower(str_replace([' ','@'],'',$username)));
        $email=trim(strtolower(str_replace(' ','',strtolower(request('email')))));
        $phone=request('phone');
        $password=request('password');
        $confirm_password=request('confirm_password');
        $general=json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}');
        $welcome_bonus=$general->welcome_bonus;
  

         // sanitize phone number
        if(str::startsWith($phone,'234')){
            $phone=Str::replaceFirst('234','',$phone);
        }
        if(str::startsWith($phone,'0')){
            $phone=Str::replaceFirst('0','',$phone);
        }
        $phone='0'.$phone;

        // make sure its valid phone number
        if(strlen($phone) != 11){
            return response()->json([
                'message' => 'Please enter a valid phone number',
                'status' => 'error'
            ]);
        }
    // make sure email dies not exists
       if(DB::table('users')->where('email',$email)->exists()){
        return response()->json([
            'message' => 'Email already exists on our server',
            'status' => 'error'
        ]);
       }
    //    make sure username does not exist
    if(DB::table('users')->where('username',$username)->exists()){
    return response()->json([
        'message' => 'Username already exists on our server',
        'status' => 'error'
    ]);
    }
    //    make sure phone number does not exists
    if(DB::table('users')->where('phone',$phone)->exists()){
        return response()->json([
            'message' => 'Phone number already exists on our server',
            'status' => 'error'
        ]);
    }
    // make sure password and confirm password are the same
    if(!Hash::check($password,Hash::make($confirm_password))){
        return response()->json([
        'message' => 'Password & confirm password must match',
        'status' => 'error'
        ]);
          
    }
    
   // insert into db
    DB::table('users')->insert([
        'uniqid' => GenerateID(),
        'type' => 'user',
        'username' => $username,
        'phone' => $phone,
        'name' => $name,
        'ref' => DB::table('users')->where('uniqid',request('ref'))->first()->username ?? null,
        'email' => $email,
        'bank' => json_encode([
                'account_number' => null,
                'bank_name' => null,
                'account_name' => null
            ]),
        'main_balance' => $welcome_bonus,
        'password' => Hash::make($password),
        'updated' => Carbon::now(),
        'date' => Carbon::now(),
        'last_spin' => Carbon::yesterday()
    ]);
    // insert into trx
    if($welcome_bonus > 0){
     DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => DB::table('users')->where('email',$email)->first()->id,
    'title' => 'Welcome Bonus',
    'class' => 'credit',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19.2914 5.99994H20.0002C20.5525 5.99994 21.0002 6.44766 21.0002 6.99994V13.9999C21.0002 14.5522 20.5525 14.9999 20.0002 14.9999H18.0002L13.8319 9.16427C13.3345 8.46797 12.4493 8.16522 11.6297 8.41109L9.14444 9.15668C8.43971 9.3681 7.6758 9.17551 7.15553 8.65524L6.86277 8.36247C6.41655 7.91626 6.49011 7.17336 7.01517 6.82332L12.4162 3.22262C13.0752 2.78333 13.9312 2.77422 14.5994 3.1994L18.7546 5.8436C18.915 5.94571 19.1013 5.99994 19.2914 5.99994ZM5.02708 14.2947L3.41132 15.7085C2.93991 16.1209 2.95945 16.8603 3.45201 17.2474L8.59277 21.2865C9.07284 21.6637 9.77592 21.5264 10.0788 20.9963L10.7827 19.7645C11.2127 19.012 11.1091 18.0682 10.5261 17.4269L7.82397 14.4545C7.09091 13.6481 5.84722 13.5771 5.02708 14.2947ZM7.04557 5H3C2.44772 5 2 5.44772 2 6V13.5158C2 13.9242 2.12475 14.3173 2.35019 14.6464C2.3741 14.6238 2.39856 14.6015 2.42357 14.5796L4.03933 13.1658C5.47457 11.91 7.65103 12.0343 8.93388 13.4455L11.6361 16.4179C12.6563 17.5401 12.8376 19.1918 12.0851 20.5087L11.4308 21.6538C11.9937 21.8671 12.635 21.819 13.169 21.4986L17.5782 18.8531C18.0786 18.5528 18.2166 17.8896 17.8776 17.4146L12.6109 10.0361C12.4865 9.86205 12.2652 9.78636 12.0603 9.84783L9.57505 10.5934C8.34176 10.9634 7.00492 10.6264 6.09446 9.7159L5.80169 9.42313C4.68615 8.30759 4.87005 6.45035 6.18271 5.57524L7.04557 5Z"></path></svg>',
    'type' => 'welcome_bonus',
    'amount' => $welcome_bonus,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => 0,
        'after' => $welcome_bonus
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    }
    if(DB::table('users')->where('uniqid',request('ref'))->exists()){
        $ref=DB::table('users')->where('uniqid',request('ref'))->first();
         if($general->referral_commission > 0){
            DB::table('users')->where('id',$ref->id)->increment('affiliate_balance',$general->referral_commission);
     DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => $ref->id,
    'title' => 'Referral Commission',
    'class' => 'credit',
    'type' => 'referral_commission',
    'amount' => $general->referral_commission,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'referral_balance',

    ]),
    'data' => json_encode([
        'Downline' => ucfirst($username)
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => $ref->affiliate_balance,
        'after' => $ref->affiliate_balance + $general->referral_commission
    ],
    'primary_wallet' => collect(Wallets())->where('key','affiliate_balance')->first()->name,
    'type' => 'referral_commission',
    'downline' => $username
    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
        }
    }
    return response()->json([
        'message' => 'Registration successfull,redirecting...',
        'status' => 'success'
    ]);
    }

    // login
    public function Login(){
         $username=str_replace('-','_',request('id'));
        $username=trim(strtolower(str_replace([' ','@'],'',$username)));
        $password=request('password');
       
        if(!DB::table('users')->where('username',$username)->exists()){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);
        }
        $user=DB::table('users')->where('username',$username)->first();
        if(!Hash::check($password,$user->password)){
            return response()->json([
                'message' => 'Invalid account password',
                'status' => 'error'
            ]);
        }
        if($user->status == 'banned'){
            return response()->json([
                'message' => 'User account has been banned,please contact admin',
                'status' => 'error'
            ]);
        }

        Auth::guard('users')->loginUsingId($user->id);
        return response()->json([
            'message' => 'Login successful,redirecting...',
            'status' => 'success'
        ]);
    }

    // social settings
    public function SocialSettings(){
        $facebook=request('facebook') == '' ? null : request('facebook');
        $tiktok=request('tiktok') == '' ? null : request('tiktok');
        $instagram=request('instagram') == '' ? null : request('instagram');
        $twitter=request('twitter') == '' ? null : request('twitter');
        $whatsapp=request('whatsapp') == '' ? null : request('whatsapp');
        $telegram=request('telegram') == '' ? null : request('telegram');
        if($whatsapp && strlen($whatsapp) != 11){
            return response()->json([
                'message' => 'Enter a valid 11 digit phone number',
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'socials->facebook' => $facebook ?? null,
            'socials->tiktok' => $tiktok ?? null,
            'socials->instagram' => $instagram ?? null,
            'socials->twitter' => $twitter ?? null,
            'socials->whatsapp' => $whatsapp ?? null,
            'socials->telegram' => $telegram ?? null
        ]);
        return response()->json([
    'message' => 'Social settings updated successfully',
    'status' => 'success'
        ]);
    }

    // payout settings
    public function PayoutSettings(){
        $bank_name=request('bank_name');
        $account_number=request('account_number');
        $account_name=request('account_name');
        if(strlen(trim($account_number)) !== 10){
            return response()->json([
                'message' => 'Please enter a 10 digits account number',
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'bank->account_number' => trim($account_number),
            'bank->bank_name' => $bank_name,
            'bank->account_name' => $account_name
        ]);
        return response()->json([
            'message' => 'Payout settings updated successfully',
            'status' => 'success'
        ]);
    }

    // update profile
    public function UpdateProfile(){
        $photo=GenerateID().'.'.request()->file('photo')->getClientOriginalExtension();
        $photo=strtolower($photo);
        if(request()->file('photo')->move(public_path('photos/users'),$photo)){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'photo' => $photo,
                'updated' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Profile photo updated successfully',
                'status' => 'success'
            ]);
        }
    }

    // update password
    public function UpdatePassword(){
        $current=request('current');
        $new=request('new');
        $confirm=request('confirm');
        if(!Hash::check($current,Auth::guard('users')->user()->password)){
            return response()->json([
                'message' => 'Invalid currrent password',
                'status' => 'error'
            ]);
        }
        if(!Hash::check($confirm,Hash::make($new))){
            return response()->json([
                'message' => 'New password and confirm password must be the same',
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make($new),
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Account password updated successfully',
            'status' => 'success'
        ]);
    }
    // post task
    public function PostTask(){
        $id=GenerateID();
        $link='<a target="_blank" href="'.request('link').'" class="c-primary w-fit">Visit Link</a>';
        $type=request('type');
        $type=DB::table('task_categories')->where('id',$type)->first();
         $limit=$type->members;
        $cost=$type->cost * $type->members;
        if($cost > Auth::guard('users')->user()->deposit_balance){
            return response()->json([
                'message' => 'Insufficient balance, add funds to your account to continue posting ads',
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'deposit_balance' => DB::raw('deposit_balance - '.$cost.''),
            'updated' => Carbon::now()
        ]);
        DB::table('transactions')->insert([
    'uniqid' => $id,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Ads Posting',
    'class' => 'debit',
    'type' => 'ads_posting',
    'amount' => $cost,
    'wallet' => json_encode([
        'from' => 'deposit_balance',
        'to' => 'admin',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance - $cost
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'data' => json_encode([
   'Task link' => $link,
   'Task type' => $type->name,
   'members needed' => $type->members,
   'platform' => $type->platform
    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    if(request()->hasFile('banner')){
        $name=time().'.'.request()->file('banner')->getClientOriginalExtension();
        request()->file('banner')->move(public_path('tasks/banners'),$name);
    }
    DB::table('tasks')->insert([
        'uniqid' => GenerateID(),
        'user_id' => Auth::guard('users')->user()->id,
        'type' => json_encode($type),
         'limit' => $limit,
        'proofs' => 0,
        'link' => request('link'),
        'caption' => request('caption') ?? null,
        'banner' => $name ?? null,
        'status' => 'active',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
        return response()->json([
            'link' => url('users/transaction/receipt?id=').DB::table('transactions')->where('uniqid',$id)->where('user_id',Auth::guard('users')->user()->id)->first()->id,
            'message' => 'Ad posted successfully',
            'status' => 'success'
        ]);
    }

    // recharge
    public function Recharge(){
        $id=GenerateID();
        $amount=request('amount');
        $name=time().'.'.request()->file('receipt')->getClientOriginalExtension();
        $bank=json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}');
        if(request()->file('receipt')->move(public_path('receipt'),$name)){
            $receipt=asset('receipt/'.$name.'');
            $proof='<a target="_blank" href="'.$receipt.'" class="c-primary w-fit">View proof</a>';
       DB::table('transactions')->insert([
    'uniqid' => $id,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Deposit',
    'class' => 'credit',
    'type' => 'deposit',
    'amount' => $amount,
    'wallet' => json_encode([
         'from' => [
            'method' => 'bank',
            'account_number' => null,
            'bank_name' => null,
            'account_name' => null,
            'receipt' => $receipt
        ],
        'to' => 'deposit_balance',
       

    ]),
    'json' => json_encode([
    'balance' => [
        'before' => 10000,
        'after' => 16000
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
     'data' => json_encode([
    'gateway' => 'Manual',
    'Payment proof' => $proof,
    'account number' => $bank->account_number,
    'bank name' => $bank->bank_name,
    'account name' => $bank->account_name
    ]),
    'status' => 'pending',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    return response()->json([
        'message' => 'Deposit requesrt submitted successfully',
        'status' => 'success',
        'url' => url('users/transaction/receipt?id=').DB::table('transactions')->where('uniqid',$id)->where('user_id',Auth::guard('users')->user()->id)->first()->id
    ]);
        }

        return response()->json([
            'message' => 'Internal server error,please try again',
            'status' => 'error'
        ]);
       

    }

    // complete task
    public function CompleteTask(){
     
            $task=DB::table('tasks')->where('id',request('id'))->first();
            $reward=json_decode($task->type)->earning;
            $status='pending';
            $message='Task Completed successfully,awaiting review';
            $proof=' <a class="c-primary no-select no-u w-fit">No Screenshot attached</a>';
            if(DB::table('task_proofs')->where('user_id',Auth::guard('users')->user()->id)->where('task->id',request('id'))->exists()){
                return response()->json([
                    'message' => 'You have already performed this task before',
                    'status' => 'error'
                ]);
            }

            if($task->proofs >= $task->limit){
                return response()->json([
                    'message' => 'Task already completed',
                    'status' => 'success'
                ]);
            }

            if(request()->hasFile('screenshot')){
                $name=strtolower(GenerateID()).'.'.request()->file('screenshot')->getClientOriginalExtension();
                request()->file('screenshot')->move(public_path('tasks/proofs'),$name);
                $proof=' <a href="'.asset('tasks/proofs/'.$name.'').'" target="_blank" class="c-primary no-select w-fit">
                        View Screenshot
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M228,104a12,12,0,0,1-24,0V69l-59.51,59.51a12,12,0,0,1-17-17L187,52H152a12,12,0,0,1,0-24h64a12,12,0,0,1,12,12Zm-44,24a12,12,0,0,0-12,12v64H52V84h64a12,12,0,0,0,0-24H48A20,20,0,0,0,28,80V208a20,20,0,0,0,20,20H176a20,20,0,0,0,20-20V140A12,12,0,0,0,184,128Z"></path></svg>

                    </a>';
            }
            if(config('settings.task_reward') != 'review'){
                $status='approved';
                $message='Task Completed successfully and reward granted success';
                DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                        'main_balance' => DB::raw('main_balance + '.$reward.''),
                        'updated' => Carbon::now()
                ]);
               
                 DB::table('transactions')->insert([
                         'uniqid' => GenerateID(),
                'user_id' => Auth::guard('users')->user()->id,
                'title' => 'Task Reward',
                'class' => 'credit',
                'type' => 'task_reward',
                'amount' => $reward,
                'fee' => 0,
               'wallet' => json_encode([
                'from' => 'Task',
                'to' => 'main_balance',

                ]),
                'data' => json_encode([
                    'Task Performed' => json_decode($task->type)->name
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => Auth::guard('users')->user()->main_balance,
                'after' => Auth::guard('users')->user()->main_balance + $reward 
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
            }
            DB::table('tasks')->where('id',request('id'))->update([
                'proofs' => DB::raw('proofs + 1')
            ]);
            DB::table('task_proofs')->insert([
                'uniqid' => GenerateID(),
                'user_id' => Auth::guard('users')->user()->id,
                'task' => json_encode($task),
                'proofs' => json_encode([
                    'Screenshot' => $proof
                ]),
                'status' => $status,
                'updated' => Carbon::now(),
                'date' => Carbon::now() 
            ]);
            return response()->json([
                'message' => $message,
                'status' => 'success'
            ]);




    }

    // withdrawal
    public function Withdrawal(){
      
        $amount=request('amount');
        $wallet=request('wallet');
        $uniqid=GenerateID();
        $settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}');
        $fee=($settings->withdrawal->fee * $amount)/100;
        $bank=json_decode(Auth::guard('users')->user()->bank ?? '{}');
        $portal=$settings->withdrawal->{$wallet}->portal;
        $minimum=$settings->withdrawal->{$wallet}->minimum;
        $maximum=$settings->withdrawal->{$wallet}->maximum;
        $wallet_name=collect(Wallets())->where('key',$wallet)->first()->name;
        $count=$settings->withdrawal->count;
      
        if(Auth::guard('users')->user()->status == 'banned'){
            return response()->json([
                'message' => 'You account has been banned',
                'status' => 'error'
            ]);
        }
   
        if(DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','withdrawal')->whereDate('date',Carbon::today())->count() >= $count){
            return response()->json([
                'message' => 'You can only withdraw up to '.number_format($count).' times daily',
                'status' => 'error'
            ]);
        }

         if(empty($bank)){
            return response()->json([
                'message' => 'Please Link your withdrawal account to place withdrawal',
                'status' => 'error'
            ]);
        }

        if($amount > Auth::guard('users')->user()->{$wallet}){
                return response()->json([
                    'message' => 'Insufficient balance',
                    'status' => 'error'
                ]);
        }

        if($amount < $minimum){
            return response()->json([
                'message' => 'Minimum withdrawal for '.$wallet_name.' is '.Auth::guard('users')->user()->currency.number_format($minimum,2),
                'status' => 'info'
            ]);
        }
        if($amount > $maximum){
            return response()->json([
                'message' => 'Maximum withdrawal for '.$wallet_name.' is '.Auth::guard('users')->user()->currency.number_format($maximum,2),
                'status' => 'info'
            ]);
        }
        if($portal == 'off'){
            return response()->json([
                'message' => ''.$wallet.' Withdrawal portal is currently off',
                'status' => 'info'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement($wallet,$amount);
           DB::table('transactions')->insert([
    'uniqid' => $uniqid,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Withdrawal',
    'class' => 'debit',
    'type' => 'withdrawal',
    'amount' => $amount - $fee,
    'fee' => $fee,
    'wallet' => json_encode([
        'from' => 'main_balance',
        'to' => [
            'method' => 'bank',
            'account_number' => $bank->account_number,
            'bank_name' => $bank->bank_name,
            'account_name' => $bank->account_name
        ],

    ]),
    'data' => json_encode([
        'Withdrawal Amount' => Auth::guard('users')->user()->currency.number_format($amount,2),
        'To receive' => Auth::guard('users')->user()->currency.number_format($amount - $fee,2),
        'Fee' => Auth::guard('users')->user()->currency.number_format($fee,2),
        'Account Number' => $bank->account_number,
        'Bank Name' => $bank->bank_name,
        'Account Name' => $bank->account_name,
        'wallet' => collect(Wallets())->where('key',$wallet)->first()->name
    ]),
    'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->{$wallet},
        'after' => Auth::guard('users')->user()->{$wallet} - $amount
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'pending',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    $receipt_id=DB::table('transactions')->where('uniqid',$uniqid)->where('user_id',Auth::guard('users')->user()->id)->first()->id;

    return response()->json([
        'message' => 'Withdrawal placed successfully,awaiting processing',
        'status' => 'success',
        'url' => url('users/transaction/receipt?id='.$receipt_id.'')
    ]);

    }

    // upgrade account
    public function UpgradeAccount(){
        $settings=json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}');
        if($settings->upgrade->fee > Auth::guard('users')->user()->deposit_balance){
            return response()->json([
                'message' => 'Insufficient balance,kindly fund your account',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement('deposit_balance',$settings->upgrade->fee);
        DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Account Upgrade',
    'class' => 'debit',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM11.9996 6.34326L17.9493 12.293H12.9996V17.657H10.9996V12.293H6.0498L11.9996 6.34326Z"></path></svg>',
    'type' => 'account_upgrade',
    'amount' => $settings->upgrade->fee,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'deposit_balance',
        'to' => 'none',

    ]),
    'data' => json_encode([
        'Upgrade Plan' => $settings->upgrade->name
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance - $settings->upgrade->fee
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$settings->upgrade->cashback);
    if($settings->upgrade->cashback != 0){
         DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Upgrade Cashback',
    'class' => 'credit',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>',
    'type' => 'upgrade_cashback',
    'amount' => $settings->upgrade->cashback,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'none',
        'to' => 'main_balance',

    ]),
    'data' => json_encode([
        'Upgrade Plan' => $settings->upgrade->name
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->main_balance,
        'after' => Auth::guard('users')->user()->main_balance + $settings->upgrade->cashback
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    }

    DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'upgraded' => 'yes',
        'package' => $settings->upgrade->name
    ]);

    return response()->json([
        'message' => 'Account upgraded success',
        'status' => 'success'
    ]);
    }

    // redeem gift code
    public function RedeemGiftCode(){
       $code=DB::table('gift_codes')->where('code',request('code'));
       if(!$code->exists()){
        return response()->json([
            'message' => 'Invalid gift code',
            'status' => 'warning'
        ]);
       }

       $code=$code->first();
        if(DB::table('redeemed_gift_codes')->where('user_id',Auth::guard('users')->user()->id)->where('gift_code->code',request('code'))->exists()){
            return response()->json([
                'message' => 'Gift code have already been used by you',
                'status' => 'error'
            ]);
        }

       if($code->redeemed >= $code->limit){
        return response()->json([
            'message' => 'Gift code have been fully redeemed',
            'status' => 'info'
        ]);
       }
    DB::table('redeemed_gift_codes')->insert([
        'uniqid' => GenerateID(),
        'user_id' => Auth::guard('users')->user()->id,
        'gift_code' => json_encode($code),
        'status' => 'success',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
       DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$code->value);
      DB::table('gift_codes')->where('id',$code->id)->increment('redeemed');
      $receipt_id=GenerateID();
       DB::table('transactions')->insert([
    'uniqid' => $receipt_id,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Gift Code',
    'class' => 'credit',
    'type' => 'gift_code',
    'amount' => $code->value,
    'fee' => 0,
    'icon' => '',
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
    'data' => json_encode([
        'Gift code' => $code->code
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->main_balance,
        'after' => Auth::guard('users')->user()->main_balance + $code->value
    ],
    'primary_wallet' => 'Main Wallet',
    'gift_code' => json_encode($code),
    'gift_code_id' => $code->id

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    return response()->json([
        'message' => 'Gift code redeemed successfully',
        'status' => 'success',
        'url' => url('users/transaction/receipt?id=').DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('uniqid',$receipt_id)->first()->id

            ]);

       


    }

    // daily spin
    public function DailySpin(){
        $amount=request('amount');
        $amount=str_replace('₦','',$amount);
        if(is_numeric($amount)){
           DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$amount,[
            'last_spin' => Carbon::now()
           ]);
             DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Daily Spin',
    'class' => 'credit',
    'type' => 'daily_spin',
    'amount' => $amount,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->main_balance,
        'after' => Auth::guard('users')->user()->main_balance + $amount
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
        }
       
    }
    
}

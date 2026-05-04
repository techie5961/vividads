@extends('layout.users.app')
@section('title')
    Recharge
@endsection
@section('main')
    <section class="w-full column g-10">
         <div style="border:none;border-top:5px solid var(--primary);box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full p-20 br-0 bg-light column g-10">
            <div class="row w-full align-center space-between">
              {{-- new item --}}
                <div class="column g-5">
                    <span>Available Balance</span>
            <div class="w-full row align-center g-10 space-between">
                <strong class="desc c-primary">{{ $currency.number_format(Auth::guard('users')->user()->deposit_balance,2) }}</strong>
               </div>
                </div>
                {{-- icon --}}
                <span class="c-primary">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M2.00488 8.99979H21.0049C21.5572 8.99979 22.0049 9.4475 22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V8.99979ZM3.00488 2.99979H18.0049V6.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM15.0049 13.9998V15.9998H18.0049V13.9998H15.0049Z"></path></svg>

                </span>
            </div>
        </div>
       {{-- bank details --}}
        <div style="border:1px solid var(--rgt-005);" class="w-full column g-10 p-20 br-primary bg-light">
            <strong class="desc">Bank Details</strong>
           {{-- note --}}
            <div style="background: rgba(0,255, 0,0.1);color:#06965a" class="p-20 column br-10">
              
                <span>Send money into the account details below and fill the deposit form below to topup your account.Your balance would be updated under 1 to 5 Minutes.</span>
            </div>
            {{-- new --}}
            <div style="background:var(--rgt-005)" class="w-full space-between row  p-10 font-1 align-center g-10 br-5">
                <span class="ws-nowrap no-select">Account Number </span>
               <div class="row g-5 align-center">
                 <strong>{{ $bank->account_number }}</strong>
                <span onclick="copy({{ $bank->account_number }})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M192,72V216a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8H184A8,8,0,0,1,192,72Zm24-40H72a8,8,0,0,0,0,16H208V184a8,8,0,0,0,16,0V40A8,8,0,0,0,216,32Z"></path></svg>
                    
                </span>
               </div>
            </div>
            {{-- new --}}
            <div style="background:var(--rgt-005)" class="w-full space-between row  p-10 font-1 align-center g-10 br-5">
                <span class="ws-nowrap no-select">Bank Name </span>
               <div class="row g-5 align-center">
                 <strong>{{ $bank->bank_name }}</strong>
               </div>
            </div>
             {{-- new --}}
            <div style="background:var(--rgt-005)" class="w-full space-between row  p-10 font-1 align-center g-10 br-5">
                <span class="ws-nowrap no-select">Account Name </span>
               <div class="row g-5 align-center">
                 <strong>{{ $bank->account_name }}</strong>
               </div>
            </div>
           
        </div>
        {{-- form --}}
         <form action="{{ url('users/post/recharge/process') }}" onsubmit="PostRequest(event,this,MyFunc.Completed)" style="border:1px solid var(--rgt-005);" class="w-full column g-10 p-20 br-primary bg-light">
       <strong class="desc">Deposit Form</strong>
           {{-- csrf token --}}
           <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       {{-- new input --}}
        <div class="column g-5">
            <label class="column g-2">
                <label>Amount sent</label>
                <small class="opacity-05">Enter the exact amount sent</small>
            </label>
             <div class="cont">
            <input type="number" name="amount" placeholder="Enter amount" class="inp required input">
         </div>
        </div>
        {{-- new input --}}
         <div class="column g-5">
            <label class="column g-2">
                <label>Transfer Receipt</label>
                <small class="opacity-05">Screenshot of transfer made</small>
            </label>
             <div class="cont">
            <input type="file" accept="image/*" name="receipt" class="inp required input">
         </div>
        </div>
        <button class="post">Submit Deposit</button>
        </form>
    </section>
@endsection
@section('js')
  <script class="js">
    window.MyFunc = {
        Completed : (response)=>{
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect(data.url)
            }
        }
    }
    </script>  
@endsection
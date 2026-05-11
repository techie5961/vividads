@extends('layout.users.app')
@section('title')
    Upgrade Account
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="font-weight-900 font-size-1-5">Upgrade Account</strong>
        {{-- balance div --}}
        <div style="border:1px solid var(--rgt-01)" class="w-full p-20 br-primary bg-light column g-10">
            <span>Available Balance</span>
            <div class="w-full row align-center g-10 space-between">
                <strong class="desc c-primary">{{ $currency.number_format(Auth::guard('users')->user()->deposit_balance,2) }}</strong>
            <button onclick="Redirect('{{ url('users/recharge') }}')" class="btn-primary">Add Funds</button>
            </div>
        </div>
        {{-- package card --}}
        <div style="border:1px solid var(--rgt-01)" class="w-full align-center column g-10 p-20 br-primary bg-light">
               {{-- new row --}}
            <div class="p-5 p-x-20 br-1000 no-select bg-primary primary-text">
                    {{ $settings->upgrade->name }}
                </div>
                {{-- new row --}}
                <strong class="font-size-1-4 font-weight-900">{{ $currency.number_format($settings->upgrade->fee,2) }}<span class="opacity-05 font-weight-200 font-size-08">/One Time</span></strong>
       {{-- new row --}}
                <div class="w-full row align-center g-5">
            <span style="color:#4caf50;">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </span>
            <span>Daily tasks: Unlimited</span>
        </div>
         {{-- new row --}}
                <div class="w-full row align-center g-5">
            <span style="color:#4caf50;">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </span>
            <span>Cashback: {{ $currency.number_format($settings->upgrade->cashback,2) }}</span>
        </div>
        {{-- new row --}}
                <div class="w-full row align-center g-5">
            <span style="color:#4caf50;">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </span>
            <span>Support: 24/7</span>
        </div>
         {{-- new row --}}
                <div class="w-full row align-center g-5">
            <span style="color:#4caf50;">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </span>
            <span>Referral Bonus: {{ $currency.number_format($general->referral_commission,2) }}</span>
        </div>
         {{-- new row --}}
                <div class="w-full row align-center g-5">
            <span style="color:#4caf50;">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </span>
            <span>Withdrawal: Anytime</span>
        </div>
       @if (Auth::guard('users')->user()->upgraded == 'no')
            {{-- btn --}}
        <div onclick="document.querySelector('.modal.upgrade').classList.add('active')" style="border:1px solid var(--primary);color:var(--primary)" class="w-full font-weight-600 uppercase no-select br-1000 p-10 p-x-20 row align-center justify-center no-select h-40">
            <span>Upgrade Account</span>
        </div>
       @else
            {{-- btn --}}
        <div class="w-full bg-green pointer-none c-white font-weight-600 uppercase no-select br-1000 p-10 p-x-20 row align-center justify-center no-select h-40">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.007 2.10377C8.60544 1.65006 7.08181 2.28116 6.41156 3.59306L5.60578 5.17023C5.51004 5.35763 5.35763 5.51004 5.17023 5.60578L3.59306 6.41156C2.28116 7.08181 1.65006 8.60544 2.10377 10.007L2.64923 11.692C2.71404 11.8922 2.71404 12.1078 2.64923 12.308L2.10377 13.993C1.65006 15.3946 2.28116 16.9182 3.59306 17.5885L5.17023 18.3942C5.35763 18.49 5.51004 18.6424 5.60578 18.8298L6.41156 20.407C7.08181 21.7189 8.60544 22.35 10.007 21.8963L11.692 21.3508C11.8922 21.286 12.1078 21.286 12.308 21.3508L13.993 21.8963C15.3946 22.35 16.9182 21.7189 17.5885 20.407L18.3942 18.8298C18.49 18.6424 18.6424 18.49 18.8298 18.3942L20.407 17.5885C21.7189 16.9182 22.35 15.3946 21.8963 13.993L21.3508 12.308C21.286 12.1078 21.286 11.8922 21.3508 11.692L21.8963 10.007C22.35 8.60544 21.7189 7.08181 20.407 6.41156L18.8298 5.60578C18.6424 5.51004 18.49 5.35763 18.3942 5.17023L17.5885 3.59306C16.9182 2.28116 15.3946 1.65006 13.993 2.10377L12.308 2.64923C12.1078 2.71403 11.8922 2.71404 11.692 2.64923L10.007 2.10377ZM6.75977 11.7573L8.17399 10.343L11.0024 13.1715L16.6593 7.51465L18.0735 8.92886L11.0024 15.9999L6.75977 11.7573Z"></path></svg>

            <span>Account Already Upgraded</span>
        </div>
       @endif

            </div>
    </section>
    {{-- upgrade modal --}}
    <section onclick="this.classList.remove('active')" class="modal upgrade">
        <form action="{{ url('users/post/upgrade/account/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)" onclick="event.stopPropagation();" class="child text-center column align-center g-10">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new row --}}
            <div class="h-50 w-50 circle align-center justify-center column bg-primary primary-text">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16 2H4C3.44772 2 3 2.44772 3 3V21C3 21.5523 3.44772 22 4 22H12.2547C11.4638 20.8662 11 19.4872 11 18C11 14.134 14.134 11 18 11C19.0736 11 20.0907 11.2417 21 11.6736V7L16 2ZM13.7857 15.3269C13.8246 14.5997 14.3858 14.0083 15.11 13.9313L15.9807 13.8389C16.0841 13.8279 16.1815 13.7845 16.2589 13.715L16.9102 13.1299C17.4519 12.6431 18.2669 12.6218 18.8334 13.0795L19.5145 13.6298C19.5954 13.6951 19.6949 13.7333 19.7988 13.7389L20.6731 13.7857C21.4003 13.8246 21.9917 14.3858 22.0687 15.11L22.1611 15.9807C22.1721 16.0841 22.2155 16.1815 22.285 16.2589L22.8701 16.9102C23.3569 17.4519 23.3782 18.2669 22.9205 18.8334L22.3702 19.5145C22.3049 19.5954 22.2667 19.6949 22.2611 19.7988L22.2143 20.6731C22.1754 21.4003 21.6142 21.9917 20.89 22.0687L20.0193 22.1611C19.9159 22.1721 19.8185 22.2155 19.7411 22.285L19.0898 22.8701C18.5481 23.3569 17.7331 23.3782 17.1666 22.9205L16.4855 22.3702C16.4046 22.3049 16.3051 22.2667 16.2012 22.2611L15.3269 22.2143C14.5997 22.1754 14.0083 21.6142 13.9313 20.89L13.8389 20.0193C13.8279 19.9159 13.7845 19.8185 13.715 19.7411L13.1299 19.0898C12.6431 18.5481 12.6218 17.733 13.0795 17.1666L13.6298 16.4855C13.6951 16.4046 13.7333 16.3051 13.7389 16.2012L13.7857 15.3269ZM21.0303 17.0303L19.9697 15.9697L17.5 18.4393L16.0303 16.9697L14.9697 18.0303L16.9697 20.0303L17.5 20.5607L18.0303 20.0303L21.0303 17.0303Z"></path></svg>

            </div>
            {{-- new row --}}
            <strong class="desc">Upgrade Account</strong>
            <span>Are you sure you want to upgrade your account?</span>
            <button class="post">Yes! Upgrade</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
      
           function  Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Vitecss.navigate('{{ url()->current() }}')
                }
            }
        
    </script>
@endsection
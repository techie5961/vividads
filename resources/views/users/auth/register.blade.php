@extends('layout.users.auth')
@section('title')
    Register
@endsection
@section('main')
    
        <form action="{{ url('users/post/register/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)">
            <img onclick="window.location.href='{{ url('/') }}'" style="width:30%;" src="{{ asset(config('settings.logo')) }}" alt="Site Logo">
       <strong class="de">Let's Get Started</strong>
       {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       <div class="row align-center g-10 w-full">

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>First Name</label>
            <div class="cont w-full">
                <input name="first_name" placeholder="E.g David" type="text" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Last Name</label>
            <div class="cont w-full">
                <input name="last_name" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g James" type="text" class="inp input required">
            </div>
        </div>
       </div>

          {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Username</label>
            <div class="cont w-full">
                <input name="username" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter your username" type="text" class="inp input required">
            </div>
        </div>

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Email Address</label>
            <div class="cont w-full">
                <input name="email" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g you@gmail.com" type="email" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Phone Number</label>
            <div class="cont w-full">
                <input name="phone" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g 09012345678" type="number" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Referral(optional)</label>
            <div class="cont w-full">
                <input value="{{ $ref }}" name="ref" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter referral code" type="text" class="inp input">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Password</label>
            <div class="cont w-full">
                <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Enter password" type="password" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div class="cont w-full">
                <input name="confirm_password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Retype password" type="password" class="inp input required">
            </div>
        </div>
        {{-- agree prompt --}}
        <label class="w-full row no-select align-center g-5">
            <input type="checkbox" required>
            <span>I agree to {{ config('app.name') }} <a class="no-u c-primary bold" href="{{ url('terms') }}">Terms</a> and <a class="no-u c-primary bold" href="{{ url('privacy') }}">Privacy Policy</a></span>
        </label>
        {{-- submit btn --}}
        <button class="post">Create Account</button>
        {{-- login prompt --}}
        <div><span>Already have an account?</span><a class="c-primary bold no-u" href="{{ url('users/login') }}"> Login</a></div>
        </form>
    
@endsection
@section('js')
    <script class="js">
      
            function Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/login') }}'
                }
            }
        
    </script>
@endsection
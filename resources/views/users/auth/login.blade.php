@extends('layout.users.auth')
@section('title')
    Login
@endsection
@section('main')
    
        <form action="{{ url('users/post/login/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)">
            <img onclick="window.location.href='{{ url('/') }}'" style="width:30%;" src="{{ asset(config('settings.logo')) }}" alt="Site Logo">
       <strong class="de">Welcome Back</strong>
       {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
      

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Username</label>
            <div class="cont w-full">
                <input name="id" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter your username" type="text" class="inp input required">
            </div>
        </div>
        
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Password</label>
            <div class="cont w-full">
                <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Enter account password" type="password" class="inp input required">
            </div>
        </div>
       
        {{-- agree prompt --}}
        <label class="w-full row no-select align-center ">
            <input type="checkbox">
            <span>Remember me</span>
        </label>
        {{-- submit btn --}}
        <button class="post">Login</button>
        {{-- login prompt --}}
        <div><span>Don't have an account?</span><a class="c-primary bold no-u" href="{{ url('users/register') }}"> Sign up</a></div>
        </form>
    
@endsection
@section('js')
    <script class="js">
      
           function  Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/dashboard') }}'
                   
                }
            }
        
    </script>
@endsection
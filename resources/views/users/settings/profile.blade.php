@extends('layout.users.app')
@section('title')
    Profile Settings
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- heading --}}
        <strong class="font-1-5">Profile Settings</strong>
        {{-- profile details --}}
        <div style="border:1px solid var(--rgt-005)" class="column g-10 bg-light p-20 br-primary">
            {{-- new row --}}
            <div class="row align-center g-10 w-full">
                {{-- profile picture --}}
                <div style="height:70px;width:70px;min-height:70px;min-width:70px;border:1px solid var(--primary);border-radius:50%;">
                @isset(Auth::guard('users')->user()->photo)
                    <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class="w-full h-full br-inherit">
                @else
                 <div class="h-full column align-center justify-center primary-text no-select desc w-full bg-primary br-inherit">{{ $initials }}</div>
               
                @endisset       
                </div>
                {{-- profile details --}}
                <div class="column g-5">
                    {{-- full name --}}
                    <strong class="font-1">{{ Auth::guard('users')->user()->name }}</strong>
                    {{-- email --}}
                    <small class="opacity-08">{{ Auth::guard('users')->user()->email }}</small>
                    {{-- username and package --}}
                    <div class="row no-select align-center g-5">
                        <div class="bg-primary p-2 p-x-5 br-0 primary-text bold">
                            {{ ucfirst(Auth::guard('users')->user()->username) }}
                        </div>
                         <div style="background:orangered;color:white;" class="p-2 p-x-5 br-0 bold">
                            {{ $package }}
                        </div>
                    </div>
                </div>
               
            </div>

             {{-- action btns --}}
                <div class="row align-center g-10">
                    {{-- update profile btn --}}
                    <button onclick="document.querySelector('.modal.photo-modal').classList.add('active')" class="btn-primary-3d">Update Profile</button>
                    {{-- upgrade btn --}}
                   @if (Auth::guard('users')->user('upgrade') == 'no')
                        <button onclick="Redirect('{{ url('users/upgrade/account') }}')" class="btn-green-3d g-5">Upgrade</button>
              
                   @else
                       
                   @endif
                </div>
        </div>

        {{-- basic info --}}
        <div style="border:1px solid var(--rgt-005)" class="w-full br-primary bg-light column g-10">
          {{-- title --}}
            <div style="border-bottom:0.1px solid var(--rgt-005)" class="w-full row align-center bold desc g-10 p-20">Basic Information</div>
      <div class="w-full p-20 column g-10">
         {{-- new detail --}}
       <div class="w-full column g-5">
        <span class="opacity-08">Full Name</span>
        <strong class="font-1">{{ Auth::guard('users')->user()->name }}</strong>
       </div>
         {{-- new detail --}}
       <div class="w-full column g-5">
        <span class="opacity-08">User ID</span>
        <div class="row g-5 align-center">
            <strong class="font-1">{{ Auth::guard('users')->user()->uniqid }}</strong>
            <span onclick="copy('{{ Auth::guard('users')->user()->uniqid }}')" style="background: var(--rgt-01);padding:3px;border-radius:3px;border:1px solid var(--rgt-06);color:var(--rgt-06)" class="column pc-pointer h-fit w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M180,64H40A12,12,0,0,0,28,76V216a12,12,0,0,0,12,12H180a12,12,0,0,0,12-12V76A12,12,0,0,0,180,64ZM168,204H52V88H168ZM228,40V180a12,12,0,0,1-24,0V52H76a12,12,0,0,1,0-24H216A12,12,0,0,1,228,40Z"></path></svg>

            </span>
        </div>
       </div>
        {{-- new detail --}}
       <div class="w-full column g-5">
        <span class="opacity-08">Username</span>
        <strong class="font-1">{{ Auth::guard('users')->user()->username }}</strong>
       </div>
       {{-- new detail --}}
       <div class="w-full column g-5">
        <span class="opacity-08">Phone Number</span>
        <strong class="font-1">{{ Auth::guard('users')->user()->phone }}</strong>
       </div>
       {{-- new detail --}}
       <div class="w-full column g-5">
        <span class="opacity-08">Joined</span>
        <strong class="font-1">{{ $joined }}</strong>
       </div>


      </div>
       
        </div>
    </section>
    {{-- update profile modal --}}
    <section onclick="this.classList.remove('active')" class="modal photo-modal">
        <div onclick="event.stopPropagation()" class="child">
            <strong class="desc">Update profile photo</strong>
            {{-- form --}}
            <form action="{{ url('users/post/update/profile/photo/process') }}" onsubmit="PostRequest(event,this,Updated)" method="POST"  class="w-full column g-10">
             {{-- csrf token --}}
             <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
                {{-- new input --}}
                <div class="column g-5 w-full">
                    <label>Select Photo</label>
                    <div class="cont">
                        <input name="photo"  type="file" accept="image/*" class="inp required input">
                    </div>
                </div>
                <button class="post">Update Photo</button>
            </form>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
       
            function Updated(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Redirect('{{ $url_current }}');
                }
            }
        
    </script>
@endsection
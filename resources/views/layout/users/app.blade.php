<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])


{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }} || Users || @yield('title') </title>
    <style>
      body{
        overflow-x: hidden;
      }
        header{
            position:fixed !important;
            top:0;
            left:0;
            right:0;
            z-index:3000;
            background:transparent;
             background:var(--bg-light);
            border-bottom:1px solid var(--rgt-005);
            display:flex;
            flex-direction:row;
            align-items:center;
            justify-content:space-between;
            padding:20px;
            position: relative;
            user-select:none;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(50px);

        }
        nav{
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            z-index:4000;
            background:rgb(0,0,0,0.4);
            display:flex;
            flex-direction:row;
            gap:10px;
            user-select: none;
        }
        nav > .child{
            background:var(--bg-light);
            width:70%;
            height:100%;
            border-right:1px solid var(--rgt-01);
            position:relative;
            /* font-weight:600; */

        }
        nav > .child .header{
            background:inherit;
            border-bottom:1px solid var(--rgt-01);
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:10px;
            padding:20px;
            position:absolute;
            top:0;
            z-index:500;
            width:100%;
           
        }
         nav > .child .footer{
            background:inherit;
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:10px;
            padding:20px;
            position:absolute;
            bottom:0;
            left:0;
            right:0;
            z-index:500;
            margin-top:auto;
           
        }
        nav > .child .body{
            padding:10px;
            display:flex;
            flex-direction:column;
            gap:5px;
            width:100%;
            overflow: auto;
        }
        nav > .child .body .link{
            padding:10px;
            cursor:pointer;
            user-select:none;
            border-radius:0;
            transition: all 0.2s ease;
            font-weight:600;
        }
        nav > .child .body .link:hover,nav > .child .body .link.active{
           
            background:var(--rgt-005);
            border:1px solid var(--rgt-01);
         

        }
        .header-links{
            position:absolute;
            right:10px;
            background:rgba(0,0,0,0.7);
            color:white;
            z-index:2000;
            border-radius:10px;
            display:flex;
            flex-direction: column;
          
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width:50%;
            visibility: hidden;
            opacity:0;
            transform: scale(0);
            transition: all 0.5s ease;
            transform-origin:top right;
            backdrop-filter: inherit;
            -webkit-backdrop-filter: inherit;
            user-select: none;
            -webkit-user-select: none;
          
        }
        .header-links.active{
            visibility:visible;
            transform:scale(1);
            opacity:1;
        }
        .header-links > div{
            border-bottom:1px solid rgba(255,255,255,0.1);
            padding:10px 20px !important;
        }
        .header-links > div:last-of-type{
            border-bottom:none;
            color:orangered;
        }
        main{
            padding-bottom:40px;
        }
        footer{
            position:fixed;
            bottom:0;
            left:0;
            right:0;
            display:grid;
            grid-template-columns: repeat(4,1fr);
            gap:10px;
            place-items: center;
             backdrop-filter: blur(50px);
            -webkit-backdrop-filter: blur(50px);
            z-index:2700;
            background:var(--bg-light);
            border-top:1px solid var(--rgt-005)
        }
        footer > div{
            display:flex;
            flex-direction: column;
            gap:10px;
            padding:10px;
            align-items:center;
            opacity:0.7;
            font-weight:900;
            
           
        }
        footer > div.active{
            color:var(--primary-dark);
        }
        main{
            overflow-x: hidden;
        }
         .populate{
            position:fixed;
            inset: 0;
            background:rgba(0,0,0,0.5);
            z-index:4000;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter:blur(10px);
            display:flex;
            flex-direction:column;
            gap:10px;
            padding:20px;
            align-items:center;
            justify-content:center;
            visibility: hidden;
        
        }
        .populate .child{
            background:black;
            border:1px solid var(--primary);
            padding:20px;
            width:80%;
            color:white;
            border-radius:5px;
            display:flex;
            flex-direction:column;
            gap:10px;
            text-align:center;
            color:var(--primary-light);
            transform:translateY(30px);
            opacity:0;
            transition:all 1s ease;
            max-width:500px;

            

        }
        .populate.active{
            visibility: visible;
        }
        .populate.active .child{
            opacity:1;
            transform:translateY(0);
        }
        body:has(.populate.active){
            overflow:hidden;
        }
      
        /* media query for mobile devices */
        @media(max-width:800px){
           nav{
           display:none;
            transition: all 0.5s ease;
           }
           nav.active{
            display:flex;
           }
           nav .child{
          
            transition: all 0.5s ease;
           }
           nav.active .child{
           
            animation:anime 0.5s ease forwards;
           }
           @keyframes anime {
            0%{
                  transform: translateX(-100%);
            },
            100%{
                 transform:translateX(0);
            }
           }
           
            body:has(nav.active){
                overflow:hidden;
            }
        }
        /* media query for pc */
        @media(min-width:800px){
            nav{
                width:30%;
            }
            nav > .child{
                width:100% !important;
                
            }
            main{
                width:70%;
                margin-left:30%;
            }
            footer{
                width:70%;
                margin-left:30%;
            }
        }
    </style>
</head>
<body>
    {{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
     {{-- include users only codes --}}
    @include('components.utilities',[
        'users_codes' => true
    ])
     {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    <header>

     {{-- logo and menu icon --}}
     <div class="row align-center g-10">
        {{-- menu icon --}}
           <span onclick="ToggleNav(this)" class="h-fit column opacity-07">
 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 4H21V6H3V4ZM3 11H15V13H3V11ZM3 18H21V20H3V18Z"></path></svg>
        </span>
        {{-- logo --}}
        <img onclick="window.location.href='{{ url('/') }}'" src="{{ asset(config('settings.logo')) }}" alt="Site Logo" class="h-40">
   
     </div>

     {{-- user icon --}}
   <div class="pc-pointer" onclick="ToggleHeaderLinks(this)">
     @isset(Auth::guard('users')->user()->photo)
           <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" style="border:1px solid var(--primary)" class="w-40 h-40 circle">
               @else
                <div class="w-40 h-40 min-h-40 min-w-40 perfect-square no-shrink circle bg-primary column align-center justify-center primary-text">
    {{ $initials }}
            </div>
     @endisset
               
   </div>

    {{-- header links --}}
     <div class="header-links">
        {{-- head --}}
        <div class="w-full p-10 row g-5">
             @isset(Auth::guard('users')->user()->photo)
           <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" style="border:1px solid var(--primary)" class="w-40 h-40 circle">
               @else
                <div class="w-40 h-40 min-h-40 min-w-40 perfect-square no-shrink circle bg-primary column align-center justify-center primary-text">
    {{ $initials }}
            </div>
     @endisset
            <div class="column g-5">
                <strong class="ws-nowrap">{{ Auth::guard('users')->user()->name }}</strong>
                <div>{{ Auth::guard('users')->user()->username }}</div>
            </div>
        </div>
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/profile/settings') }}')" class="row p-10 w-full g-10 align-center">
            <span>

                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>

            </span>
            <span>View Profile</span>
        </div>
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM12 8C12.5523 8 13 7.55228 13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7C11 7.55228 11.4477 8 12 8Z"></path></svg>

            </span>
            <span>Payout Settings</span>
        </div>
        
         {{-- new header link --}}
          @if (Auth::guard('users')->user('upgrade') == 'no')
        <div onclick="Redirect('{{ url('users/upgrade/account') }}')" class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM13 12H16L12 8L8 12H11V16H13V12Z"></path></svg>

            </span>
            <span>Upgrade Account</span>
        </div>
        @endif
         {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/security/settings') }}')" class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17ZM11 14V18H13V14H11Z"></path></svg>
           </span>
            <span>Security Settings</span>
        </div>
         {{-- new header link --}}
        <div class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21 8C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8H21ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z"></path></svg>

            </span>
            <span>Customer Support</span>
        </div>
         {{-- new header link --}}
        <div onclick="window.location.href='{{ url('users/logout') }}'" class="row p-10 w-full g-10 align-center">
            <span>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M124,216a12,12,0,0,1-12,12H48a12,12,0,0,1-12-12V40A12,12,0,0,1,48,28h64a12,12,0,0,1,0,24H60V204h52A12,12,0,0,1,124,216Zm108.49-96.49-40-40a12,12,0,0,0-17,17L195,116H112a12,12,0,0,0,0,24h83l-19.52,19.51a12,12,0,0,0,17,17l40-40A12,12,0,0,0,232.49,119.51Z"></path></svg>

            </span>
            <span>Logout</span>
        </div>
     </div>
    </header>
    {{-- nav --}}
    <nav onclick="ToggleNav(this)">
        {{-- nav child --}}
<div onclick="event.stopPropagation()" class="child">
    {{-- nav child header --}}
<div class="header">
<img src="{{ asset(config('settings.logo')) }}" alt="Site Logo" class="h-40">
   

</div>
{{-- nav child body --}}
<div class="body overflow-auto">
{{-- new link --}}
<div onclick="Redirect('{{ url('users/dashboard') }}')" class="row link w-full align-center g-10">
    <span>
      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20Z"></path></svg>

    </span>
    <span>Dashboard</span>
</div>
{{-- new link --}}
<div onclick="Redirect('{{ url('users/transactions') }}')" class="row link w-full align-center g-10">
    <span>
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9 4L6 2L3 4V16V19C3 20.6569 4.34315 22 6 22H20C21.6569 22 23 20.6569 23 19V17H7V19C7 19.5523 6.55228 20 6 20C5.44772 20 5 19.5523 5 19V15H21V4L18 2L15 4L12 2L9 4Z"></path></svg>

    </span>
    <span>Transactions</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/tasks') }}')" class="row link w-full align-center g-10">
    <span>
   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

    </span>
    <span>Daily Tasks</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/gift/code') }}')" class="row link w-full align-center g-10">
    <span>
   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20.0049 13.0028V20.0028C20.0049 20.5551 19.5572 21.0028 19.0049 21.0028H5.00488C4.4526 21.0028 4.00488 20.5551 4.00488 20.0028V13.0028H20.0049ZM14.5049 2.00281C16.4379 2.00281 18.0049 3.56981 18.0049 5.50281C18.0049 6.04001 17.8839 6.54895 17.6676 7.00385L21.0049 7.00281C21.5572 7.00281 22.0049 7.45052 22.0049 8.00281V11.0028C22.0049 11.5551 21.5572 12.0028 21.0049 12.0028H3.00488C2.4526 12.0028 2.00488 11.5551 2.00488 11.0028V8.00281C2.00488 7.45052 2.4526 7.00281 3.00488 7.00281L6.34219 7.00385C6.12591 6.54895 6.00488 6.04001 6.00488 5.50281C6.00488 3.56981 7.57189 2.00281 9.50488 2.00281C10.4849 2.00281 11.3708 2.40557 12.0061 3.05459C12.639 2.40557 13.5249 2.00281 14.5049 2.00281ZM9.50488 4.00281C8.67646 4.00281 8.00488 4.67438 8.00488 5.50281C8.00488 6.2825 8.59977 6.92326 9.36042 6.99594L9.50488 7.00281H11.0049V5.50281C11.0049 4.72311 10.41 4.08236 9.64934 4.00967L9.50488 4.00281ZM14.5049 4.00281L14.3604 4.00967C13.6473 4.07782 13.0799 4.64524 13.0117 5.35835L13.0049 5.50281V7.00281H14.5049L14.6493 6.99594C15.41 6.92326 16.0049 6.2825 16.0049 5.50281C16.0049 4.72311 15.41 4.08236 14.6493 4.00967L14.5049 4.00281Z"></path></svg>

    </span>
    <span>Gift Code</span>
</div>
{{-- new link --}}
<div onclick="Redirect('{{ url('users/referrals') }}')" class="row link w-full align-center g-10">
    <span>
   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>

    </span>
    <span>My Downlines</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/withdraw') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 5.99979H15.0049C11.6912 5.99979 9.00488 8.68608 9.00488 11.9998C9.00488 15.3135 11.6912 17.9998 15.0049 17.9998H22.0049V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V5.99979ZM15.0049 7.99979H23.0049V15.9998H15.0049C12.7957 15.9998 11.0049 14.2089 11.0049 11.9998C11.0049 9.79065 12.7957 7.99979 15.0049 7.99979ZM15.0049 10.9998V12.9998H18.0049V10.9998H15.0049Z"></path></svg>

    </span>
    <span>Withdraw</span>
</div>
{{-- new link --}}
<div onclick="Redirect('{{ url('users/recharge') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 8.99979H21.0049C21.5572 8.99979 22.0049 9.4475 22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V8.99979ZM3.00488 2.99979H18.0049V6.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM15.0049 13.9998V15.9998H18.0049V13.9998H15.0049Z"></path></svg>

    </span>
    <span>Add Funds</span>
</div>


{{-- new link --}}
<div onclick="Redirect('{{ url('users/daily/spin') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"></path></svg>
   </span>
    <span>Daily Spin</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM12 8C12.5523 8 13 7.55228 13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7C11 7.55228 11.4477 8 12 8Z"></path></svg>
    </span>
    <span>Payout Settings</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/profile/settings') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>
  </span>
    <span>Profile Settings</span>
</div>




</div>
{{-- nav child footer --}}
<div class="footer">
    <div style="border:1px solid red;color:red;" class="w-full bold no-select pointer br-5 p-10 align-center row justify-center g-10">
     <span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M124,216a12,12,0,0,1-12,12H48a12,12,0,0,1-12-12V40A12,12,0,0,1,48,28h64a12,12,0,0,1,0,24H60V204h52A12,12,0,0,1,124,216Zm108.49-96.49-40-40a12,12,0,0,0-17,17L195,116H112a12,12,0,0,0,0,24h83l-19.52,19.51a12,12,0,0,0,17,17l40-40A12,12,0,0,0,232.49,119.51Z"></path></svg>

     </span>
        <span>Logout</span>
    </div>
</div>
</div>
    </nav>
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>
        {{-- new nav --}}
        <div class="{{ url()->current() == url('users/dashboard') ? 'active' : '' }}" onclick="Redirect('{{ url('users/dashboard') }}')">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20Z"></path></svg>
            <span>Home</span>
        </div>
        {{-- new nav --}}
         <div class="{{ url()->current() == url('users/tasks') ? 'active' : '' }}" onclick="Redirect('{{ url('users/tasks') }}')">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>
             <span>Tasks</span>
        </div>
         {{-- new nav --}}
         <div class="{{ url()->current() == url('users/withdraw') ? 'active' : '' }}" onclick="Redirect('{{ url('users/withdraw') }}')">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 5.99979H15.0049C11.6912 5.99979 9.00488 8.68608 9.00488 11.9998C9.00488 15.3135 11.6912 17.9998 15.0049 17.9998H22.0049V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V5.99979ZM15.0049 7.99979H23.0049V15.9998H15.0049C12.7957 15.9998 11.0049 14.2089 11.0049 11.9998C11.0049 9.79065 12.7957 7.99979 15.0049 7.99979ZM15.0049 10.9998V12.9998H18.0049V10.9998H15.0049Z"></path></svg>
             <span>Withdraw</span>
        </div>
         {{-- new nav --}}
         <div class="{{ url()->current() == url('users/profile/settings') ? 'active' : '' }}" onclick="Redirect('{{ url('users/profile/settings') }}')">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
             <span>Profile</span>
        </div>
    </footer>
  @include('components.utilities',[
    'vite_js' => true
  ])
  <script>
    window.addEventListener('load',()=>{
      try{
       
        document.querySelector('main').style.paddingTop=document.querySelector('header').getBoundingClientRect().height + 20 + 'px';
         document.querySelector('nav > .child .body').style.height=Math.abs(window.innerHeight - (document.querySelector('nav > .child .header').getBoundingClientRect().height + document.querySelector('nav > .child .footer').getBoundingClientRect().height)) + 'px';
      document.querySelector('.header-links').style.top=document.querySelector('header').getBoundingClientRect().bottom + 'px';
       document.querySelector('main').style.paddingBottom=document.querySelector('footer').getBoundingClientRect().height + 10 + 'px';
      if(window.innerWidth >= 800){
            document.querySelector('nav > .child .header').style.minHeight=document.querySelector('header').getBoundingClientRect().height + 'px';
        }
           document.querySelector('nav > .child .body').style.marginTop=(document.querySelector('nav > .child .header').getBoundingClientRect().height) + 'px';
            document.querySelector('nav > .child .body').style.height=Math.abs(window.innerHeight - (document.querySelector('nav > .child .header').getBoundingClientRect().height + document.querySelector('nav > .child .footer').getBoundingClientRect().height)) + 'px';
    

       
      }catch(error){
        alert(error.stack)
      }
    });
    function ToggleNav(element){
       
        let nav=document.querySelector('nav');
            if(nav.classList.contains('active')){
                 nav.classList.remove('active');
         
            }else{
                 nav.classList.add('active');
         
            }
               document.querySelector('nav > .child .body').style.marginTop=(document.querySelector('nav > .child .header').getBoundingClientRect().height) + 'px';
            document.querySelector('nav > .child .body').style.height=Math.abs(window.innerHeight - (document.querySelector('nav > .child .header').getBoundingClientRect().height + document.querySelector('nav > .child .footer').getBoundingClientRect().height)) + 'px';
    
    }
    function ToggleHeaderLinks(element){
        let header_links=document.querySelector('.header-links');
        if(header_links.classList.contains('active')){
            header_links.classList.remove('active');
        }else{
            header_links.classList.add('active');
        }

    }
    function Redirect(url){
        window.location.href=url;
    }
   
  </script>
  {{-- yield js --}}
    @yield('js')
</body>
</html>
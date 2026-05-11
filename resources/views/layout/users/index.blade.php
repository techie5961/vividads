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
    <title>{{ config('app.name') }} || @yield('title') </title>
    <style>
      main{
        overflow-x: hidden;
      }
     header{
        position:fixed;
        top:20px;
        left:50%;
        width:calc(100% - 40px);
        background:var(--bg-light);
        border:1px solid var(--rgt-005);
        padding:10px;
        transform:translateX(-50%);
        border-radius:1000px;
        display:flex;
        flex-direction:row;
        align-items:center;
        justify-content: space-between;
        gap:10px;
         border:1px solid var(--rgt-005);
           user-select:none;
       -webkit-user-select:none;
       z-index:2000;
     }
     header img{
        pointer-events: none;
     }
     
     footer{
        width:100%;
        background:var(--primary-dark);
        color:var(--primary-text);
        padding:20px;
        border-top:5px solid var(--primary);
        display:flex;
        flex-direction:column;
        gap:10px;
     }
     /* mobile devices */
     @media(max-width:800px){
        .menu-icon{
        height:40px;
        width:40px;
        flex-shrink:0;
        display:flex;
        align-items:center;
        justify-content:center;
        background:var(--primary);
        color:var(--primary-text);
        border-radius:50%;

     }
     nav{
        position:absolute;
        top:calc(100% + 10px);
        left:0;
        right:0;
        border-radius:20px;
        background:inherit;
        border:1px solid var(--rgt-005);
       font-size:1rem;
       user-select:none;
       -webkit-user-select:none;
       z-index: inherit;
     }
     nav > div{
        padding:10px 20px;
        cursor: pointer;
     }
     nav > div:last-of-type{
        padding-bottom:20px;
     }
     nav > div:first-of-type{
        padding-top:20px;
     }
     nav{
        visibility: hidden;
        transform:scale(0);
        transform-origin: top right;
        opacity:0;
        transition:all 0.5s ease;

     }
     nav.active{
        visibility: visible;
        transform:scale(1);
        opacity:1;
        
     }
     }
     /* pc */
     @media(min-width:800px){
        header{
            width:80%;
            padding:10px 20px;
        }
        .menu-icon{
            display:none;
        }
        nav{
            visibility: visible;
            opacity:1;
            transform:scale(1);
            position:relative;
            display:flex;
            flex-direction:row;
            align-items:center;
            
            gap:10px;
            font-size:0.9rem;
            font-weight:900;
            gap:20px;

            
        }
        nav > div{
            height:fit-content;
        }
        nav button.post{
            padding: 10px 20px;
            height:fit-content;
            border-radius: 10px !important;
        }
     }
     @media(min-width:800px){
        main{
            padding:20px 10vw;
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
    {{-- header --}}
    <header>
        {{-- site logo --}}
    <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-30">
    {{-- app name --}}
    <div class="row m-right-auto g-5">
        <strong class="font-1">{{ explode(' ',config('app.name'))[0] ?? '' }}</strong>
        <strong class="font-1 c-primary">{{ explode(' ',config('app.name'))[1] ?? '' }}.</strong>
    </div>
    {{-- menu icon --}}
    <div onclick="this.classList.toggle('active');document.querySelector('nav').classList.toggle('active')" class="menu-icon">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18 18V20H6V18H18ZM21 11V13H3V11H21ZM18 4V6H6V4H18Z"></path></svg>

    </div>

    {{-- nav --}}
    <nav>
        <div onclick="window.location.href='{{ url('/') }}'">
            <span>Home</span>
        </div>
         <div onclick="window.location.href='{{ url()->current() == url('/') ? '#features' : url('/') }}'">
            <span>Features</span>
        </div>
         <div onclick="window.location.href='{{ url()->current() == url('/') ? '#faqs' : url('/') }}'">
            <span>FAQs</span>
        </div>
         <div onclick="window.location.href='{{ url('privacy') }}'">
            <span>Privacy Policy</span>
        </div>
          <div onclick="window.location.href='{{ url('terms') }}'">
            <span>Terms of Service</span>
        </div>
        <div onclick="window.location.href='{{ url('login') }}'">
            <span>Sign In</span>
        </div>
        <div>
            <button  onclick="window.location.href='{{ url('register') }}'" style="margin-top:0 !important" class="post br-1000">Sign Up Now</button>
        </div>
    </nav>
    </header>
   
    <main>
        
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>
 {{-- app name --}}
    <div class="row m-right-auto g-5">
        <strong class="desc">{{ explode(' ',config('app.name'))[0] ?? '' }}</strong>
        <strong class="desc c-primary">{{ explode(' ',config('app.name'))[1] ?? '' }}.</strong>
    </div>
    {{-- new --}}
    <span>Micro gigs for social media earnings & advertising</span>
    {{-- new row --}}
    <div class="row w-fit g-10 align-center">
       {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 h-30 no-shrink circle column align-center justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.001 2C6.47598 2 2.00098 6.475 2.00098 12C2.00098 16.425 4.86348 20.1625 8.83848 21.4875C9.33848 21.575 9.52598 21.275 9.52598 21.0125C9.52598 20.775 9.51348 19.9875 9.51348 19.15C7.00098 19.6125 6.35098 18.5375 6.15098 17.975C6.03848 17.6875 5.55098 16.8 5.12598 16.5625C4.77598 16.375 4.27598 15.9125 5.11348 15.9C5.90098 15.8875 6.46348 16.625 6.65098 16.925C7.55098 18.4375 8.98848 18.0125 9.56348 17.75C9.65098 17.1 9.91348 16.6625 10.201 16.4125C7.97598 16.1625 5.65098 15.3 5.65098 11.475C5.65098 10.3875 6.03848 9.4875 6.67598 8.7875C6.57598 8.5375 6.22598 7.5125 6.77598 6.1375C6.77598 6.1375 7.61348 5.875 9.52598 7.1625C10.326 6.9375 11.176 6.825 12.026 6.825C12.876 6.825 13.726 6.9375 14.526 7.1625C16.4385 5.8625 17.276 6.1375 17.276 6.1375C17.826 7.5125 17.476 8.5375 17.376 8.7875C18.0135 9.4875 18.401 10.375 18.401 11.475C18.401 15.3125 16.0635 16.1625 13.8385 16.4125C14.201 16.725 14.5135 17.325 14.5135 18.2625C14.5135 19.6 14.501 20.675 14.501 21.0125C14.501 21.275 14.6885 21.5875 15.1885 21.4875C19.259 20.1133 21.9999 16.2963 22.001 12C22.001 6.475 17.526 2 12.001 2Z"></path></svg>

        </div>
        {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 h-30 no-shrink circle column align-center justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.0281 2.00073C14.1535 2.00259 14.7238 2.00855 15.2166 2.02322L15.4107 2.02956C15.6349 2.03753 15.8561 2.04753 16.1228 2.06003C17.1869 2.1092 17.9128 2.27753 18.5503 2.52503C19.2094 2.7792 19.7661 3.12253 20.3219 3.67837C20.8769 4.2342 21.2203 4.79253 21.4753 5.45003C21.7219 6.0867 21.8903 6.81337 21.9403 7.87753C21.9522 8.1442 21.9618 8.3654 21.9697 8.58964L21.976 8.78373C21.9906 9.27647 21.9973 9.84686 21.9994 10.9723L22.0002 11.7179C22.0003 11.809 22.0003 11.903 22.0003 12L22.0002 12.2821L21.9996 13.0278C21.9977 14.1532 21.9918 14.7236 21.9771 15.2163L21.9707 15.4104C21.9628 15.6347 21.9528 15.8559 21.9403 16.1225C21.8911 17.1867 21.7219 17.9125 21.4753 18.55C21.2211 19.2092 20.8769 19.7659 20.3219 20.3217C19.7661 20.8767 19.2069 21.22 18.5503 21.475C17.9128 21.7217 17.1869 21.89 16.1228 21.94C15.8561 21.9519 15.6349 21.9616 15.4107 21.9694L15.2166 21.9757C14.7238 21.9904 14.1535 21.997 13.0281 21.9992L12.2824 22C12.1913 22 12.0973 22 12.0003 22L11.7182 22L10.9725 21.9993C9.8471 21.9975 9.27672 21.9915 8.78397 21.9768L8.58989 21.9705C8.36564 21.9625 8.14444 21.9525 7.87778 21.94C6.81361 21.8909 6.08861 21.7217 5.45028 21.475C4.79194 21.2209 4.23444 20.8767 3.67861 20.3217C3.12278 19.7659 2.78028 19.2067 2.52528 18.55C2.27778 17.9125 2.11028 17.1867 2.06028 16.1225C2.0484 15.8559 2.03871 15.6347 2.03086 15.4104L2.02457 15.2163C2.00994 14.7236 2.00327 14.1532 2.00111 13.0278L2.00098 10.9723C2.00284 9.84686 2.00879 9.27647 2.02346 8.78373L2.02981 8.58964C2.03778 8.3654 2.04778 8.1442 2.06028 7.87753C2.10944 6.81253 2.27778 6.08753 2.52528 5.45003C2.77944 4.7917 3.12278 4.2342 3.67861 3.67837C4.23444 3.12253 4.79278 2.78003 5.45028 2.52503C6.08778 2.27753 6.81278 2.11003 7.87778 2.06003C8.14444 2.04816 8.36564 2.03847 8.58989 2.03062L8.78397 2.02433C9.27672 2.00969 9.8471 2.00302 10.9725 2.00086L13.0281 2.00073ZM12.0003 7.00003C9.23738 7.00003 7.00028 9.23956 7.00028 12C7.00028 14.7629 9.23981 17 12.0003 17C14.7632 17 17.0003 14.7605 17.0003 12C17.0003 9.23713 14.7607 7.00003 12.0003 7.00003ZM12.0003 9.00003C13.6572 9.00003 15.0003 10.3427 15.0003 12C15.0003 13.6569 13.6576 15 12.0003 15C10.3434 15 9.00028 13.6574 9.00028 12C9.00028 10.3431 10.3429 9.00003 12.0003 9.00003ZM17.2503 5.50003C16.561 5.50003 16.0003 6.05994 16.0003 6.74918C16.0003 7.43843 16.5602 7.9992 17.2503 7.9992C17.9395 7.9992 18.5003 7.4393 18.5003 6.74918C18.5003 6.05994 17.9386 5.49917 17.2503 5.50003Z"></path></svg>
            
        </div>
         {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 h-30 no-shrink circle column align-center justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z"></path></svg>

        </div>
        {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 h-30 no-shrink circle column align-center justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12.3584 9.38246C11.3857 9.78702 9.4418 10.6244 6.5266 11.8945C6.05321 12.0827 5.80524 12.2669 5.78266 12.4469C5.74451 12.7513 6.12561 12.8711 6.64458 13.0343C6.71517 13.0565 6.78832 13.0795 6.8633 13.1039C7.37388 13.2698 8.06071 13.464 8.41776 13.4717C8.74164 13.4787 9.10313 13.3452 9.50222 13.0711C12.226 11.2325 13.632 10.3032 13.7203 10.2832C13.7826 10.269 13.8689 10.2513 13.9273 10.3032C13.9858 10.3552 13.98 10.4536 13.9739 10.48C13.9361 10.641 12.4401 12.0318 11.666 12.7515C11.4351 12.9661 11.2101 13.1853 10.9833 13.4039C10.509 13.8611 10.1533 14.204 11.003 14.764C11.8644 15.3317 12.7323 15.8982 13.5724 16.4971C13.9867 16.7925 14.359 17.0579 14.8188 17.0156C15.0861 16.991 15.3621 16.7397 15.5022 15.9903C15.8335 14.2193 16.4847 10.3821 16.6352 8.80083C16.6484 8.6623 16.6318 8.485 16.6185 8.40717C16.6052 8.32934 16.5773 8.21844 16.4762 8.13635C16.3563 8.03913 16.1714 8.01863 16.0887 8.02009C15.7125 8.02672 15.1355 8.22737 12.3584 9.38246Z"></path></svg>

        </div>
          {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 h-30 no-shrink circle column align-center justify-center">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"></path></svg>

        </div>
         {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 h-30 no-shrink circle column align-center justify-center">
          <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17.6874 3.0625L12.6907 8.77425L8.37045 3.0625H2.11328L9.58961 12.8387L2.50378 20.9375H5.53795L11.0068 14.6886L15.7863 20.9375H21.8885L14.095 10.6342L20.7198 3.0625H17.6874ZM16.6232 19.1225L5.65436 4.78217H7.45745L18.3034 19.1225H16.6232Z"></path></svg>

        </div>
        
    </div>
    {{-- new --}}
    <strong class="m-top-10">Quick Links</strong>
    <div  onclick="window.location.href='{{ url('privacy') }}'">Privacy Policy</div>
    <div  onclick="window.location.href='{{ url('terms') }}'">Terms of Service</div>
    <div  onclick="window.location.href='{{ url('register') }}'">Get Started</div>
    <div  onclick="window.location.href='{{ url('login') }}'">Log In</div>
    <span class="row m-x-auto opacity-07">&copy;{{ date('Y') }} {{ config('app.name') }}. All rights reserved</span>
    </footer>
  @include('components.utilities',[
    'vite_js' => true
  ])
  <script>
   window.addEventListener('load',()=>{
    if(document.querySelector('.marginalize')){
          document.querySelector('.marginalize').style.paddingTop=Math.abs(document.querySelector('body').getBoundingClientRect().top - document.querySelector('header').getBoundingClientRect().bottom) + 20 + 'px'
 
    }
    })
  </script>
  {{-- yield js --}}
    @yield('js')
</body>
</html>
@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
        
        .balance-div{
          position:relative;
          background:radial-gradient(circle at 0% 0%, rgb(0, 26, 0),var(--primary-dark));
          border-radius:20px;
          overflow:hidden;
          color:var(--primary-text);
          /* box-shadow: 0 0 10px rgba(0,0,0,0.1) */

        }
        .balance-div::before{
            content:'';
            position:absolute;
            z-index:100;
            height:90%;
            aspect-ratio:1;
            background:var(--primary-text-01);
            border-radius:50%;
            top:0;
            right:0;
            transform: translate(40%,-40%)
            
        }
        .balance-div > div{
            width: 100%;
            display:flex;
            flex-direction: column;
            padding:20px;
            gap:10px;
            position: relative;
            z-index: 400;
        }
        .balance-div .withdraw-btn{
            background:var(--primary-text);
            color:var(--primary);
            padding:10px 20px;
            border-radius: 5px;
            font-weight:900;
        }
        div.go{
            height:30px;
            width:30px;
            flex-shrink:0;
            border-radius:50%;
            background:var(--rgt-005);
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content: center;
            box-shadow: inset 0 2px 5px var(--rgt-01);
            color:var(--rgt-05);
        }
        .communities{
            width:100%;
            border-radius:var(--br-primary);
            background: var(--primary);
            color:var(--primary-text);
            position: relative;
        }
        .communities::before{
            content:'';
            position:absolute;
            top:0;
            right:0;
            background:var(--primary-text);
            opacity:0.1;
            height:70%;
            aspect-ratio:1;
            border-radius:50%;
            transform: translateX(20%) translateY(-20%);
            
        }
        .communities::after{
            content:'';
            position:absolute;
            bottom:0;
            left:0;
            background:var(--primary-text);
            opacity:0.1;
            height:50%;
            aspect-ratio:1;
            border-radius:50%;
            transform: translateX(-20%) translateY(20%);
            
        }
        .communities > div{
            padding: 20px;
            display:flex;
            flex-direction: column;
            gap:10px;
            position:relative;
            z-index:100;

        }
        .post.join-telegram{
            background:linear-gradient(to right,rgb(2, 84, 117),rgb(0, 183, 255));
        }
        
    </style>
@endsection
@section('main')
<section onclick="this.classList.remove('active')" class="populate active">
<div onclick="event.stopPropagation()" class="child align-center text-center">
    <div class="h-70 w-70 no-shrink circle column align-center justify-center g-10 c-black" style="background:var(--primary-light)">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M20.0049 13.0028V20.0028C20.0049 20.5551 19.5572 21.0028 19.0049 21.0028H5.00488C4.4526 21.0028 4.00488 20.5551 4.00488 20.0028V13.0028H20.0049ZM14.5049 2.00281C16.4379 2.00281 18.0049 3.56981 18.0049 5.50281C18.0049 6.04001 17.8839 6.54895 17.6676 7.00385L21.0049 7.00281C21.5572 7.00281 22.0049 7.45052 22.0049 8.00281V11.0028C22.0049 11.5551 21.5572 12.0028 21.0049 12.0028H3.00488C2.4526 12.0028 2.00488 11.5551 2.00488 11.0028V8.00281C2.00488 7.45052 2.4526 7.00281 3.00488 7.00281L6.34219 7.00385C6.12591 6.54895 6.00488 6.04001 6.00488 5.50281C6.00488 3.56981 7.57189 2.00281 9.50488 2.00281C10.4849 2.00281 11.3708 2.40557 12.0061 3.05459C12.639 2.40557 13.5249 2.00281 14.5049 2.00281ZM9.50488 4.00281C8.67646 4.00281 8.00488 4.67438 8.00488 5.50281C8.00488 6.2825 8.59977 6.92326 9.36042 6.99594L9.50488 7.00281H11.0049V5.50281C11.0049 4.72311 10.41 4.08236 9.64934 4.00967L9.50488 4.00281ZM14.5049 4.00281L14.3604 4.00967C13.6473 4.07782 13.0799 4.64524 13.0117 5.35835L13.0049 5.50281V7.00281H14.5049L14.6493 6.99594C15.41 6.92326 16.0049 6.2825 16.0049 5.50281C16.0049 4.72311 15.41 4.08236 14.6493 4.00967L14.5049 4.00281Z"></path></svg>

    </div>
    <div style="border-top:1px dashed var(--primary-07);border-bottom:1px dashed var(--primary-07)" class="w-full p-5 column g-10">
        {{ nl2br($social_settings->site_notification) }}

    </div>
    <span class="font-size-07 opacity-07">💚{{ config('app.name') }} | Earn daily</span>
    <div class="column g-5 w-full">
         <button onclick="window.open('{{ $social_settings->telegram_community ?? '' }}')" class="post join-telegram" style="margin-top:0px !important;">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17.0943 7.14643C17.6874 6.93123 17.9818 6.85378 18.1449 6.82608C18.1461 6.87823 18.1449 6.92051 18.1422 6.94825C17.9096 9.39217 16.8906 15.4048 16.3672 18.2026C16.2447 18.8578 16.1507 19.1697 15.5179 18.798C15.1014 18.5532 14.7245 18.2452 14.3207 17.9805C12.9961 17.1121 11.1 15.8189 11.2557 15.8967C9.95162 15.0373 10.4975 14.5111 11.2255 13.8093C11.3434 13.6957 11.466 13.5775 11.5863 13.4525C11.64 13.3967 11.9027 13.1524 12.2731 12.8081C13.4612 11.7035 15.7571 9.56903 15.8151 9.32202C15.8246 9.2815 15.8334 9.13045 15.7436 9.05068C15.6539 8.97092 15.5215 8.9982 15.4259 9.01989C15.2904 9.05064 13.1326 10.4769 8.95243 13.2986C8.33994 13.7192 7.78517 13.9242 7.28811 13.9134L7.29256 13.9156C6.63781 13.6847 5.9849 13.4859 5.32855 13.286C4.89736 13.1546 4.46469 13.0228 4.02904 12.8812C3.92249 12.8466 3.81853 12.8137 3.72083 12.783C8.24781 10.8109 11.263 9.51243 12.7739 8.884C14.9684 7.97124 16.2701 7.44551 17.0943 7.14643ZM19.5169 5.21806C19.2635 5.01244 18.985 4.91807 18.7915 4.87185C18.5917 4.82412 18.4018 4.80876 18.2578 4.8113C17.7814 4.81969 17.2697 4.95518 16.4121 5.26637C15.5373 5.58382 14.193 6.12763 12.0058 7.03736C10.4638 7.67874 7.39388 9.00115 2.80365 11.001C2.40046 11.1622 2.03086 11.3451 1.73884 11.5619C1.46919 11.7622 1.09173 12.1205 1.02268 12.6714C0.970519 13.0874 1.09182 13.4714 1.33782 13.7738C1.55198 14.037 1.82635 14.1969 2.03529 14.2981C2.34545 14.4483 2.76276 14.5791 3.12952 14.6941C3.70264 14.8737 4.27444 15.0572 4.84879 15.233C6.62691 15.7773 8.09066 16.2253 9.7012 17.2866C10.8825 18.0651 12.041 18.8775 13.2243 19.6531C13.6559 19.936 14.0593 20.2607 14.5049 20.5224C14.9916 20.8084 15.6104 21.0692 16.3636 20.9998C17.5019 20.8951 18.0941 19.8479 18.3331 18.5703C18.8552 15.7796 19.8909 9.68351 20.1332 7.13774C20.1648 6.80544 20.1278 6.433 20.097 6.25318C20.0653 6.068 19.9684 5.58448 19.5169 5.21806Z"></path></svg>

            Join Telegram
        </button>

    <button onclick="window.open('{{ $social_settings->whatsapp_community ?? '' }}')" class="post" style="margin-top:0px !important;">
       <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z"></path></svg>

        Join Whatsapp
    </button>

    </div>
</div>
</section>
<section class="column w-full g-10">
    {{-- balance div --}}
    <div class="balance-div">
        {{-- balance div body --}}
        <div>
            {{-- new row --}}
            <div style="border-bottom:1px solid var(--primary-text-01);padding-bottom:20px;" class="row w-full space-between align-center g-10">
                <div class="column g-10">
                    <span>Earning Balance</span>
                    <strong class="font-size-1-5 font-weight-900">
                        {{ $currency }}{{ number_format(Auth::guard('users')->user()->main_balance,2) }}
                    </strong>
                </div>
                {{-- withdraw btn --}}
                <div class="withdraw-btn">Withdraw</div>
            </div>
            {{-- new row --}}
            <div class="row w-full g-10 space-between">
                {{-- total earned --}}
                <div class="column g-5">
                    <span>Deposit balance</span>
                    <strong class="desc font-weight-900">{{ $currency }}{{ number_format(Auth::guard('users')->user()->deposit_balance,2) }}</strong>
                </div>
                  {{-- total withdrawn --}}
                <div style="text-align: end" class="column g-5">
                    <span>Affiliate balance</span>
                    <strong class="desc font-weight-900">{{ $currency }}{{ number_format(Auth::guard('users')->user()->affiliate_balance,2) }}</strong>
                </div>
            </div>
        </div>
       
    </div>
   

    {{-- other items --}}
       <div class="row w-full other-balance-divs overflow-auto p-bottom-20 align-center g-5">
      {{-- new item --}}
        <div onclick="window.open('{{ $social_settings->advert->whatsapp ?? '' }}')" style="border:1px solid var(--rgt-005)" class="w-full p-10 bg-light br-20 column align-center justify-center g-10">
            <div class="row align-center g-5">
               {{-- icon --}}
                <div class="h-30 w-30 no-shrink circle bg-primary primary-text column align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"></path></svg>

                </div>
                {{-- new --}}
                <div class="column g-5">
                    <span>Place Ads</span>
                    <strong class="font-weight-600 ws-nowrap">Whatsapp</strong>
                </div>
                {{-- new --}}
                <div class="go">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                </div>
            </div>
        </div>
        {{-- new item --}}
        <div onclick="window.open('{{ $social_settings->advert->telegram ?? '' }}')" style="border:1px solid var(--rgt-005)" class="w-full bg-light br-20 column align-center justify-center g-10 p-y-20 p-10">
            <div class="row align-center g-10">
               {{-- icon --}}
               <div style="background:rgb(0, 161, 224)" class="h-30 w-30 no-shrink circle bg-primary primary-text column align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.14753 11.8099C7.3949 9.52374 10.894 8.01654 12.6447 7.28833C17.6435 5.20916 18.6822 4.84799 19.3592 4.83606C19.5081 4.83344 19.8411 4.87034 20.0567 5.04534C20.2388 5.1931 20.2889 5.39271 20.3129 5.5328C20.3369 5.6729 20.3667 5.99204 20.343 6.2414C20.0721 9.08763 18.9 15.9947 18.3037 19.1825C18.0514 20.5314 17.5546 20.9836 17.0736 21.0279C16.0283 21.1241 15.2345 20.3371 14.2221 19.6735C12.6379 18.635 11.7429 17.9885 10.2051 16.9751C8.42795 15.804 9.58001 15.1603 10.5928 14.1084C10.8579 13.8331 15.4635 9.64397 15.5526 9.26395C15.5637 9.21642 15.5741 9.03926 15.4688 8.94571C15.3636 8.85216 15.2083 8.88415 15.0962 8.9096C14.9373 8.94566 12.4064 10.6184 7.50365 13.928C6.78528 14.4212 6.13461 14.6616 5.55163 14.649C4.90893 14.6351 3.67265 14.2856 2.7536 13.9869C1.62635 13.6204 0.730432 13.4267 0.808447 12.8044C0.849081 12.4803 1.29544 12.1488 2.14753 11.8099Z"></path></svg>

                </div>
                {{-- data --}}
                <div class="column g-5">
                    <span>Place Ads</span>
                    <strong class="font-1 font-weight-600 ws-nowrap">Telegram</strong>
                </div>
                 {{-- new --}}
                <div class="go">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                </div>
            </div>
        </div>
       </div>
       {{-- quick links --}}
       <div class="grid grid-3 g-10 align-center">
        {{-- new link --}}
        <div onclick="Redirect('{{ url('users/tasks') }}')" style="border:1px solid var(--rgt-005)" class="bg-light w-full p-10 br-20 column align-center g-5">
            <div class="bg-primary h-40 w-40 circle min-w-40 min-h-40 primary-text column align-center justify-center">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </div>
            <span class="font-weight-600">Daily Tasks</span>
        </div>
         {{-- new link --}}
        <div onclick="Redirect('{{ url('users/gift/code') }}')" style="border:1px solid var(--rgt-005)" class="bg-light w-full p-10 br-20 column align-center g-5">
            <div style="background:orangered;color:white;" class="h-40 w-40 circle min-w-40 min-h-40 column align-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,68H190.06A33.82,33.82,0,0,0,196,49.69,36.62,36.62,0,0,0,158.31,12,33.44,33.44,0,0,0,134,23.25a54.65,54.65,0,0,0-6,8.3,54.65,54.65,0,0,0-6-8.3A33.44,33.44,0,0,0,97.69,12,36.62,36.62,0,0,0,60,49.69,33.82,33.82,0,0,0,65.94,68H40A20,20,0,0,0,20,88v32a20,20,0,0,0,16,19.6V200a20,20,0,0,0,20,20H200a20,20,0,0,0,20-20V139.6A20,20,0,0,0,236,120V88A20,20,0,0,0,216,68Zm-4,48H140V92h72ZM152,39.17A9.59,9.59,0,0,1,159,36h.35A12.62,12.62,0,0,1,172,49,9.59,9.59,0,0,1,168.83,56c-6.9,6.12-18.25,9.26-27.63,10.76C142.7,57.42,145.84,46.07,152,39.17ZM87.7,39.7A12.8,12.8,0,0,1,96.61,36H97A9.59,9.59,0,0,1,104,39.17c6.12,6.9,9.26,18.24,10.75,27.61C105.45,65.27,94,62.13,87.17,56A9.59,9.59,0,0,1,84,49,12.72,12.72,0,0,1,87.7,39.7ZM44,92h72v24H44Zm16,48h56v56H60Zm80,56V140h56v56Z"></path></svg>

            </div>
            <span class="font-weight-600">Gift Code</span>
        </div>
         {{-- new link --}}
        <div onclick="Redirect('{{ url('users/daily/spin') }}')" style="border:1px solid var(--rgt-005)" class="bg-light w-full p-10 br-20 column align-center g-5">
            <div style="background:rgb(108,92,230);color:white;" class="h-40 w-40 circle min-w-40 min-h-40 column align-center justify-center">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm83.65,100.47C188.51,136,170.71,133.74,151.92,126c7.87-6,15.29-12.73,21.35-21.16A74.85,74.85,0,0,0,187,68.25,83.73,83.73,0,0,1,211.65,120.47ZM163.3,51.8c1.9,27.81-9,42.09-25.09,54.48-1.24-9.82-3.38-19.61-7.64-29.08A75,75,0,0,0,105.69,47,83.73,83.73,0,0,1,163.3,51.8ZM79.69,59.35c25,12.25,31.93,28.8,34.6,48.94-9.12-3.82-18.66-6.87-29-7.91a75,75,0,0,0-38.59,6.46A84.2,84.2,0,0,1,79.69,59.35ZM44.35,135.53C67.49,120,85.29,122.26,104.08,130c-7.87,6-15.29,12.73-21.35,21.16A74.85,74.85,0,0,0,69,187.75,83.73,83.73,0,0,1,44.35,135.53ZM92.7,204.2c-1.9-27.81,9-42.09,25.09-54.48,1.24,9.82,3.38,19.61,7.64,29.08A75,75,0,0,0,150.31,209,83.73,83.73,0,0,1,92.7,204.2Zm83.61-7.55c-25-12.25-31.93-28.8-34.6-48.94,9.12,3.82,18.66,6.87,29,7.91q3.75.38,7.47.38a76,76,0,0,0,31.12-6.85A84.19,84.19,0,0,1,176.31,196.65Z"></path></svg>

            </div>
            <span class="font-weight-600">Daily Spin</span>
        </div>
       </div>
       {{-- refer section --}}
       <div style="border:1px solid var(--rgt-005)" class="bg-light br-20 p-20 column g-10">
       {{-- new row --}}
        <div class="row w-full g-10 align-center space-between">
            <strong class="desc">Share & Earn</strong>
            <span onclick="Redirect('{{ url('users/referrals') }}')" class="c-primary">View</span>
        </div>
        {{-- new row --}}
        <span>Invite your friends and earn commissions.</span>
        <div style="border:1px solid var(--rgt-005)" class="w-full row space-between align-center g-10 p-10 br-10">
            <span class="ws-nowrap overflow-auto no-scrollbar">{{ url('users/register?ref='.Auth::guard('users')->user()->uniqid.'') }}</span>
            <div onclick="copy('{{ url('users/register?ref='.Auth::guard('users')->user()->uniqid.'') }}')" class="p-10 ws-nowrap pc-pointer bg-primary primary-text p-x-20 no-select br-5">Copy</div>
        </div>
       </div>
       {{-- communities section --}}
        <div class="communities">
      <div class="column g-10">
         {{-- new row --}}
          <strong class="font-size-1-5 font-weight-900">Join our Official Communities</strong>
          {{-- new row --}}
          <span>Get instant notifications whenever we post new tasks and also connect with 5k+ members.</span>
       <div class="grid pc-grid-2 g-10 w-full">
        {{-- telegram btn --}}
       <div onclick="window.open('{{ $social_settings->telegram_community ?? '' }}')" style="background: rgb(2, 180, 250)" class="w-full row align-center g-5 justify-center font-1 h-50 br-5 bold p-10 text-center align-center justify-center">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12.3584 9.38246C11.3857 9.78702 9.4418 10.6244 6.5266 11.8945C6.05321 12.0827 5.80524 12.2669 5.78266 12.4469C5.74451 12.7513 6.12561 12.8711 6.64458 13.0343C6.71517 13.0565 6.78832 13.0795 6.8633 13.1039C7.37388 13.2698 8.06071 13.464 8.41776 13.4717C8.74164 13.4787 9.10313 13.3452 9.50222 13.0711C12.226 11.2325 13.632 10.3032 13.7203 10.2832C13.7826 10.269 13.8689 10.2513 13.9273 10.3032C13.9858 10.3552 13.98 10.4536 13.9739 10.48C13.9361 10.641 12.4401 12.0318 11.666 12.7515C11.4351 12.9661 11.2101 13.1853 10.9833 13.4039C10.509 13.8611 10.1533 14.204 11.003 14.764C11.8644 15.3317 12.7323 15.8982 13.5724 16.4971C13.9867 16.7925 14.359 17.0579 14.8188 17.0156C15.0861 16.991 15.3621 16.7397 15.5022 15.9903C15.8335 14.2193 16.4847 10.3821 16.6352 8.80083C16.6484 8.6623 16.6318 8.485 16.6185 8.40717C16.6052 8.32934 16.5773 8.21844 16.4762 8.13635C16.3563 8.03913 16.1714 8.01863 16.0887 8.02009C15.7125 8.02672 15.1355 8.22737 12.3584 9.38246Z"></path></svg>

        Telegram Community
    </div>
        {{-- whatsapp btn --}}
       <div onclick="window.open('{{ $social_settings->whatsapp_community ?? '' }}')" style="background:white;color:#4caf50;" class="w-full row align-center g-5 justify-center font-1 h-50 br-5 bold p-10 text-center align-center justify-center">
       <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"></path></svg>

        Whatsapp Community
    </div>
       
       </div>
      </div>
    </div>
</section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            Restyle : ()=> {
                
                let max_height=0;
                let balance_divs=document.querySelectorAll('.other-balance-divs > div');
              
                balance_divs.forEach((data)=>{
                    if(data.getBoundingClientRect().height > max_height){
                        max_height=data.getBoundingClientRect().height;
                       
                    }
                });
                balance_divs.forEach((data)=>{
                    data.style.height=max_height + 'px'
                })
            }
        }
        MyFunc.Restyle();
    </script>
@endsection
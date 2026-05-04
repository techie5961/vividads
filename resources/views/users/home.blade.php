@extends('layout.users.index')
@section('title')
    HomePage
@endsection
@section('css')
    <style class="css">
        main{
            padding:0;
        }
        .marginalize{

              background:var(--bg-img);
            background-size:cover;
            background-position:center;
            padding:20px;
            color:var(--primary-text);
            text-shadow:0 0 10px rgba(0,0,0,0.5);
            
        }
        .hero{
            display:flex;
            flex-direction: column;
            gap:10px;
            align-items:center;
            text-align: center;
            flex:1 0 auto;

        }
        .hero .hero-text{
            text-shadow: 0 0 10px rgba(0,0,0,0.5)
        }
        .glass-prompt{
            background:var(--primary-04);
            width:fit-content;
            border:1px solid var(--primary);
            user-select: none;
            -webkit-user-select: none;
            color:var(--primary-light);
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
            backdrop-filter:blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }
        .buttons > div{
            padding:10px 40px;
            display:flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap:5px;
            background:var(--primary);
            color:var(--primary-text);
            width:100%;
            border-radius:1000px;
            /* height:50px; */
            width:fit-content;
            margin-left:auto;
            margin-right:auto;
            box-shadow:0 0 10px rgba(0,0,0,0.5)
          
        }
        .banner{
            width:100%;
            max-width:800px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
        .banner > div{
            width:100%;
            overflow:hidden;
            border-radius:15px;
        }
        .banner img{
            width:100%;
            border-radius:inherit;
            transition: all 0.5s ease;
            pointer-events: none;

        }
        .banner img.active{
            transform: scale(1.5);
        }
        .card{
            padding:20px;
            background:var(--bg-light);
            border:1px solid var(--rgt-005);
            border-radius:10px;
            width:100%;
            display:flex;
            flex-direction:column;
            gap:10px;

        }
        .card .icon{
            height:50px;
            width:50px;
            background:var(--primary);
            color:var(--primary-text);
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content:center;
            border-radius:10px;
        }
        .faq{
            background:var(--bg-light);
            border:1px solid var(--rgt-01);
            padding:20px;
            border-radius:10px;
            
        }
        .faq .question{
            font-size:1rem;
            font-weight:600;
            width:100%;
            display:flex;
            flex-direction: row;
            align-items:center;
            justify-content: space-between;
            
        }
        .faq .answer{
            overflow:hidden;
            max-height:0;
            transition:all 0.5s ease;
            padding-top:10px;
        }
        .faq.active .answer{
            max-height:100000vh;
            
        }
        .faq svg{
             transition:all 0.5s ease;
        }
        .faq.active .question svg{
            transform:rotate(180deg);
        }
        .cta{
            width:100%;
            background:var(--primary);
            color:var(--primary-text);
            padding:20px;
            display:flex;
            flex-direction:column;
            gap:10px;
            border-radius:10px;
            position: relative;
            max-width:500px;
            margin-left: auto;
            margin-right: auto;
        }
        .cta > *{
           z-index:20;
        }
        .cta::before{
            content:'';
            position:absolute;
            height:60%;
            aspect-ratio:1;
            background:var(--primary-text);
            opacity:0.1;
            top:0;
            right:0;
            z-index:10;
            border-radius:50%;
            transform: translateX(20%) translateY(-20%)
        }
        .cta::after{
            content:'';
            position:absolute;
            height:40%;
            aspect-ratio:1;
            background:var(--primary-text);
            opacity:0.1;
            bottom:0;
            left:0;
            z-index:10;
            border-radius:50%;
            transform: translateX(-20%) translateY(20%)
        }
        button{
            width:100%;
            height:50px;
            background:var(--primary-text);
            color:var(--primary-dark);
           border-radius:10px;
           font-weight:600;
           user-select:none;
           -webkit-user-select:none;
           border:none;
        }
        @media(min-width:800px){
            main{
                padding:0 !important;
            }
            .hero,.section{
                padding:20px 10vw;
            }
            .hero{
                align-items: center;
                text-align: center;
            }
        }
    </style>
@endsection

@section('main')
 
    <section class="w-full column g-10">
        {{-- hero/marginalize --}}
        <div style="--bg-img:url({{ asset('banners/IMG_6884.jpeg') }});" class="marginalize hero">
           {{-- glass prompt --}}
            <div class="p-10 glass-prompt p-x-20 br-1000">
                ✨
                <span>Trusted by 5k+ Users</span>
            </div>
            {{-- hero text --}}
            <strong class="font-size-2 hero-text">Earn, Advertise & <br> <span style="color:var(--primary-lighter)">Dominate Social Media</span></strong>
        {{-- new --}}
         <span>Join {{ config('app.name') }} — the micro-gig revolution. Complete tasks, earn real rewards, or place ads in seconds. Daily spins, gift codes, and instant earnings await.</span>
           {{-- new row --}}
           <div class="row  buttons w-full g-10 align-center">
             {{-- new  --}}
            <div onclick="window.location.href='{{ url('register') }}'">
                Get Started
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 11H8V13H12V16L16 12L12 8V11Z"></path></svg>

            </div>
             
           </div>
           {{-- new --}}
             <div class="banner">
                <div class="w-full pos-relative">
                    <img src="{{ asset('banners/IMG_6904-compressed.jpeg') }}" alt="">
                </div>
                <div style="max-width:80%;color:var(--rgt-10);text-shadow:none;padding:10px;;transform:translateY(50%);border:1px solid var(--rgt-01)" class="pos-absolute row align-center g-5 bottom-0 left-0 bg-light w-fit">
                    <div class="h-50 br-10 w-50 no-shrink column align-center justify-center bg-primary primary-text">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </div>
                    <div class="column detail g-5">
                        <strong>Daily Tasks</strong>
                        <span class="ws-nowrap">All platforms</span>
                    </div>
                </div>
             </div>
        </div>
        {{-- new section --}}
      <section class="w-full section p-20 grid place-center pc-grid-2 g-10">

         <div style="box-shadow:0 0 10px rgba(0,0,0,0.1)" class="column w-full h-full g-10 bg-light">
            {{-- support img --}}
            <div class="banner" style="border-radius:inherit !important;">
            <div style="border-radius:0px !important;">
                 <img style="pointer-events: none;max-height:200px;border-radius:0px !important;" src="{{ asset('banners/IMG_6907-compressed.jpeg') }}" alt="" class="w-full no-pointer">
        
            </div>
            </div> 
          {{-- body --}}
            <div style="padding-top:0px !important;" class="p-20 column g-10">
                {{-- head --}}
               <div style="border-bottom:3px solid var(--primary-06)" >
                 <strong class="font-2">
                    Work from <span class="c-primary">Home</span><br>
                    Earn from <span class="c-primary">Home</span>
                </strong>
               </div>
               {{-- body --}}
                <div>
                     Join a community of freelancers delivering social media micro gigs — followers, engagement, content support — fully remote, no commute, total control over your schedule.
              
               </div>
            </div>
        </div>
        {{-- new item --}}
        <div style="box-shadow:0 0 10px rgba(0,0,0,0.1)" class="column h-full w-full g-10 bg-light">
            {{-- support img --}}
           <div class="banner" style="border-radius:inherit !important;">
            <div style="border-radius:0px !important;">
                 <img style="pointer-events: none;max-height:200px;border-radius:0px !important;" src="{{ asset('banners/IMG_6916-compressed.jpeg') }}" alt="" class="w-full no-pointer">
        
            </div>
            </div> 
             {{-- body --}}
            <div style="padding-top:0px !important;" class="p-20 column g-10">
                {{-- head --}}
               <div style="border-bottom:3px solid var(--primary-06)" >
                 <strong class="font-2">
                    24/7 <br><span class="c-primary">Active Customer Support</span>
                </strong>
               </div>
               {{-- body --}}
                <div>
                    Our support team is available around the clock, every day of the year.  
                    No delays, no downtime — real professionals ready to assist.
                </div>
            </div>
        </div>
      </section>

      {{-- features card --}}
      <section id="features" class="grid section p-x-20 p-bottom-10 pc-grid-2 g-10 place-center">
        <strong class="font-1-5 grid-full">Powerful Features for Everyone</strong>
        {{-- card --}}
        <div class="card">
            {{-- icon --}}
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0049 22.0027C6.48204 22.0027 2.00488 17.5256 2.00488 12.0027C2.00488 6.4799 6.48204 2.00275 12.0049 2.00275C17.5277 2.00275 22.0049 6.4799 22.0049 12.0027C22.0049 17.5256 17.5277 22.0027 12.0049 22.0027ZM8.50488 14.0027V16.0027H11.0049V18.0027H13.0049V16.0027H14.0049C15.3856 16.0027 16.5049 14.8835 16.5049 13.5027C16.5049 12.122 15.3856 11.0027 14.0049 11.0027H10.0049C9.72874 11.0027 9.50488 10.7789 9.50488 10.5027C9.50488 10.2266 9.72874 10.0027 10.0049 10.0027H15.5049V8.00275H13.0049V6.00275H11.0049V8.00275H10.0049C8.62417 8.00275 7.50488 9.12203 7.50488 10.5027C7.50488 11.8835 8.62417 13.0027 10.0049 13.0027H14.0049C14.281 13.0027 14.5049 13.2266 14.5049 13.5027C14.5049 13.7789 14.281 14.0027 14.0049 14.0027H8.50488Z"></path></svg>

            </div>
            {{-- head --}}
            <strong class="desc">Earn Per Task</strong>
            <span>Join groups, Like, share, comment — get paid instantly. Micro gigs starting from &#8358;1,000 up to &#8358;12,000 per task.</span>
        </div>
        {{-- card --}}
        <div class="card">
            {{-- icon --}}
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7.55197 13 8.39897 10.8852 9.24398 13H7.55197ZM16 12H17V14H16C15.4477 14 15 13.5523 15 13 15 12.4477 15.4477 12 16 12ZM21 3H3C2.44772 3 2 3.44772 2 4V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V4C22 3.44772 21.5523 3 21 3ZM12.598 16H10.443L10.043 15H6.75297L6.35297 16H4.19897L5.39797 13.002 5.39897 13 7.39897 8H9.39897L12.598 16ZM17 8H19V16H16C14.3431 16 13 14.6569 13 13 13 11.3431 14.3431 10 16 10H17V8Z"></path></svg>

            </div>
            {{-- head --}}
            <strong class="desc">Ad Campaigns</strong>
            <span>Promote your brand by placing ads via dashboard. Message admin, boost engagement,get active group members overnight.</span>
        </div>
          {{-- card --}}
        <div class="card">
            {{-- icon --}}
            <div class="icon">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12C15 13.6569 13.6569 15 12 15Z"></path></svg>

            </div>
            {{-- head --}}
            <strong class="desc">Daily Spin</strong>
            <span>Spin the wheel every 24h to win bonus cash, gift codes & surprise rewards! Up to &#8358;20,000 value.</span>
        </div>
          {{-- card --}}
        <div class="card">
            {{-- icon --}}
            <div class="icon">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </div>
            {{-- head --}}
            <strong class="desc">Daily Tasks</strong>
            <span>Fresh tasks everyday — simple social actions. Boost your daily income streak.</span>
        </div>
          {{-- card --}}
        <div class="card">
            {{-- icon --}}
            <div class="icon">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM13.0049 10.0028H11.0049V20.0028H13.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

            </div>
            {{-- head --}}
            <strong class="desc">Gift Codes</strong>
            <span>Redeem exclusive gift codes from partners or earn as rewards. Free credits and perks.</span>
        </div>
          {{-- card --}}
        <div class="card">
            {{-- icon --}}
            <div class="icon">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21 8C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8H21ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z"></path></svg>

            </div>
            {{-- head --}}
            <strong class="desc">VIP Support</strong>
            <span>24/7 dedicated support for both advertisers & taskers. Fast & friendly.</span>
        </div>
      </section>

       {{-- new section --}}
      <section class="w-full section p-20 grid place-center pc-grid-2 g-10">
        <strong class="font-1-5 grid-full">What our users say</strong>
          {{-- card --}}
        <div class="card">
            {{-- new row --}}
            <div style="color:orangered;" class="row w-full align-center g-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>

            </div>
            {{-- new row --}}
            <span>
                “{{ config('app.name') }} transformed my free time into real income! Daily spin won me &#8358;20,000. Highly recommend!”

            </span>
            {{-- new row --}}
            <div class="row w-fit g-10">
                <div class="h-40 w-40 circle bg-primary primary-text column align-center justify-center no-select">
                    SM
                </div>
                {{-- new column --}}
                <div class="column g-5">
                    <strong>Sophia M.</strong>
                    <span class="opacity-07">Influencer</span>
                </div>
            </div>
           
        </div>
          {{-- card --}}
        <div class="card">
            {{-- new row --}}
            <div style="color:orangered;" class="row w-full align-center g-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
              
            </div>
            {{-- new row --}}
            <span>
               “Placed an ad for my small business, got 10k+ impressions in 2 days. The dashboard messaging is so fast.”

            </span>
            {{-- new row --}}
            <div class="row w-fit g-10">
                <div class="h-40 w-40 circle bg-primary primary-text column align-center justify-center no-select">
                    JK
                </div>
                {{-- new column --}}
                <div class="column g-5">
                    <strong>James K.</strong>
                    <span class="opacity-07">Influencer</span>
                </div>
            </div>
           
        </div>
          {{-- card --}}
        <div class="card">
            {{-- new row --}}
            <div style="color:orangered;" class="row w-full align-center g-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
               
            </div>
            {{-- new row --}}
            <span>
               “Love the daily tasks — simple, fun, and I make an extra &#8358;50k monthly. The gift codes are cherry on top.”

            </span>
            {{-- new row --}}
            <div class="row w-fit g-10">
                <div class="h-40 w-40 circle bg-primary primary-text column align-center justify-center no-select">
                  AC
                </div>
                {{-- new column --}}
                <div class="column g-5">
                    <strong>Anthony Chibuzor</strong>
                    <span class="opacity-07">Student</span>
                </div>
            </div>
           
        </div>
         {{-- card --}}
        <div class="card">
            {{-- new row --}}
            <div style="color:orangered;" class="row w-full align-center g-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
               

            </div>
            {{-- new row --}}
            <span>
              “Admin replies within minutes when I place an ad. Best micro gig platform I've used.”
              
            </span>
            {{-- new row --}}
            <div class="row w-fit g-10">
                <div class="h-40 w-40 circle bg-primary primary-text column align-center justify-center no-select">
                  AM
                </div>
                {{-- new column --}}
                <div class="column g-5">
                    <strong>Anita Marcus</strong>
                    <span class="opacity-07">Marketer</span>
                </div>
            </div>
           
        </div>
      </section>
        {{-- new section --}}
      <section  id="faqs" class="w-full section p-20 column g-10">
        <strong class="font-1-5 grid-full">Frequently asked Questions</strong>
        {{-- faq --}}
        <div class="faq">
            <div onclick="this.closest('.faq').classList.toggle('active');" class="question">
                <span class="font-1">How do I start earning?</span>
                <span>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </span>
            </div>
            {{-- answer --}}
            <div class="answer">
                <span>
             Simply sign up (free), earn from our multiple earning methods such as Daily Tasks, Spin & Win, Gift Code etc.

                </span>
            </div>
        </div>
         {{-- faq --}}
        <div class="faq">
            <div onclick="this.closest('.faq').classList.toggle('active');" class="question">
                <span class="font-1">How does Daily Spin & Gift codes work?</span>
                <span>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </span>
            </div>
            {{-- answer --}}
            <div class="answer">
                <span>
           Every user gets daily free spin. You win cash and bonus credits. Gift codes are shared in our official community,you need to stay active on our official groups and communities to get updated whenever we drop gift codes.

                </span>
            </div>
        </div>
         {{-- faq --}}
        <div class="faq">
            <div onclick="this.closest('.faq').classList.toggle('active');" class="question">
                <span class="font-1">Can I place ads on {{ config('app.name') }}?</span>
                <span>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </span>
            </div>
            {{-- answer --}}
            <div class="answer">
                <span>
           Absolutely! From your dashboard, click 'Place Ad' → message admin directly with your campaign requirements & budget. We boost your social presence.

                </span>
            </div>
        </div>

          {{-- faq --}}
        <div class="faq">
            <div onclick="this.closest('.faq').classList.toggle('active');" class="question">
                <span class="font-1">Is it safe to earn from tasks?</span>
                <span>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </span>
            </div>
            {{-- answer --}}
            <div class="answer">
                <span>
         Yes, we verify all campaigns and ensure legit engagement. User data & payments are secured with encryption. Thousands trust us!

                </span>
            </div>
        </div>

         {{-- faq --}}
        <div class="faq">
            <div onclick="this.closest('.faq').classList.toggle('active');" class="question">
                <span class="font-1">Can my account get banned?</span>
                <span>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </span>
            </div>
            {{-- answer --}}
            <div class="answer">
                <span>
                    Your account get banned only if you keep earning from tasks without performing it or submitting wrong proofs,this is as a result to protect our advertisers.

                </span>
            </div>
        </div>
      </section>
      {{-- new section --}}
      <section class="w-full section p-20 text-align-center column g-10">
       <div class="cta">
         <strong class="desc">Ready to place an ad or start earning?</strong>
        <span>Connect from dashboard,Pick from available gigs or Message admin directly, share your social media handles or ad creative, and we'll run your campaign in 24h.</span>
        <button onclick="window.location.href='{{ url('register') }}'">Create Free Account</button>
       </div>
    </section>
    </section>
@endsection
@section('js')
    <script class="js">
        window.addEventListener('load',()=>{
            document.querySelector('.hero .banner').style.marginBottom=Math.abs(document.querySelector('.hero .banner').getBoundingClientRect().bottom - document.querySelector('.hero .banner .detail').getBoundingClientRect().bottom) + 20 + 'px';
            document.querySelector('.hero').style.minHeight=window.innerHeight + 'px'
        });
        let banners=document.querySelectorAll('.banner');
        banners.forEach((banner)=>{
                banner.addEventListener('touchstart',()=>{
                        banner.querySelector('img').classList.add('active');
        });
          banner.addEventListener('touchend',()=>{
                        banner.querySelector('img').classList.remove('active');
        });
        })
    </script>
@endsection
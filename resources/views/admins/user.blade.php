@extends('layout.admins.app')
@section('title')
    User
@endsection
@section('css')
    <style class="css">
        .details{
            padding:10px !important;
           background:var(--rgt-005);
            border-radius:5px !important;
            border:1px solid var(--rgt-01);
            display: flex;
            flex-direction: column;
            gap:10px;
           
        }

        
        .details > div div{
            border-bottom:none;
            padding-bottom:5px;
            background:transparent !important;
            padding:0 !important;
            color:var(--primary);
            font-weight:600;

        }
        .details > div span{
            font-weight:normal;
        }
        .details > div div{
            border:none !important;
            font-size:1rem;
        }
        .details > div:last-of-type{
            /* border-bottom: 1px dashed var(--primary); */
        }
       
       .wallet-heading.active .bar{
        height:4px;
        width:100%;
        background:black;
        border-radius:1000px;
        clip-path:inset(0 round 1000px);
        

       }
       .forms{
        display:none !important;
       }
       .forms .title{
        display:none !important;
       }
       .forms.log .title{
        display:flex !important;
       }
       .credit-form button.post{
        background:#4caf50 !important;
       }
       .debit-form button.post{
        background:red !important;
       }
       .credit-form.active{
        display:flex !important;
       }
       .debit-form.active{
        display:flex !important;
       }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
         <div style="border:1px solid var(--primary-01);" class="w-full bg-light br-primary p-20 column g-10">
                    {{-- new row --}}
                    <div style="border-bottom:1px dashed var(--rgt-01);padding-bottom:10px;" class="row align-center g-10 w-full">
                          {{-- profile photo --}}
              <div style="box-shadow:0px 0px 10px var(--primary-03);min-width:50px;min-height:50px;width:50px;height:50px;" class="w-70 perfect-square p-5 no-shrink circle bg-light column align-center justify-center">
       @isset($data->photo)
           <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="w-full h-full circle">
       @else
        <div class="bg-primary h-full w-full column align-center justify-center primary-text circle">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" fill="CurrentColor"></circle>
<path d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" fill="CurrentColor"></path>
</svg>

        </div>
       @endisset
       </div>
      
       {{-- name/email column --}}
       <div class="column g-5">
         <strong class="font-1">{{ ucwords($data->username) }}</strong>
         <div class="w-fit font-size-07 opacity-07 row align-center g-5  break-word">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="10" width="10"><path d="M22 13.3414C21.3744 13.1203 20.7013 13 20 13C16.6863 13 14 15.6863 14 19C14 19.7013 14.1203 20.3744 14.3414 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V13.3414ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829ZM19 22L15.4645 18.4645L16.8787 17.0503L19 19.1716L22.5355 15.636L23.9497 17.0503L19 22Z"></path></svg>

            {{ $data->email ?? 'null' }}
        </div>
       </div>
       <div class="status m-left-auto {{ $data->status == 'active' ? 'green' : 'red' }}">{{ $data->status }}</div>
                    </div>
                    {{-- new section --}}
                    <div style="border:1px solid var(--primary-01);background:var(--primary-005);color:var(--primary)" class="w-full details column align-center p-20 br-primary g-5">
                           {{-- user id --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>User ID</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 row g-5 align-center justify-center bold bg-light p-5 p-x-10">
                                {{ $data->uniqid }}
                                <span onclick="copy('{{ $data->uniqid }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M216,28H88A12,12,0,0,0,76,40V76H40A12,12,0,0,0,28,88V216a12,12,0,0,0,12,12H168a12,12,0,0,0,12-12V180h36a12,12,0,0,0,12-12V40A12,12,0,0,0,216,28ZM156,204H52V100H156Zm48-48H180V88a12,12,0,0,0-12-12H100V52H204Z"></path></svg>

                                </span>
                            </div>
                        </div>
                        {{-- new row --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>Full Name</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 capitalize bold bg-light p-5 p-x-10">
                                {{ $data->name }}
                            </div>
                        </div>
                           {{-- user id --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>Last Spinned</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 row g-5 align-center justify-center bold bg-light p-5 p-x-10">
                                {{ $data->last_spin }}
                              
                            </div>
                        </div>
                         {{-- new row --}}
                         <div class="w-full g-10 row align-center space-between">
                            <span>Referred By</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 bold bg-light p-5 p-x-10">
                              @isset ($data->ref )
                                  <a href="{{ url('admins/user?id='.$data->ref_id.'') }}" class="c-inherit no-select">{{ $data->ref ?? 'null' }}</a> 
                              @else
                                  NULL
                              @endisset
                            </div>
                        </div>
                        {{-- new row --}}
                         <div class="w-full g-10 row align-center space-between">
                            <span>Total Downlines</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 bold bg-light p-5 p-x-10">
                             {{ $data->downlines }}
                            </div>
                        </div>

                          {{-- registerd date --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>Country</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 bold bg-light p-5 p-x-10">
                                {{ ucwords($data->country) }}
                            </div>
                        </div>
                          {{-- package --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>Package</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 bold bg-light p-5 p-x-10">
                                {{ ucwords($data->package) }}
                            </div>
                        </div>
                         {{-- registerd date --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>Registered</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 bold bg-light p-5 p-x-10">
                               {{ $data->frame }}
                            </div>
                        </div>
                          {{-- phone --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>Phone Number</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 bold bg-light p-5 p-x-10">
                                {{ $data->phone }}
                            </div>
                        </div>
                          {{-- user id --}}
                        <div class="w-full g-10 row align-center space-between">
                            <span>User ID</span>
                            <div style="border:1px solid var(--primary-02)" class="br-5 row g-5 align-center justify-center bold bg-light p-5 p-x-10">
                                {{ $data->uniqid }}
                                <span onclick="copy('{{ $data->uniqid }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M216,28H88A12,12,0,0,0,76,40V76H40A12,12,0,0,0,28,88V216a12,12,0,0,0,12,12H168a12,12,0,0,0,12-12V180h36a12,12,0,0,0,12-12V40A12,12,0,0,0,216,28ZM156,204H52V100H156Zm48-48H180V88a12,12,0,0,0-12-12H100V52H204Z"></path></svg>

                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- balances --}}
                    <div class="column w-full g-10">
                      @foreach (Wallets() as $wallet)
                          <div class="row w-full g-10 align-center space-between">
                            <span>{{ $wallet->name }}</span>
                            <strong class="font-1 {{ $wallet->class == 'debit' ? 'c-red' : ($wallet->class == 'credit' ? 'c-green' : '') }}">{{ $data->currency }}{{ number_format($data->{$wallet->key},2) }}</strong>
                          </div>
                      @endforeach
                    </div>
                 {{-- action buttons --}}
                 <div class="w-full row align-center space-between">
                    <button onclick="window.open('{{ url('admins/login/as/user?user_id='.$data->id.'') }}')" class="btn-green-3d">
                     <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 15H6V20H18V4H6V9H4V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V15ZM10 11V8L15 12L10 16V13H2V11H10Z"></path></svg>

                        Login as User
                    </button>
                     @if ($data->status == 'active')
                         <button onclick="window.location.href='{{ url('admins/ban/user?user_id='.$data->id.'') }}'" class="btn-red-3d">
                      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM16.0001 8V16.4142L12.5001 12.9142L8.70718 16.7071L7.29297 15.2929L11.0859 11.5L7.58586 8H16.0001Z"></path></svg>

                            Ban User
                    </button>
                     @else
                         <button onclick="window.location.href='{{ url('admins/unban/user?user_id='.$data->id.'') }}'" class="btn-blue-3d">
                      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM16.0001 8V16.4142L12.5001 12.9142L8.70718 16.7071L7.29297 15.2929L11.0859 11.5L7.58586 8H16.0001Z"></path></svg>
                      
                            UnBan User
                    </button>
                     @endif
                 </div>
                 {{-- action buttons --}}
                   <div class="w-full row align-center space-between">
                    <div onclick="window.location.href='{{ url('admins/transactions?user_id='.$data->id.'') }}'"  class="btn-primary-3d">
                        <span>View Transaction Logs</span>
                        
                         <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM17.6575 11.9996L11.7077 17.9493V12.9996H6.34375V10.9996H11.7077V6.0498L17.6575 11.9996Z"></path></svg>

                     
                    </div>
                   </div>

                    </div>
                     {{--credit/debit wallet  --}}
                   <div style="border:1px solid var(--rgt-01)" class="column bg-light align-center w-full br-primary">
                     {{-- headings/prompt --}}
                    <div class="row p-20 no-select w-full">
                        <div onclick="MyFunc.SwitchForm(this,'.credit-form')" class="w-half wallet-heading p-y-10 active column align-center justify-center g-5">
                            <span class="title">Credit User</span>
                            <span class="bar"></span>
                        </div>
                         <div onclick="MyFunc.SwitchForm(this,'.debit-form')" class="w-half wallet-heading p-y-10 column align-center justify-center g-5">
                            <span class="title">Debit User</span>
                            <span class="bar"></span>
                        </div>
                    </div>
                    {{-- credit form --}}
                    <form style="padding-top:0;" action="{{ url('admins/post/credit/user/process') }}" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full active forms credit-form column g-10 p-20">
                       {{-- csrf token --}}
                       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
                      {{-- user id --}}
                       <input type="hidden" name="user_id" value="{{ $data->id }}" class="inp input">
                       
                       {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Select Wallet</label>
                            <div class="cont">
                            <select name="wallet" class="inp input required">
                                <option value="" selected disabled>Choose Wallet....</option>
                               @foreach (Wallets() as $wallet)
                                   <option value="{{ $wallet->key }}">{{ $wallet->name }}</option>
                               @endforeach
                            </select>
                        </div>
                        </div>
                         {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Credit Amount({{ $data->currency }})</label>
                            <div class="cont">
                           <input name="amount" placeholder="E.g {{ $data->currency }}5,000" type="number" class="inp input required">
                        </div>
                        </div>
                        {{-- new input --}}
                        <div class="w-full title column g-5">
                            <label>Transaction Title</label>
                            <div class="cont">
                           <input name="title" placeholder="E.g Admin Bonus" type="text" class="inp">
                        </div>
                        </div>
                        
                        <label  class="row align-center w-full">
                            <input onchange="MyFunc.VerifyCheck(this)" type="checkbox">
                            <span>Log this Transaction</span>
                        </label>
                        <button class="post">Credit User</button>
                    </form>

                      {{-- debit form --}}
                    <form style="padding-top:0;" action="{{ url('admins/post/debit/user/process') }}" onsubmit="PostRequest(event,this,MyFunc.Completed)" class="w-full forms debit-form column g-10 p-20">
                       {{-- csrf token --}}
                       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
                      {{-- user id --}}
                       <input type="hidden" name="user_id" value="{{ $data->id }}" class="inp input">
                       
                       {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Select Wallet</label>
                            <div class="cont">
                            <select name="wallet" class="inp input required">
                                <option value="" selected disabled>Choose Wallet....</option>
                               @foreach (Wallets() as $wallet)
                                   <option value="{{ $wallet->key }}">{{ $wallet->name }}</option>
                               @endforeach
                            </select>
                        </div>
                        </div>
                         {{-- new input --}}
                        <div class="w-full column g-5">
                            <label>Debit Amount({{ $data->currency }})</label>
                            <div class="cont">
                           <input name="amount" placeholder="E.g {{ $data->currency }}5,000" type="number" class="inp input required">
                        </div>
                        </div>
                        {{-- new input --}}
                        <div class="w-full title column g-5">
                            <label>Transaction Title</label>
                            <div class="cont">
                           <input name="title" placeholder="E.g Admin Bonus" type="text" class="inp">
                        </div>
                        </div>
                        
                        <label  class="row align-center w-full">
                            <input onchange="MyFunc.VerifyCheck(this)" type="checkbox">
                            <span>Log this Transaction</span>
                        </label>
                        <button class="post">Debit User</button>
                    </form>
                   </div>
                  
    </section>
@endsection
@section('js')
   <script class="js">
   window.MyFunc = {
    Restyle : function(){
         document.querySelectorAll('.wallet-heading .bar').forEach((data)=>{
        data.style.width=data.closest('.wallet-heading').querySelector('.title').getBoundingClientRect().width + 'px'
    });
    },
    SwitchForm : function(element,form_type){
        document.querySelectorAll('.wallet-heading').forEach((data)=>{
            data.classList.remove('active');
        });

        document.querySelectorAll('.forms').forEach((data)=>{
            data.classList.remove('active');
        });
        document.querySelector(form_type).classList.add('active');
        element.classList.add('active');
    },
    VerifyCheck : function(element){
      
         if(element.checked){
        
            element.closest('.forms').classList.add('log');
        //    alert(element.closest('.forms').querySelector('.title').innerHTML);
            element.closest('.forms').querySelector('.title .cont input').classList.add('input');
            element.closest('.forms').querySelector('.title .cont input').classList.add('required');
        }else{
            element.closest('.forms').classList.remove('log');
             element.closest('.forms').querySelector('.title .cont input').classList.remove('input');
            element.closest('.forms').querySelector('.title .cont input').classList.remove('required');
        }
       
    },
    Completed : function(response){
        let data=JSON.parse(response);
        if(data.status == 'success'){
            window.location.reload();
        }
    }
   }
   MyFunc.Restyle();
    </script> 
@endsection
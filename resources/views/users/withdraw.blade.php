@extends('layout.users.app')
@section('title')
    Withdraw
@endsection

@section('main')
    <section class="w-full column g-10">
        
        <div style="border:1px solid var(--rgt-005)" class="w-full br-primary p-20 column bg-light g-10">
            <strong class="font-size-1-5">Withdraw Funds</strong>
            <span class="opacity-07">Withdraw your earnings directly into your bank account</span>
            <form action="{{ url('users/post/withdrawal/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Withdrawn)" class="w-full column g-10">
              {{-- csrf token --}}
              <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5 w-full">
                    <label>Select Wallet</label>
                    <div class="cont">
                        <select onchange="MyFunc.PromptUser(this)" name="wallet" class="inp input reqiured">
                            <option value="" selected disabled>Click to choose...</option>
                            @foreach ($wallets as $data)
                                  <option data-minimum="{{ $currency.number_format($finance_settings->withdrawal->{$data->key}->minimum) }}" data-maximum="{{ $currency.number_format($finance_settings->withdrawal->{$data->key}->maximum) }}" value="{{ $data->key }}">{{ $data->name }} - {{ $currency.number_format(Auth::guard('users')->user()->{$data->key},2) }}</option>
                            @endforeach
                            </select>                
                        </div>
                </div>

                 {{-- new input --}}
                <div class="column g-5 w-full">
                    <label>Withdrawal Amount</label>
                    <div class="cont">
                        <input type="number" name="amount" placeholder="Enter withdrawal amount" class="inp input required">                
                        </div>
                </div>
         
                    <div style="background: rgba(0,255,0,0.1);color:#4caf50;border:1px solid #4caf50;" class="br-5 w-full column g-5 p-10">
                        <strong class="font-1"> Withdrawal Instructions</strong>
                        <span class="minimum-prompt"></span> 
                         <span class="maximum-prompt"></span> 
                       <span> &bull; Withdrawal fee - {{ $finance_settings->withdrawal->fee }}%</span>
                       <span>&bull; You can only withdraw up to {{ number_format($finance_settings->withdrawal->count) }} times Daily</span>
                </div>
               
                {{-- bank details --}}
               <div style="background:var(--rgt-005);color:var(--rgt-10);border:1px solid var(--rgt-02)" class="w-full br-5 p-20 column g-10">
                    {{-- new row --}}
                <div class="row g-2">
                        <span>Account Number :</span><strong>{{ $bank->account_number }}</strong>
                    </div>
                    {{-- new row --}}
                      <div class="row g-2">
                        <span>Bank :</span><strong>{{ $bank->bank_name }}</strong>
                    </div>
                    {{-- new row --}}
                    <div class="row g-2">
                        <span>Account Name :</span><strong>{{ $bank->account_name }}</strong>
                    </div>
                    <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row p-5 align-center no-select c-primary justify-end g-5">
                        <span>
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                        </span>
                        <span>Edit</span>
                    </div>
               </div>
             
                   <button class="post">Place Withdrawal</button>
              
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script class="js">
        window.MyFunc = {
            Withdrawn : (response)=>{
                    let data=JSON.parse(response);
                    if(data.status == 'success'){
                        Redirect(data.url);
                    }
            },
            PromptUser : (element)=>{
                try{
                    let min=element.options[element.selectedIndex].dataset.minimum;
                    let max=element.options[element.selectedIndex].dataset.maximum;
                document.querySelector('.minimum-prompt').innerHTML=`&bull; Minimum withdrawal - ${min}`;
                 document.querySelector('.maximum-prompt').innerHTML=`&bull; Maximum withdrawal - ${max}`;
                }catch(error){
                    alert(error)
                }
            }
        }
    </script>
@endsection
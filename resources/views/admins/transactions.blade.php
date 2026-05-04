@extends('layout.admins.app')

@section('title')
    Transactions
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M208,28H188V24a12,12,0,0,0-24,0v4H92V24a12,12,0,0,0-24,0v4H48A20,20,0,0,0,28,48V208a20,20,0,0,0,20,20H208a20,20,0,0,0,20-20V48A20,20,0,0,0,208,28Zm-4,176H52V52H68a12,12,0,0,0,24,0h72a12,12,0,0,0,24,0h16Zm-27.08-94.35-27.42-2.12L139,83.25a12,12,0,0,0-22,0L106.5,107.53l-27.42,2.12a12,12,0,0,0-6.72,21.22l20.58,17-6.25,25.26a12,12,0,0,0,17.73,13.22L128,172.46l23.58,13.88a12,12,0,0,0,17.73-13.22l-6.25-25.26,20.58-17a12,12,0,0,0-6.72-21.22Zm-35,24.51a12,12,0,0,0-4,12.13l1.21,4.89-5.07-3a12.06,12.06,0,0,0-12.18,0l-5.07,3,1.21-4.89a12,12,0,0,0-4-12.13l-3.47-2.87,5-.39a12,12,0,0,0,10.09-7.21l2.33-5.4,2.33,5.4a12,12,0,0,0,10.09,7.21l5,.39Z"></path></svg>
                  </div>
                <div class="column g-5">
                   @isset($type)
                    <span>Total {{ ucwords($status) }}  {{ ucwords(str_replace('_',' ',$type)) }}s</span>
                    
                   @else
                       <span>Total Transactions</span>
                   @endisset
                    <strong class="font-1-5">{{ number_format($total) }}</strong>
                </div>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M148,152a20,20,0,1,1-20-20A20,20,0,0,1,148,152ZM228,48V208a20,20,0,0,1-20,20H48a20,20,0,0,1-20-20V48A20,20,0,0,1,48,28H68V24a12,12,0,0,1,24,0v4h72V24a12,12,0,0,1,24,0v4h20A20,20,0,0,1,228,48ZM52,52V76H204V52H188a12,12,0,0,1-24,0H92a12,12,0,0,1-24,0ZM204,204V100H52V204Z"></path></svg>
                </div>
                <div class="column g-5">
                   @isset($type)
                     <span>Today {{ ucwords($status) }} {{ ucwords(str_replace('_',' ',$type)) }}s</span>
                    
                   @else
                      <span>Today Transactions</span>
                   @endisset
                    <strong class="font-1-5">{{ number_format($today) }}</strong>
                </div>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01);" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M200,20H56A20,20,0,0,0,36,40V216a20,20,0,0,0,20,20H200a20,20,0,0,0,20-20V40A20,20,0,0,0,200,20Zm-4,192H60V44H196ZM80,76A12,12,0,0,1,92,64h72a12,12,0,0,1,0,24H92A12,12,0,0,1,80,76Zm40,52a16,16,0,1,1-16-16A16,16,0,0,1,120,128Zm48,0a16,16,0,1,1-16-16A16,16,0,0,1,168,128Zm-48,48a16,16,0,1,1-16-16A16,16,0,0,1,120,176Zm48,0a16,16,0,1,1-16-16A16,16,0,0,1,168,176Z"></path></svg>
                </div>
                <div class="column g-5">
                    <span>Total Amount</span>
                    <strong class="font-1-5">&#8358;{{ number_format($sum,2) }}</strong>
                </div>
            </div>
        </div>
        {{-- search --}}
        <div style="border:1px solid var(--rgt-01);;" class="w-full search br-primary p-20 bg-light">
            <div class="cont">
                <span class="h-full perfect-square column align-center no-shrink justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"></path></svg>

                </span>
                <input oninput="Search(this,'{{ url('admins/search/transactions?uniqid=') }}' + this.value)" type="search" placeholder="Search by Transaction ID..." class="inp input">
            </div>
            <div class="child">
              
                
            </div>
        </div>

        {{-- transactions loop --}}
        @if ($trx->isEmpty())
           @include('components.utilities',[
            'empty' => true,
            'text' => 'No Transaction Record',
             ])
        @else
            <div class="w-full grid pc-grid-2 g-10 place-center">
                @foreach ($trx as $data)
                    <div style="border:1px solid var(--rgt-01);;" class="w-full bg-light br-primary p-20 g-10 column">
                       {{-- new row --}}
                       <div class="row g-10 align-center w-full">
                        <div style="box-shadow: 0 0 10px var(--primary-02)" class="h-70 p-5 w-70 min-w-70 min-h-70 circle bg-inherit">
                           @isset ($data->user->photo)
                                <img src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="" class="w-full h-full circle">
                      
                           @else
                               <div class="h-full w-full circle bg-primary primary-text column align-center justify-center">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>

                               </div>
                           @endisset   
                        </div>
                        <div class="column g-5">
                            <strong onclick="window.location.href='{{ url('admins/user?id='.$data->user->id.'') }}'" class="desc c-primary u no-select">{{ ucwords($data->user->username) }}</strong>
                            <span class="row align-center g-5 font-size-08">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>

                                {{ $data->frame }}
                            </span>
                        </div>
                       </div>
                        {{-- new row --}}
                        <div class="w-full row align-center g-10 space-between">
                           {{-- trx id --}}
                            <div style="background:var(--primary-01);padding:0.3rem 0.9rem;" class="w-fit br-5 bold no-select">
                                {{ $data->uniqid }}
                            </div>
                            {{-- trx status --}}
                            <div class="status {{ $data->status == 'pending' ? 'gold' : ($data->status == 'success' ? 'green' : 'red') }} ">{{ $data->status }}</div>
                        </div>
                        {{-- new row --}}
                       <div class="row w-full align-center g-10 space-between">
                         <strong class="font-1">{{ ucwords($data->title) }}</strong>
                         <strong class="desc {{ $data->class == 'credit' ? 'c-green' : 'c-red' }}">{{ $data->class == 'credit' ? '+' : '-' }}&#8358;{{ number_format($data->amount,2) }}</strong>
                       </div>
                       {{-- new row --}}
                    <span class="w-full column" style="border-top:1px dashed var(--primary-01)"></span>
                    {{-- new row --}}
                    <div class="w-full align-center g-10 space-between">
                        <div class="row align-center g-5">
                            <span>

                                <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="CurrentColor"></path>
</svg>

                            </span>
                            <span>{{ $data->day }} &bull; {{ $data->time }}</span>
                        </div>
                    </div>
                    <div onclick="window.location.href='{{ url('admins/transaction/receipt?id='.$data->id.'') }}'" style="border:1px solid var(--primary-01);background:var(--primary-005);color:var(--primary)" class="bold no-select overflow-hidden pointer font-1 row align-center justify-center g-5 p-10 p-x-20 br-primary">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,40H40A16,16,0,0,0,24,56V208a8,8,0,0,0,11.58,7.15L64,200.94l28.42,14.21a8,8,0,0,0,7.16,0L128,200.94l28.42,14.21a8,8,0,0,0,7.16,0L192,200.94l28.42,14.21A8,8,0,0,0,232,208V56A16,16,0,0,0,216,40ZM176,144H80a8,8,0,0,1,0-16h96a8,8,0,0,1,0,16Zm0-32H80a8,8,0,0,1,0-16h96a8,8,0,0,1,0,16Z"></path></svg>
                            
                        </span>
                        <span>View Details</span>
                    </div>
                    </div>
                @endforeach
                @if ($trx->lastPage() > 1)
                    @include('components.utilities',[
                        'paginate' => true,
                        'data' => $trx
                    ])
                @endif
            </div>
        @endif
        
    </section>
@endsection
@extends('layout.admins.app')
@section('title')
  {{ ucwords($status) }}  Users
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
    </style>
@endsection
@section('main')
    <section class="column g-10 w-full">
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M164.38,181.1a52,52,0,1,0-72.76,0,75.89,75.89,0,0,0-30,28.89,12,12,0,0,0,20.78,12,53,53,0,0,1,91.22,0,12,12,0,1,0,20.78-12A75.89,75.89,0,0,0,164.38,181.1ZM100,144a28,28,0,1,1,28,28A28,28,0,0,1,100,144Zm147.21,9.59a12,12,0,0,1-16.81-2.39c-8.33-11.09-19.85-19.59-29.33-21.64a12,12,0,0,1-1.82-22.91,20,20,0,1,0-24.78-28.3,12,12,0,1,1-21-11.6,44,44,0,1,1,73.28,48.35,92.18,92.18,0,0,1,22.85,21.69A12,12,0,0,1,247.21,153.59Zm-192.28-24c-9.48,2.05-21,10.55-29.33,21.65A12,12,0,0,1,6.41,136.79,92.37,92.37,0,0,1,29.26,115.1a44,44,0,1,1,73.28-48.35,12,12,0,1,1-21,11.6,20,20,0,1,0-24.78,28.3,12,12,0,0,1-1.82,22.91Z"></path></svg>
                 </div>
                <div class="column g-5">
                    <span>Total Users</span>
                    <strong class="font-1-5">{{ number_format($total_users) }}</strong>
                </div>
            </div>
        </div>
          {{-- analytic --}}
        <div style="border:1px solid var(--primary-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M213,174.26A12,12,0,0,0,196.24,177q-1.47,2.06-3.05,4a76,76,0,0,0-30-28.37,48,48,0,1,0-70.28.08,76.8,76.8,0,0,0-30.06,28.25,83.62,83.62,0,0,1-18.3-43.55,12,12,0,0,0,16-17.88l-20-20a12,12,0,0,0-17,0l-20,20a12,12,0,0,0,16.83,17.1,107.88,107.88,0,0,0,37.72,73.61,12.33,12.33,0,0,0,1.88,1.57,107.82,107.82,0,0,0,136.47-.26,13.09,13.09,0,0,0,1.28-1.06,107.66,107.66,0,0,0,18-19.46A12,12,0,0,0,213,174.26ZM128,96a24,24,0,1,1-24,24A24,24,0,0,1,128,96Zm0,116a83.52,83.52,0,0,1-46.94-14.37,52,52,0,0,1,93.88,0A84.07,84.07,0,0,1,128,212Zm124.49-75.51-20,20a12,12,0,0,1-17,0l-20-20a12,12,0,0,1,16-17.88A84,84,0,0,0,59.74,79,12,12,0,1,1,40.26,65a108,108,0,0,1,195.4,54.4,12,12,0,0,1,16.83,17.1Z"></path></svg>


                </div>
                <div class="column g-5">
                    <span>Active Users</span>
                    <strong class="font-1-5">{{ number_format($active_users) }}</strong>
                </div>
            </div>
        </div>
        {{-- analytic --}}
        <div style="border:1px solid var(--primary-01)" class="p-20 w-full br-primary bg-light column g-10">
            <div class="row w-full g-10">
                <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M148,152a20,20,0,1,1-20-20A20,20,0,0,1,148,152ZM228,48V208a20,20,0,0,1-20,20H48a20,20,0,0,1-20-20V48A20,20,0,0,1,48,28H68V24a12,12,0,0,1,24,0v4h72V24a12,12,0,0,1,24,0v4h20A20,20,0,0,1,228,48ZM52,52V76H204V52H188a12,12,0,0,1-24,0H92a12,12,0,0,1-24,0ZM204,204V100H52V204Z"></path></svg>


                </div>
                <div class="column g-5">
                    <span>Today's Signups</span>
                    <strong class="font-1-5">{{ number_format($today_signups) }}</strong>
                </div>
            </div>
        </div>

         {{-- search --}}
        <div style="border:1px solid var(--rgt-01);" class="w-full search br-primary p-20 bg-light">
            <div class="cont">
                <span class="h-full perfect-square column align-center no-shrink justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M232.49,215.51,185,168a92.12,92.12,0,1,0-17,17l47.53,47.54a12,12,0,0,0,17-17ZM44,112a68,68,0,1,1,68,68A68.07,68.07,0,0,1,44,112Z"></path></svg>

                </span>
                <input oninput="Search(this,'{{ url('admins/search/users?key=') }}' + this.value)" type="search" placeholder="Search by User ID,Username,Email or Full Name..." class="inp input">
            </div>
            <div class="child">
              
                
            </div>
        </div>
        @if ($users->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Users Found'
            ])
        @else
            <div class="w-full grid pc-grid-2 g-10">
                @foreach ($users as $data)
                   <div style="border:1px solid var(--rgt-01);" class="w-full bg-light br-primary p-20 column g-10">
                    {{-- new row --}}
                    <div  style="border-bottom:1px dashed var(--rgt-01);padding-bottom:10px;" class="row align-center g-10 w-full">
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
                    {{-- <div style="border:1px solid var(--primary-01);background:var(--primary-005);color:var(--primary)" class="w-full details column align-center p-20 br-primary g-5"> --}}
                  <div style="font-weight:900" class="w-full details column align-center p-20 br-primary g-5">
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
                    {{-- view more button --}}
                    <div onclick="window.location.href='{{ url('admins/user?id='.$data->id.'') }}'" style="border:1px solid var(--primary-01);background:var(--primary-005)" class="w-full no-select c-primary pointer overflow-hidden row align-center justify-center font-1 p-10 p-x-20 br-primary">
                        <strong>VIEW MORE</strong>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M224.49,136.49l-72,72a12,12,0,0,1-17-17L187,140H40a12,12,0,0,1,0-24H187L135.51,64.48a12,12,0,0,1,17-17l72,72A12,12,0,0,1,224.49,136.49Z"></path></svg>

                        </span>
                    </div>
                    </div> 
                @endforeach
            </div>
             @if ($users->lastPage() > 1)
                    @include('components.utilities',[
                        'paginate' => true,
                        'data' => $users
                    ])
                @endif
        @endif
    </section>
@endsection
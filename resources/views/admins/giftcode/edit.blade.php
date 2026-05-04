@extends('layout.admins.app')
@section('title')
   Edit Gift Code
@endsection
@section('main')
    <section class="w-full column g-10">
        <form action="{{ url('admins/post/edit/gift/code/process') }}" method="POST" onsubmit="PostRequest(event,this,Added)" style="border:1px solid var(--rgt-01)" action="" class="w-full bg-light br-10 p-20 column g-10">
           {{-- head --}}
            <div class="row align-center c-primary g-10">
                <span>
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>

                </span>
                <strong class="desc">Edit Gift Code</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" class="inp input" name="_token">
            {{-- code id --}}
            <input type="hidden" class="inp input" value="{{ $data->id }}" name="id">
            {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Code Value</span>
                    <small class="opacity-07">Enter the value of the gift code(this is the amount that would be rewarded to each user who redeems the code)</small>
                </label>
                <div class="cont">
                    <input value="{{ $data->value }}" name="value" placeholder="E.g {{ $currency }}1,500" type="number" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Code Limited</span>
                    <small class="opacity-07">How many users is this code limited to(The code would be rendered invalid if the users limit is met)</small>
                </label>
                <div class="cont">
                    <input name="limit" value="{{ $data->limit }}" placeholder="E.g 20 users" type="number" class="inp input required">
                </div>
            </div>

          
            <div style="background:rgba(0,255,0,0.1);border:1px dashed #4caf50;color:#4caf50;" class="w-full br-5 p-20 column g-10">
                <span>Gift Code</span>
              <strong class="font-1">{{ $data->code }}</strong>
            </div>
           
            
            {{-- submit btn --}}
            <button class="post">Save Changes</button>
          
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        function Added(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/gift/codes/manage') }}';
            }
        }
    </script>
@endsection
@extends('layout.users.app')
@section('title')
    Gift Code
@endsection
@section('main')
    <section class="w--full column g-10">
        <form style="border:1px solid var(--rgt-005)" onsubmit="PostRequest(event,this,Completed)" action="{{ url('users/post/redeem/gift/code/process') }}" method="POST" class="w-full bg-light br-primary p-20 column g-10">
            <div style="background:var(--primary-02);color:var(--primary)" class="m-x-auto h-70 w-70 circle column align-center justify-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM13.0049 10.0028H11.0049V20.0028H13.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

            </div>
            <strong class="m-x-auto desc">Redeem Gift Code</strong>
            {{-- csrf token --}}
            <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- new input --}}
            <div class="column m-top-20 g-5 w-full">
                <label>Enter gift code below to claim rewards instantly</label>
                <div class="cont">
                    <input type="text" name="code" placeholder="XXX-XXX-XXX-XXX" class="inp required input">
                </div>
            </div>
            <small class="c-gold">You can only redeem a gift code once.</small>
            <small class="opacity-07">Stay active on the platform group and communities to get updated when a new gift code drops.</small>
            {{-- post btn --}}
            <button class="post">Redeem Now</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
       
            function Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Redirect(data.url);
                }
            }
       
    </script>
@endsection
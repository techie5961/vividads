@extends('layout.users.app')
@section('title')
    Security Settings
@endsection
@section('main')
    <form action="{{ url('users/post/update/password/process') }}" onsubmit="PostRequest(event,this,Updated)" style="border:1px solid var(--rgt-005)" class="w-full p-20 column g-10 bg-light br-primary">
        <strong class="desc">Security Settings</strong>
     {{-- csrf token --}}
     <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Account Password</label>
            <div class="cont">
                <input placeholder="Enter current password" type="password" name="current" class="inp input required">
            </div>
        </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>New Password</label>
            <div class="cont">
                <input placeholder="Enter new password" type="password" name="new" class="inp input required">
            </div>
        </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div class="cont">
                <input placeholder="Confirm new password" type="password" name="confirm" class="inp input required">
            </div>
        </div>
       
        {{-- submit btn --}}
        <button class="post">Update Account Password</button>
    </form>
@endsection
@section('js')
    <script class="js">
     
            function Updated(response)=>{
                let data=JSON.parse(response);
                if(data.status == 'success'){
                   Redirect('{{ $url_current }}');
                }
            }
        
    </script>
@endsection
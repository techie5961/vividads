@extends('layout.users.app')
@section('title')
    Social Settings
@endsection
@section('main')
    <section class="w-full column g-10">
        <form action="{{ url('users/post/update/socials/process') }}" onsubmit="PostRequest(event,this)" style="border:1px solid var(--rgt-01)" class="w-full bg-light br-10 column g-10 p-20">
         {{-- csrf token --}}
         <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            <strong class="desc">Social Settings</strong>
           {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Facebook profile url</label>
                <div class="cont">
                    <input value="{{ $socials->facebook ?? '' }}" name="facebook" placeholder="Enter Facebook profile link" type="url" class="inp input">
                </div>
            </div>
              {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Tiktok Username</label>
                <div class="cont">
                    <input value="{{ $socials->tiktok ?? '' }}" name="tiktok" placeholder="Enter your Tiktok username" type="text" class="inp input">
                </div>
            </div>
              {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Instagram Username</label>
                <div class="cont">
                    <input value="{{ $socials->instagram ?? '' }}" name="instagram" placeholder="Enter your Instagram username" type="text" class="inp input">
                </div>
            </div>
              {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Twitter Username</label>
                <div class="cont">
                    <input value="{{ $socials->twitter ?? '' }}" name="twitter" placeholder="Enter your Twitter username" type="text" class="inp input">
                </div>
            </div>
              {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Whatsapp Number</label>
                <div class="cont">
                    <input value="{{ $socials->whatsapp ?? '' }}" name="whatsapp" placeholder="Enter your active Whatsapp number" type="number" class="inp input">
                </div>
            </div>
              {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Telegram Username</label>
                <div class="cont">
                    <input value="{{ $socials->telegram ?? '' }}" name="telegram" placeholder="Enter your Telegram username" type="text" class="inp input">
                </div>
            </div>

            <button class="post">Save Changes</button>


        </form>
    </section>
@endsection
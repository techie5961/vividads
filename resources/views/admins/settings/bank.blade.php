@extends('layout.admins.app')
@section('title')
    Bank Settings
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- settings form --}}
        <form onsubmit="PostRequest(event,this)" action="{{ url('admins/post/bank/settings/process') }}" style="border:1px solid var(--rgt-01)" class="w-full bg-light br-primary column g-10 p-20">
           {{-- title --}}
            <div class="row c-primary align-center g-10">
                <span class="h-fit row">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>
                </span>
                <strong class="desc">Bank Settings</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Account Number</label>
                <small class="opacity-07">Enter 10 digits account number</small>
                </label>
                <div class="cont">
                    <input value="{{ $bank->account_number ?? '' }}" name="account_number" type="number" placeholder="E.g 3002829943" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Bank Name</label>
                <small class="opacity-07">Enter name of bank attached to the account</small>
                </label>
                <div class="cont">
                    <input value="{{ $bank->bank_name ?? '' }}" name="bank_name" type="text" placeholder="E.g Kuda MFB" class="inp input required">
                </div>
            </div>
            {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Account Name</label>
                <small class="opacity-07">Enter the name on the account</small>
                </label>
                <div class="cont">
                    <input value="{{ $bank->account_name ?? '' }}" name="account_name" type="text" placeholder="E.g Dev Techie Innovations" class="inp input required">
                </div>
            </div>
            <div style="background:rgba(218, 165, 32,0.2);color:rgb(97, 71, 5)" class="w-full br-5 p-10 column g-5">
                {{-- <strong class="font-1">Note</strong> --}}
                <span>This is the bank in which all manual deposits on the platform would go into.Endeavour to double check the details before submitting to avoid loss of funds.You can always update the details anytime.</span>
            </div>
            <button class="post">Update Bank</button>
        </form>
    </section>
@endsection
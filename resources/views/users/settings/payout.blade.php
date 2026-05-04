@extends('layout.users.app')
@section('title')
    Payout Settings
@endsection
@section('main')
    <form action="{{ url('users/post/update/payout/process') }}" onsubmit="PostRequest(event,this)" style="border:1px solid var(--rgt-005)" class="w-full p-20 column g-10 bg-light br-primary">
        <strong class="desc">Payout Settings</strong>
        <span class="opacity-07">Update your withdrawal bank details</span>
     {{-- csrf token --}}
     <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Select Bank</label>
            <div class="cont">
            <select name="bank_name" class="inp input required">
            @if (!isset($bank->bank_name))
                <option value="" selected disabled>Click to choose</option>     
            @endif
              
                @foreach (NigeriaBanks()->data as $data)
                    <option {{ ($bank->bank_name ?? '') == $data->name ? 'selected' : '' }} value="{{ $data->name }}">{{ $data->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Account Number</label>
            <div class="cont">
                <input value="{{ $bank->account_number ?? '' }}" placeholder="Enter 10 digits account number" type="number" name="account_number" class="inp input required">
            </div>
        </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Account Name</label>
            <div class="cont">
                <input value="{{ $bank->account_name ?? '' }}" placeholder="Enter account name" type="text" name="account_name" class="inp input required">
            </div>
        </div>

        {{-- submit btn --}}
        <button class="post">Update Payout Details</button>
    </form>
@endsection
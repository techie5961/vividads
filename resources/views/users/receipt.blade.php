@extends('layout.users.app')
@section('title')
    Transaction Receipt
@endsection
@section('css')
    <style class="css">
        header{
            display:none !important;
        }
        main{
            padding:0 !important;
            background:var(--bg-light)

        }
        .receipt-head{
            width:100%;
            position:sticky;
            padding:20px;
            display:flex;
            flex-direction: row;
            align-items:center;
            gap:10px;
            justify-content: space-between;
            border-bottom:0.1px solid var(--rgt-01)
        }
        .receipt-body{
            width:100%;
            display:flex;
            flex-direction:column;
            gap:20px;
        }
      .group{
            padding:20px;
            border-bottom:0.1px solid var(--rgt-01);
            display:flex;
            flex-direction: column;
            gap:10px;
            }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
{{-- receipt head --}}
<div class="receipt-head">
    <span onclick="Redirect('{{ url()->previous() }}')">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M168.49,199.51a12,12,0,0,1-17,17l-80-80a12,12,0,0,1,0-17l80-80a12,12,0,0,1,17,17L97,128Z"></path></svg>

    </span>
<strong class="font-1">Transaction</strong>
<div class="p-5 p-x-10 br-5 bg-primary primary-text">Share</div>

</div>
{{-- receipt body --}}
{{-- new group --}}
<div class="group">
    <div class="receipt-body">
{{-- title --}}
<div class="column g-5">
    <strong class="font-weight-700 desc">{{ $data->title }}</strong>
<span class="opacity-07 font-weight-300">{{ $data->date_format }} at {{ $data->time_format }}</span>
</div>
{{-- amount --}}
<div class="column g-5">
    <span>Amount</span>
    <strong class="desc font-weight-900">{{ $data->class == 'credit' ? '+' : '-' }}{{ $currency }}{{ $data->amount }}</strong>
</div>
</div>
</div>
{{-- new group --}}
<div class="group">
<div class="row w-full g-10 align-center">
    <div class="column g-5">
        <span>Status</span>
        <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ ucwords($data->status) }}</div>
    </div>
</div>
</div>
{{-- new group --}}
<div class="group">
<div class="row w-full g-10 align-center">
    <div class="column g-5">
        <span>Transaction ID</span>
        <div>
            <strong>{{ $data->uniqid }}</strong>
            <span onclick="copy('{{ $data->uniqid }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M192,72V216a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8H184A8,8,0,0,1,192,72Zm24-40H72a8,8,0,0,0,0,16H208V184a8,8,0,0,0,16,0V40A8,8,0,0,0,216,32Z"></path></svg>

            </span>
        </div>
    </div>
</div>
</div>
{{-- new group --}}
@isset($data->data)
    @foreach (json_decode($data->data) as $key => $value)
     <div class="group">
<div class="row w-full g-10 align-center">
    <div class="column g-5">
        <span>{{ ucfirst($key) }}</span>
        <strong class="font-1">{!! $value !!}</strong>
    </div>
</div>
</div>   
    @endforeach
@endisset
<div class="w-full row opacity-05 p-20 no-select align-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96Z"></path></svg>All transactions are encrypted and secure<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96Z"></path></svg>
</div>
    </section>
@endsection
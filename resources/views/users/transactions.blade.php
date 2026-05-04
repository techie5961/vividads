@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('css')
    <style class="css">
        .class-icon{
            width:40px;
            height:40px;
            border-radius:50%;
            min-height:40px;
            min-width:40px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        .class-icon.credit{
            background:rgba(0,255,0,0.2);
            /* border:1px solid #4caf50; */
            color:#4caf50;
        }
        .class-icon.debit{
            /* border:1px solid red; */
            background:rgba(255,0,0,0.2);
            color:red;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
      
        @if ($trx->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Transactions found'
            ])
        @else
              <strong class="desc">Transaction History</strong>
              <span class="opacity-07">View all your transactions on the platform</span>
             <div class="grid w-full g-10 pc-grid-2">
                 @foreach ($trx as $data)
                  <div onclick="Redirect('{{ url('users/transaction/receipt?id='.$data->id.'') }}')" style="border:1px solid var(--rgt-005)" class="w-full bg-light pc-pointer br-primary p-20 column g-10">
                   <div class="row w-full align-center g-10">
                    {{-- class icon --}}
                     <div class="class-icon {{ $data->class }}">
                        @if ($data->class == 'credit')
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208.49,152.49l-72,72a12,12,0,0,1-17,0l-72-72a12,12,0,0,1,17-17L116,187V40a12,12,0,0,1,24,0V187l51.51-51.52a12,12,0,0,1,17,17Z"></path></svg>

                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M208.49,120.49a12,12,0,0,1-17,0L140,69V216a12,12,0,0,1-24,0V69L64.49,120.49a12,12,0,0,1-17-17l72-72a12,12,0,0,1,17,0l72,72A12,12,0,0,1,208.49,120.49Z"></path></svg>
                        @endif
                    </div>
                    {{-- title/date --}}
                    <div class="column g-5">
                        <strong class="font-weight-700 font-1">{{ $data->title }}</strong>
                        <span class="opacity-06">{{ $data->date_format }}</span>
                    </div>
                    {{-- amount/status --}}
                    <div style="text-align:end;align-items:flex-end;" class="column m-left-auto g-5">
                        <strong class="font-1 {{ $data->class == 'credit' ? 'c-green' : '' }} font-weight-900 ws-nowrap">{{ $data->class == 'credit' ?  '+' : '-' }}{{ $currency }}{{ number_format($data->amount,2) }}</strong>
                        <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ $data->status }}</div>
                    </div>
                   </div>
                  </div>
              @endforeach
             </div>
              @if ($trx->lastPage() > 1)
                  @include('components.utilities',[
                    'paginate' => true,
                    'data' => $trx
                  ])
              @endif
        @endif
    </section>
@endsection
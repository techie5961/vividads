@extends('layout.users.app')
@section('title')
    Daily Tasks
@endsection
<style class="css">
    .icon{
        background:var(--primary-01);
        color:var(--primary);
        height:60px;
        width:60px;
        flex-shrink: 0;
        display: flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        gap:10px;
        border-radius:10px;
        position: relative;
        
    }
 
    .icon::after{
        content: '';
        position:absolute;
        bottom:0px;
        right:0px;
        height:10px;
        width:10px;
        background:var(--primary);
        border:4px solid var(--primary-text);
        border-radius:50%;
        box-shadow:0 0 10px var(--primary-03);
       
    }
    .go{
        height:40px;
        width:40px;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content: center;
        gap:10px;
        border-radius:50%;
        background:var(--rgt-002);
        border:1px solid var(--rgt-005);
        flex-shrink: 0;
        color:var(--rgt-07);
        box-shadow:inset 0 5px 5px var(--rgt-005)
    }
      
</style>
@section('main')
    <section class="w-full column g-10">
        <strong class="desc">Daily Tasks</strong>
        <span class="opacity-07">Earn real cash for completing tasks</span>
        @if ($tasks->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Task Available'
            ])
        @else
        <div class="grid pc-grid-2 g-10 place-center w-full">
            @foreach ($tasks as $data)
            <div style="border:1px solid var(--rgt-005)" class="w-full bg-light p-20 row align-center g-10 space-between g-10 br-primary">
               {{-- new --}}
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                </div>
                {{-- new --}}
                <div class="column m-right-auto g-5">
                    <span class="opacity-07 uppercase">{{ $data->type->platform }}</span>
                    <strong class="font-1">{{ $data->type->name }}</strong>
                    <small class="opacity-05">Click the button beside to perform the task</small>
                </div>
                {{-- new --}}
                <div onclick="Redirect('{{ url('users/task?id='.$data->id.'') }}')" class="go">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                </div>
            </div>


           
        @endforeach
        </div>
            @if ($tasks->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $tasks
                ])
            @endif
        @endif
    </section>
@endsection
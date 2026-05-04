@extends('layout.users.app')
@section('title')
  Perform Task
@endsection
@section('css')
    <style class="css">
        section.populate{
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background:rgba(0,0,0,0.4);
            display:none;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            z-index:3000;
            padding:20px;

        }
        section.populate .child{
            width:80%;
            max-height:80%;
        }
        body:has(.populate.active){
            overflow: hidden;
        }
        section.populate.active{
            display:flex;
            

        }
        section.populate.active .child{
            animation:flow-in 0.5s linear forwards;
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
            gap:10px;
        }
        section.populate.active img{
            max-height: 100%;
        }
        @keyframes flow-in{
            0%{
                opacity: 0;
                transform: scale(0.8);
            }
            100%{
                opacity:1;
                transform: scale(1);
            }
        }
        .screenshot img{
            display:none;
        }
        .screenshot.active img{
            display:flex;
            height:100%;

        }
        .screenshot.active span{
            display:none;
        }

    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="desc pc-m-x-auto">Perform Task</strong>
        {{-- banner --}}
        @isset($task->banner)
            <img onclick="Populate(this)" src="{{ asset('tasks/banners/'.$task->banner.'') }}" alt="" class="w-full max-h-200 m-x-auto max-w-500">

            @endisset
            {{-- caption --}}
            @isset($task->caption)
                <div class="column g-10 w-full">
                    <strong class="font-1 u">Task Caption</strong>
                    <div>{!! nl2br($task->caption) !!}</div>
                </div>
            @endisset
            {{-- link --}}
            <div class="column p-top-10 w-full g-5">
                <div class="w-full row align-center g-10 space-between">
                    <strong class="font-1 u">Task Link</strong>
                    <div style="background:rgba(0,255,0,0.1);color:#4caf50;border:1px solid #4caf50" class="h-fit no-select br-5 p-5 p-x-10 font-weight-900">Task Reward: {{ $currency.number_format(json_decode($task->type)->earning,2) }}</div>
                </div>
                <small class="opacity-07">Click the link to perform the task</small>
            <a href="{{ $task->link }}" class="c-primary">{{ $task->link }}</a>
            </div>
            {{-- screenshot --}}
            <form action="{{ url('users/post/task/complete/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)" class="column p-top-10 g-10 w-full">
                <strong class="desc pc-m-x-auto u">Proof of Task</strong>
                {{-- csrf token --}}
                <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- task id --}}
                <input type="hidden" class="inp input" name="id" value="{{ $task->id }}">
                {{-- new input --}}
                <label class="w-full m-x-auto bg-light cont screenshot column align-center justify-center max-w-500 h-150 br-5 p-20" style="border:1px solid var(--rgt-01)">
                    <span class="opacity-05">Upload Screenshot ( Tap to upload )</span>
                    <input name="screenshot" onchange="UploadScreenshot(this)" class="display-none required inp input" type="file" accept="image/*">
                <img src="" alt="" class="h-full">
                </label>
                   
                 <span class="w-full c-red text-center opacity-07">Marking a task complete when you didn't actually complete it can lead to a permanent ban of your account.</span>
            <button class="post">I Have Completed the Task</button>
            </form>
           

    </section>

    @isset($task->banner)
        <section class="populate">
            <div class="child">
                <div class="row w-full align-center g-10 space-between">
                    <strong class="font-1"></strong>
                  <div onclick="this.closest('.populate').classList.remove('active')" class="w-fit br-1000 p-5 p-x-10 no-select pointer" style="background:var(--rgb-07);color:var(--rgt-10)">Close</div>
                </div>
                <img src="{{ asset('tasks/banners/'.$task->banner.'') }}" alt="" class="w-full max-w-500">
            </div>

        </section>
    @endisset
@endsection
@section('js')
    <script class="js">
        function Populate(element){
           document.querySelector('.populate').classList.add('active');
        }
        function UploadScreenshot(element){
            let file=element.files[0];
            
            if(file){
               
                element.closest('.screenshot').querySelector('img').src=URL.createObjectURL(file);
                element.closest('.screenshot').classList.add('active');
            }else{
                element.closest('.screenshot').classList.remove('active')
            }
        }
        function Completed(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url('users/tasks') }}')
            }
        }
    </script>
@endsection
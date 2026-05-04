@extends('layout.admins.app')
@section('title')
    Post Task
@endsection
@section('css')
    <style class="css">
        .banner img{
            display:none;

        }
        .banner.active img{
            display:flex;
        }
        .banner.active span{
            display:none;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
         <form style="border:1px solid var(--rgt-01);" enctype="multipart/form-data" method="POST" action="{{ url('admins/post/edit/task/process') }}" onsubmit="PostRequest(event,this,Posted,'Posting...')" class="w-full bg-light br-10 p-20 column g-10">
            <strong class="desc">Edit Task</strong>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            {{-- task id --}}
            <input type="hidden" class="inp input" name="id" value="{{ $task->id }}">
            {{-- initial banner --}}
            <input type="hidden" class="inp input" name="initial_banner" value="{{ $task->banner ?? '' }}">
            {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Task Type</label>
                <small><span class="font-weight-900">Note:</span> The amount earned by users on this task is based on the category/type selected,You can edit each category earnings and details from the categories page</small>
                 <div class="cont">
                <select name="type" class="inp input required">
                    <option value="" disabled>Click to choose...</option>
                    @foreach ($categories as $data)
                       
                            <option {{ ($task->type->id ?? '') == $data->id ? 'selected' : '' }} value="{{ $data->id }}">{{ $data->name }}</option>
                      
                    @endforeach
                </select>
            </div>
            </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Task Link</label>
                <small>Enter the link to the task</small>
                 <div class="cont">
               <input name="link" value="{{ $task->link }}" type="url" placeholder="Enter task link" class="inp input required">
                 </div>
                 </div>
                  {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Members</label>
                <small>The task is automatically removed from users dashboard if the members limit is reached( <span class="font-weight-900">For Example, For a 100 members task,the task is automatically removed when 100 users have performed  the task</span> ),you don't need to manually delete it</small>
                 <div class="cont">
               <input name="members" value="{{ $task->limit }}" type="number" placeholder="I.e 100 members" class="inp input required">
                 </div>
                 </div>
                   {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Banner(Optional)</label>
                 <label class="cont no-select banner {{ isset($task->banner) ? 'active' : '' }} column p-20 align-center justify-center h-150">
                    <span class="opacity-05">Upload banner( Tap to Upload )</span>
                    <img alt="" src="{{ isset($task->banner) ? asset('tasks/banners/'.$task->banner ?? ''.'') : '' }}" class="h-full max-w-full">
               <input onchange="PreviewImage(this)" name="banner" type="file" accept="image/*" class="inp display-none input">
                 </label>
                 </div>
                   {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Caption(Optional)</label>
                 <div class="cont">
              <textarea name="caption" placeholder="Enter caption..." class="inp no-resize input">{{ $task->caption ?? '' }}</textarea>
                 </div>
                 </div>
                

                 {{-- submit btn --}}
                 <button class="post">Save Changes</button>
           
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
     
            function  Posted(response){
               
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    
                    window.location.href=data.link;
                }
            }
            function PreviewImage(element){
                let file=element.files[0];
                if(file){
                    
                    element.closest('.banner').querySelector('img').src=URL.createObjectURL(file);
                    element.closest('.banner').classList.add('active');
                }else{
                    element.closest('.banner').classList.remove('active');
                }
            }
        
    </script>
@endsection
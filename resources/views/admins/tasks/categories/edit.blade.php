@extends('layout.admins.app')
@section('title')
    Edit Task Category
@endsection
@section('main')
    <section class="w-full column g-10">
        <form action="{{ url('admins/post/edit/task/category/process') }}" method="POST" onsubmit="PostRequest(event,this,Added)" style="border:1px solid var(--rgt-01)" action="" class="w-full bg-light br-10 p-20 column g-10">
           {{-- head --}}
            <div class="row c-primary g-10">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM117.66,149.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L80,164.69l26.34-26.35a8,8,0,0,1,11.32,11.32Zm0-64-32,32a8,8,0,0,1-11.32,0l-16-16A8,8,0,0,1,69.66,90.34L80,100.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM192,168H144a8,8,0,0,1,0-16h48a8,8,0,0,1,0,16Zm0-64H144a8,8,0,0,1,0-16h48a8,8,0,0,1,0,16Z"></path></svg>

                </span>
                <strong class="desc">Edit Category</strong>
            </div>
            <div style="background:var(--primary-01)" class="w-fit br-5 p-5 p-x-10">Category ID: {{ $data->uniqid }}</div>
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" class="inp input" name="_token">
            {{-- category id --}}
            <input type="hidden" class="inp input" name="id" value="{{ $data->id }}">
            {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Category Name</span>
                    <small class="opacity-07">Enter category name,i.e Whatsapp Group</small>
                </label>
                <div class="cont">
                    <input name="name" value="{{ $data->name }}" placeholder="E.g Whatsapp Group" type="text" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Category Cost</span>
                    <small class="opacity-07">Amount charged per user</small>
                </label>
                <div class="cont">
                    <input name="cost" value="{{ $data->cost }}" placeholder="E.g ₦40" type="number" class="inp input required">
                </div>
            </div>

              {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Category earning</span>
                    <small class="opacity-07">Earning per User</small>
                </label>
                <div class="cont">
                    <input value="{{ $data->earning }}" name="earning" placeholder="E.g ₦20" type="number" class="inp input required">
                </div>
            </div>

               {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Platform</span>
                    <small class="opacity-07">Category platform/app</small>
                </label>
                <div class="cont">
                    <input value="{{ $data->platform }}" name="platform" placeholder="E.g Facebook" type="text" class="inp input required">
                </div>
            </div>

              {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Members</span>
                    <small class="opacity-07">How man members</small>
                </label>
                <div class="cont">
                    <input value="{{ $data->members }}" name="members" placeholder="E.g 100" type="number" class="inp input required">
                </div>
            </div>
            
            {{-- submit btn --}}
            <button class="post">Save Changes</button>
          
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        function Added(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('admins/tasks/categories/manage') }}';
            }
        }
    </script>
@endsection
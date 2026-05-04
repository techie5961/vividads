@extends('layout.admins.app')
@section('title')
    Manage Categories
@endsection
@section('main')
    <section class="w-full column g-10">
       
       @if ($categories->isEmpty())
           @include('components.utilities',[
            'empty' => true,
            'text' => 'No Category Found'
           ])
       @else
        {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM117.66,149.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L80,164.69l26.34-26.35a8,8,0,0,1,11.32,11.32Zm0-64-32,32a8,8,0,0,1-11.32,0l-16-16A8,8,0,0,1,69.66,90.34L80,100.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM192,168H144a8,8,0,0,1,0-16h48a8,8,0,0,1,0,16Zm0-64H144a8,8,0,0,1,0-16h48a8,8,0,0,1,0,16Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Categories</span>
                <strong class="desc">{{ number_format($total) }}</strong>
            </div>
        </div>
        {{-- loop --}}
          <div class="grid pc-grid-2 place-center g-10 w-full">
              @foreach ($categories as $data)
            <div style="border:1px solid var(--rgt-01)" class="w-full br-primary bg-light p-20 column g-10">
                {{-- new row --}}
                <div style="border-bottom:1px dashed var(--rgt-01);padding-bottom:10px;" class="row align-center g-10 w-full space-between">
                    <div class="column g-5">
                        <div style="background:var(--primary-01)" class="p-5 w-fit p-x-10 br-5">{{ $data->uniqid }}</div>
                        <strong class="font-1">{{ $data->name }}</strong>
                        
                    </div>
                    <div class="status {{ $data->status == 'active' ? 'green' : 'gold' }}">{{ $data->status }}</div>
                </div>
                {{-- new row --}}
                <div class="row align-center w-full space-between g-10">
                    <div class="column g-5">
                        <small>Category Cost</small>
                        <strong>&#8358;{{ number_format($data->cost,2) }}</strong>
                    </div>
                      <div style="text-align:end;align-items:flex-end" class="column g-5">
                        <small>Category Earning</small>
                        <strong>&#8358;{{ number_format($data->earning,2) }}</strong>
                    </div>
                </div>
                {{-- new row --}}
                 <div class="row align-center w-full space-between g-10">
                    <div class="column g-5">
                        <small>Platform</small>
                        <strong>{{ $data->platform }}</strong>
                    </div>
                      <div style="text-align:end;align-items:flex-end" class="column g-5">
                        <small>Members</small>
                        <strong>{{ number_format($data->members) }}</strong>
                    </div>
                </div>
                {{-- new row --}}
                <div style="border-top:1px dashed var(--rgt-01);padding-top:10px;" class="w-full align-center g-10 space-between">
                        <div class="row align-center g-5">
                            <span>

                                <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="CurrentColor"></path>
</svg>

                            </span>
                            <span>{{ $data->frame }}</span>
                        </div>
                    </div>
                    {{-- new row --}}
                    <div class="row align-center g-10 space-between">
                        <button onclick="window.location.href='{{ url('admins/task/categories/edit?id='.$data->id.'') }}'" class="btn-green-3d">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M224,128v80a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32h80a8,8,0,0,1,0,16H48V208H208V128a8,8,0,0,1,16,0Zm5.66-58.34-96,96A8,8,0,0,1,128,168H96a8,8,0,0,1-8-8V128a8,8,0,0,1,2.34-5.66l96-96a8,8,0,0,1,11.32,0l32,32A8,8,0,0,1,229.66,69.66Zm-17-5.66L192,43.31,179.31,56,200,76.69Z"></path></svg>
                             Edit
                        </button>
                        <button onclick="DeletePrompt('{{ url('admins/task/categories/delete?id='.$data->id.'') }}')" class="btn-red-3d">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"></path></svg>
                              Delete
                        </button>
                    </div>
            </div>
        @endforeach
          </div>
       @endif

    </section>
<section onclick="this.classList.remove('active')" class="modal delete">
    <div onclick="event.stopPropagation()" class="child align-center text-center">
        <div class="w-50 circle perfect-square align-center g-10 justify-center column no-shrink bg-red c-white no-select">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"></path></svg>
        </div>
        <strong class="font-1">Delete this category</strong>
        <span>Are you sure you want to delete this task category? this action cannot be undone</span>
        <small class="c-red">All tasks already posted under this category won't be affected.</small>
        <div class="row w-full no-select align-center g-10 space-between">
            <div onclick="this.closest('.modal').classList.remove('active')" style="border:1px solid var(--rgt-01);background:var(--rgt-005)" class="h-40 row align-center justify-center br-5 w-fit p-10 p-x-20">Cancel</div>
            <div onclick="window.location.href=this.dataset.url" style="background:var(--primary);color:var(--primary-text)" class="h-40 proceed-btn row align-center justify-center br-5 w-fit p-10 p-x-20">Yes! Proceed</div>
        </div>
    </div>
</section>
   
@endsection
@section('js')
    <script class="js">
        function DeletePrompt(link){
            document.querySelector('.delete.modal').querySelector('.proceed-btn').dataset.url=link;
            document.querySelector('.delete.modal').classList.add('active');
        }
    </script>
@endsection
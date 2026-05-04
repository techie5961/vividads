@extends('layout.admins.app')
@section('title')
    Marketplace - Manage Products
@endsection
@section('css')
    <style class="css">
        .photo-preview{
            background:rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition:all 0.5s ease;
            position:fixed;
            top:0;
            left:0;
            bottom:0;
            right:0;
            left:0;
            z-index:3000;
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
            padding:20px;
            visibility: hidden;


        }

        .photo-preview .child{
            width:100%;
            max-width:500px;
            display:flex;
            flex-direction: column;
            gap:10px;
            visibility: hidden;
            opacity:0;
            transform:scale(0.5);
            transition: all 0.5s ease;

        }
        .photo-preview.active .child{
            opacity:1;
            visibility: visible;
            transform:scale(1);
        }
        .photo-preview img{
            max-width:100%;
        }
        .photo-preview.active{
                visibility: visible;
        }
        body:has(.photo-preview.active){
            overflow:hidden;
        }


    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.00488 9H19.9433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V9ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Products</span>
                <strong class="desc">{{ number_format($total) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M5.50045 20C6.32888 20 7.00045 20.6715 7.00045 21.5C7.00045 22.3284 6.32888 23 5.50045 23C4.67203 23 4.00045 22.3284 4.00045 21.5C4.00045 20.6715 4.67203 20 5.50045 20ZM18.5005 20C19.3289 20 20.0005 20.6715 20.0005 21.5C20.0005 22.3284 19.3289 23 18.5005 23C17.672 23 17.0005 22.3284 17.0005 21.5C17.0005 20.6715 17.672 20 18.5005 20ZM2.17203 1.75732L5.99981 5.58532V16.9993L20.0005 17V19H5.00045C4.44817 19 4.00045 18.5522 4.00045 18L3.99981 6.41332L0.757812 3.17154L2.17203 1.75732ZM16.0005 2.99996C16.5527 2.99996 17.0005 3.44768 17.0005 3.99996L16.9998 5.99932L19.9936 5.99996C20.5497 5.99996 21.0005 6.45563 21.0005 6.99536V15.0046C21.0005 15.5543 20.5505 16 19.9936 16H8.0073C7.45123 16 7.00045 15.5443 7.00045 15.0046V6.99536C7.00045 6.44562 7.4504 5.99996 8.0073 5.99996L10.9998 5.99932L11.0005 3.99996C11.0005 3.44768 11.4482 2.99996 12.0005 2.99996H16.0005ZM11.0005 7.99996H10.0005V14H11.0005V7.99996ZM18.0005 7.99996H17.0005V14H18.0005V7.99996ZM15.0005 4.99996H13.0005V5.99996H15.0005V4.99996Z"></path></svg>
               
            </div>
            <div class="column g-5">
                <span>Total Sold out</span>
                <strong class="desc">{{ number_format($sold) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M5.50045 20C6.32888 20 7.00045 20.6715 7.00045 21.5C7.00045 22.3284 6.32888 23 5.50045 23C4.67203 23 4.00045 22.3284 4.00045 21.5C4.00045 20.6715 4.67203 20 5.50045 20ZM18.5005 20C19.3289 20 20.0005 20.6715 20.0005 21.5C20.0005 22.3284 19.3289 23 18.5005 23C17.672 23 17.0005 22.3284 17.0005 21.5C17.0005 20.6715 17.672 20 18.5005 20ZM2.17203 1.75732L5.99981 5.58532V16.9993L20.0005 17V19H5.00045C4.44817 19 4.00045 18.5522 4.00045 18L3.99981 6.41332L0.757812 3.17154L2.17203 1.75732ZM16.0005 2.99996C16.5527 2.99996 17.0005 3.44768 17.0005 3.99996L16.9998 5.99932L19.9936 5.99996C20.5497 5.99996 21.0005 6.45563 21.0005 6.99536V15.0046C21.0005 15.5543 20.5505 16 19.9936 16H8.0073C7.45123 16 7.00045 15.5443 7.00045 15.0046V6.99536C7.00045 6.44562 7.4504 5.99996 8.0073 5.99996L10.9998 5.99932L11.0005 3.99996C11.0005 3.44768 11.4482 2.99996 12.0005 2.99996H16.0005ZM9.99981 7.99932L9.00045 7.99996V14L9.99981 13.9993V7.99932ZM15.9998 7.99932H11.9998V13.9993H15.9998V7.99932ZM19.0005 7.99996L17.9998 7.99932V13.9993L19.0005 14V7.99996ZM15.0005 4.99996H13.0005V5.99996H15.0005V4.99996Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Active</span>
                <strong class="desc">{{ number_format($active) }}</strong>
            </div>
        </div>
        {{-- loop --}}
        @if ($products->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No product available'
            ])
        @else
           <div class="grid pc-grid-2 place-center g-10 w-full">
             @foreach ($products as $data)
                <div style="border:1px solid var(--rgt-01)" class="column br-primary w-full bg-light p-20 g-10">
                        {{-- new row --}}
                        <div style="border-bottom:1px dashed var(--rgt-01);padding-bottom:10px;" class="row w-full g-10">
                            <img onclick="MyFunc.PreviewPhoto('{{ asset('photos/marketplace/'.$data->photo.'') }}')" style="box-shadow:0 0 10px var(--primary-03)" src="{{ asset('photos/marketplace/'.$data->photo.'') }}" alt="" class="w-full no-shrink h-50 w-50 br-10">
                            <div class="column g-5">
                                <strong class="font-1">{{ $data->name }}</strong>
                                <small>last updated {{ $data->frame }}</small>
                            </div>
                            <div class="status m-left-auto {{ $data->status == 'active' ? 'primary' : 'green' }}">{{ $data->status }}</div>
                        </div>
                        {{-- new row --}}
                        <div class="row w-full space-between g-10 align-center">
                            {{-- new item --}}
                            <div class="column g-5 text-align-start">
                                <small>Category</small>
                                <strong>{{ $data->category }}</strong>
                            </div>
                             {{-- new item --}}
                            <div class="column g-5 text-align-end">
                                <small>Location</small>
                                <strong>{{ $data->location }}</strong>
                            </div>
                        </div>
                         {{-- new row --}}
                        <div class="row w-full justify-end g-10 align-center">
                            <strong class="desc c-primary">
                                {{ $currency }}{{ number_format($data->price,2) }}
                            </strong>
                        </div>
                      @isset($data->address)
                            {{-- new row --}}
                        <div style="padding-top:10px;border-top:1px dashed var(--rgt-01)" class="opacity-07">{{ $data->address }}</div>
            
                      @endisset
                      {{-- new row --}}
                      <div style="border-top:1px dashed var(--rgt-01);padding-top:10px;" class="row w-full space-between align-center">
                            <button onclick="window.location.href='{{ url('admins/marketplace/product/edit?id='.$data->id.'') }}'" class="btn-green-3d">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.7134 7.12811L4.46682 7.69379C4.28637 8.10792 3.71357 8.10792 3.53312 7.69379L3.28656 7.12811C2.84706 6.11947 2.05545 5.31641 1.06767 4.87708L0.308047 4.53922C-0.102682 4.35653 -0.102682 3.75881 0.308047 3.57612L1.0252 3.25714C2.03838 2.80651 2.84417 1.97373 3.27612 0.930828L3.52932 0.319534C3.70578 -0.106511 4.29417 -0.106511 4.47063 0.319534L4.72382 0.930828C5.15577 1.97373 5.96158 2.80651 6.9748 3.25714L7.69188 3.57612C8.10271 3.75881 8.10271 4.35653 7.69188 4.53922L6.93228 4.87708C5.94451 5.31641 5.15288 6.11947 4.7134 7.12811ZM3.06361 21.6132C4.08854 15.422 6.31105 1.99658 21 1.99658C19.5042 4.99658 18.5 6.49658 17.5 7.49658L16.5 8.49658L18 9.49658C17 12.4966 14 15.9966 10 16.4966C7.33146 16.8301 5.66421 18.6635 4.99824 21.9966H3C3.02074 21.8722 3.0419 21.7443 3.06361 21.6132Z"></path></svg>

                                Edit
                            </button>
                            <button onclick="MyFunc.DeletePrompt('{{ url('admins/delete/marketplace/product?id='.$data->id.'') }}')" class="btn-red-3d">
                                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9ZM9 12V18H11V12H9ZM13 12V18H15V12H13Z"></path></svg>
                                Delete
                            </button>
                      </div>
                    </div>
            @endforeach
           </div>
            @if ($products->lastPage() > 1)
               @include('components.utilities',[
                'paginate' => true,
                'data' => $products
               ]) 
            @endif
        @endif
    </section>
    {{-- photo preview --}}
    <section class="photo-preview">
        <div class="child">
            <div onclick="this.closest('.photo-preview').classList.remove('active');" style="background:rgba(255,255,255,0.5)" class="w-fit p-5 p-x-20 m-left-auto row align-center justify-center br-1000 c-black no-select">close</div>
            <img src="{{ asset('photos/marketplace/'.$products[0]->photo.'') }}" alt="">
        </div>
    </section>
{{-- delete prompt --}}
 <section onclick="this.classList.remove('active')" class="modal delete">
    <div onclick="event.stopPropagation()" class="child align-center text-center">
        <div class="w-50 circle perfect-square align-center g-10 justify-center column no-shrink bg-red c-white no-select">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"></path></svg>
        </div>
        <strong class="font-1">Delete this Product</strong>
        <span>Are you sure you want to delete this product? this action cannot be undone</span>
        <div class="row w-full no-select align-center g-10 space-between">
            <div onclick="this.closest('.modal').classList.remove('active')" style="border:1px solid var(--rgt-01);background:var(--rgt-005)" class="h-40 row align-center justify-center br-5 w-fit p-10 p-x-20">Cancel</div>
            <div onclick="window.location.href=this.dataset.url" style="background:var(--primary);color:var(--primary-text)" class="h-40 proceed-btn row align-center justify-center br-5 w-fit p-10 p-x-20">Yes! Proceed</div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
            PreviewPhoto : (img_src)=>{
                   try{
                     document.querySelector('.photo-preview img').src=img_src;
                    document.querySelector('.photo-preview').classList.add('active');
                   }catch(error){
                    alert(error)
                   }
            },
            DeletePrompt : (link)=>{
            document.querySelector('.delete.modal').querySelector('.proceed-btn').dataset.url=link;
            document.querySelector('.delete.modal').classList.add('active');
        }
        }
    </script>
@endsection
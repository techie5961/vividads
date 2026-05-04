@extends('layout.admins.app')
@section('title')
    MarketPlace - Add Product
@endsection
@section('css')
    <style class="css">
      .custom-select{
            position:absolute;
            width:100%;
            max-width:500px;
            bottom:50%;
            background:rgba(0,0,0,0.7);
            backdrop-filter:blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color:white;
            z-index:500;
            max-height:50vh;
            overflow: auto;
            border-radius:10px;
           clip-path:inset(0 round 10px);
           transform-origin: bottom center;
           transition: all 0.5s ease;
           visibility: hidden;
           opacity:0;
           transform:scale(0);
        
           
           
      }
      .custom-select.active{
        opacity:1;
        transform:scale(1);
        visibility: visible;
       transition: all 0.5s ease;
      }
      .custom-select .option{
        border-bottom:0.7px solid rgba(255,255,255,0.4);
         display:flex;
        flex-direction: row;
        gap:5px;

      }
      .custom-select .option:last-of-type{
        border-bottom:none;
       
      }
      .custom-select .search{
        position:sticky;
        top:0;
        left:0;
        right:0;
        padding:10px;
         backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);

      }
      .custom-select .search input[type=search]{
        border:none;
        background:rgba(0,0,0,0.5);
        color:white;
       
      }
    
      .custom-select .option::before{
            content:'\2713';
            font-weight: bold;
            visibility: hidden;


      }
      .custom-select .option.selected::before{
            content:'\2713';
            font-weight: bold;
            visibility: visible;

      }
      
      
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
         <form action="{{ url('admins/post/marketplace/add/product/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.Added)" style="border:1px solid var(--rgt-01)" action="" class="w-full bg-light br-10 p-20 column g-10">
           {{-- head --}}
            <div class="row align-center c-primary g-10">
                <span>
                 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z"></path></svg>

                </span>
                <strong class="desc">Add new product</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" class="inp input" name="_token">
           {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Product Photo</span>
                    <small class="opacity-07">The picture of the product</small>
                </label>
                <div class="cont">
                    <input name="photo" accept="image/*" type="file" class="inp input required">
                </div>
            </div>
            {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Product Name</span>
                    <small class="opacity-07">Enter the name of the product</small>
                </label>
                <div class="cont">
                    <input name="name" placeholder="E.g Iphone 17 pro" type="text" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Product category</span>
                    <small class="opacity-07">Enter the category of the product</small>
                </label>
                <div class="cont">
                    <input name="category" placeholder="E.g Mobile Phones" type="text" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Product price({{ $currency }})</span>
                    <small class="opacity-07">Enter the cost/selling price of the product</small>
                </label>
                <div class="cont">
                    <input name="price" placeholder="E.g {{ $currency }}1,500,000" type="text" class="inp input required">
                </div>
            </div>
            {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Product Location( State )</span>
                    <small class="opacity-07">Enter the product location</small>
                </label>
                <div class="cont">
                    <select name="location" class="inp input required">
                        <option value="" selected disabled>Click to select...</option>
                        @foreach (NigeriaStates() as $data)
                            <option value="{{ $data }}">{{ $data }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
              {{-- new input --}}
            <div class="column w-full g-5">
                <label class="column g-2">
                    <span>Location Address(Optional)</span>
                    <small class="opacity-07">Enter product location address</small>
                </label>
                <div class="cont">
                    <input name="address" placeholder="E.g No. 5 new GRA Makurdi" type="text" class="inp input">
                </div>
            </div>
           
           
            
            {{-- submit btn --}}
            <button class="post">Add Product</button>
          
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
           Added : (response)=>{
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('admins/marketplace/products/manage') }}';
                }
           }
        }
    </script>
@endsection
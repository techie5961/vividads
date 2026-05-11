@extends('layout.users.app')
@section('title')
    Post Ads
@endsection
@section('css')
    <style class="css">
        form .pricing{
            display:none;
        }
        form.active .pricing{
            display:flex;
        }
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
    <section class="column w-full g-10">
        {{-- balance --}}
        <div style="border:1px solid var(--rgt-01)" class="w-full br-10 column g-10 bg-light p-20">
            <span>Ads Balance</span>
            <strong class="desc font-weight-900">{{ $currency.number_format(Auth::guard('users')->user()->deposit_balance,2) }}</strong>
            <div onclick="window.location.href='{{ url('users/recharge') }}'" class="no-select w-fit h-fit br-5 bg-primary pointer primary-text p-x-20 p-10">ADD FUND</div>
        </div>
        {{-- form --}}
        <form style="border:1px solid var(--rgt-01);" action="{{ url('admins/post/task/process') }}" onsubmit="PostRequest(event,this,Posted,'Posting...')" class="w-full bg-light br-10 p-20 column g-10">
            <strong class="desc">Post Tasks</strong>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
            {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Task Type</label>
                 <div class="cont">
                <select onchange="TypeSelected(this)" name="type" class="inp input required">
                    <option value="" selected disabled>Click to choose...</option>
                    @foreach ($categories as $data)
                       
                            <option data-cost="{{ $currency.number_format($data->cost * $data->members,2) }}" value="{{ $data->id }}">{{ $data->name }}</option>
                      
                    @endforeach
                </select>
            </div>
            </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Task Link</label>
                 <div class="cont">
               <input name="link" type="url" placeholder="Enter task link" class="inp input required">
                 </div>
                 </div>
                      {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Banner(Optional)</label>
                 <label class="cont no-select banner column p-20 align-center justify-center h-150">
                    <span class="opacity-05">Upload banner( Tap to Upload )</span>
                    <img alt="" class="h-full max-w-full">
               <input onchange="PreviewImage(this)" name="banner" type="file" accept="image/*" class="inp display-none input">
                 </label>
                 </div>
                   {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Caption(Optional)</label>
                 <div class="cont">
              <textarea name="caption" placeholder="Enter caption..." class="inp no-resize input"></textarea>
                 </div>
                 </div>
                 <div style="background:var(--primary-01);color:var(--primary)" class="w-full pricing p-10 br-5 no-select row align-center g-5">
                    <span>You need at least <span class="price"></span> to post this task</span>
                 </div>

                 {{-- submit btn --}}
                 <button class="post">Post Task Now</button>
           
        </form>
    </section>
@endsection
@section('js')
   <script class="js">
     
           
          function  Posted(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    
                    Redirect(data.link)
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
@extends('layout.admins.app')
@section('title')
    Manage Gift Codes
@endsection
@section('main')
    <section class="w-full column g-10">
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.0049 20.9997H3.00488C2.4526 20.9997 2.00488 20.552 2.00488 19.9997V3.99969C2.00488 3.44741 2.4526 2.99969 3.00488 2.99969H10.0049C10.0049 4.10426 10.9003 4.99969 12.0049 4.99969C13.1095 4.99969 14.0049 4.10426 14.0049 2.99969H21.0049C21.5572 2.99969 22.0049 3.44741 22.0049 3.99969V19.9997C22.0049 20.552 21.5572 20.9997 21.0049 20.9997H14.0049C14.0049 19.8951 13.1095 18.9997 12.0049 18.9997C10.9003 18.9997 10.0049 19.8951 10.0049 20.9997ZM6.00488 7.99969V15.9997H8.00488V7.99969H6.00488ZM16.0049 7.99969V15.9997H18.0049V7.99969H16.0049Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Codes</span>
                <strong class="desc">{{ number_format($total) }}</strong>
            </div>
        </div>
           {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.0049 20.9997C11.0049 20.1712 10.3333 19.4997 9.50488 19.4997C8.67646 19.4997 8.00488 20.1712 8.00488 20.9997H3.00488C2.4526 20.9997 2.00488 20.5519 2.00488 19.9997V3.99966C2.00488 3.44738 2.4526 2.99966 3.00488 2.99966H8.00488C8.00488 3.82809 8.67646 4.49966 9.50488 4.49966C10.3333 4.49966 11.0049 3.82809 11.0049 2.99966H21.0049C21.5572 2.99966 22.0049 3.44738 22.0049 3.99966V9.49966C20.6242 9.49966 19.5049 10.619 19.5049 11.9997C19.5049 13.3804 20.6242 14.4997 22.0049 14.4997V19.9997C22.0049 20.5519 21.5572 20.9997 21.0049 20.9997H11.0049ZM9.50488 10.4997C10.3333 10.4997 11.0049 9.82809 11.0049 8.99966C11.0049 8.17124 10.3333 7.49966 9.50488 7.49966C8.67646 7.49966 8.00488 8.17124 8.00488 8.99966C8.00488 9.82809 8.67646 10.4997 9.50488 10.4997ZM9.50488 16.4997C10.3333 16.4997 11.0049 15.8281 11.0049 14.9997C11.0049 14.1712 10.3333 13.4997 9.50488 13.4997C8.67646 13.4997 8.00488 14.1712 8.00488 14.9997C8.00488 15.8281 8.67646 16.4997 9.50488 16.4997Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Active Codes</span>
                <strong class="desc">{{ number_format($total_active) }}</strong>
            </div>
        </div>
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979ZM8.09024 18.9998C8.29615 18.4172 8.85177 17.9998 9.50488 17.9998C10.158 17.9998 10.7136 18.4172 10.9195 18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H10.9195C10.7136 5.58238 10.158 5.99979 9.50488 5.99979C8.85177 5.99979 8.29615 5.58238 8.09024 4.99979H4.00488V18.9998H8.09024ZM9.50488 10.9998C8.67646 10.9998 8.00488 10.3282 8.00488 9.49979C8.00488 8.67136 8.67646 7.99979 9.50488 7.99979C10.3333 7.99979 11.0049 8.67136 11.0049 9.49979C11.0049 10.3282 10.3333 10.9998 9.50488 10.9998ZM9.50488 15.9998C8.67646 15.9998 8.00488 15.3282 8.00488 14.4998C8.00488 13.6714 8.67646 12.9998 9.50488 12.9998C10.3333 12.9998 11.0049 13.6714 11.0049 14.4998C11.0049 15.3282 10.3333 15.9998 9.50488 15.9998Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Used Codes</span>
                <strong class="desc">{{ number_format($total_used) }}</strong>
            </div>
        </div>

        {{-- loop --}}
       @if ($codes->isEmpty())
           @include('components.utilities',[
            'empty' => true,
            'text' => 'No gift code available'
           ])
       @else
           <div class="grid pc-grid-2 g-10 place-center w-full">
             @foreach ($codes as $data)
                <div style="border:1px solid var(--rgt-01);" class="w-full br-primary p-20 column g-10 bg-light">
                   <div class="row align-center c-primary no-select g-2">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM13.0049 10.0028H11.0049V20.0028H13.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

                    <span class="bold font-1">Gift Code</span>
                   </div>
                    {{-- new row --}}
                   <div style="padding-bottom:10px;border-bottom:1px dashed var(--rgt-01);" class="row g-10 w-full align-center space-between">
                     <div style="background:var(--primary-01)" class="p-5 row align-center g-5 br-5 p-x-10 w-fit">
                        {{ $data->code }}
                        <span onclick="copy('{{ $data->code }}')">
                         <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

                        </span>
                    </div>

                    <div class="status {{ $data->status == 'active' ? 'green' : 'primary' }}">{{ $data->status }}</div>
                   </div>
                    {{-- new row --}}
                <div class="row w-full g-10 space-between">
                    <strong class="font-1">Code Value</strong>
                    <strong class="desc c-green">{{ $currency.number_format($data->value,2) }}</strong>
                </div>
                {{-- new row --}}
                <div style="padding-bottom:10px;border-bottom:1px dashed var(--rgt-01);" class="row w-full space-between g-10">
                    {{-- new item --}}
                    <div class="column g-5 text-align-start">
                        <small>Code Limit</small>
                        <strong>{{ number_format($data->limit) }} Users</strong>
                    </div>
                    {{-- new item --}}
                    <div class="column g-5 text-align-end">
                        <small>Total Redeemed</small>
                        <strong>{{ number_format($data->redeemed) }}</strong>
                    </div>
                </div>
                {{-- new row --}}
                <div class="row g-5 align-center">
                    <span class="bold row align-center">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM13 12V7H11V14H17V12H13Z"></path></svg>
                        Last Updated:
                    </span>
                    <span>{{ $data->frame }}</span>
                </div>
                {{-- new row --}}
                <div class="row w-full g-10 space-between align-center">
                    <button onclick="window.location.href='{{ url('admins/edit/gift/code?id='.$data->id.'') }}'" class="btn-green-3d">
                      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                        Edit
                    </button>
                      <button onclick="MyFunc.DeletePrompt('{{ url('admins/delete/gift/code?id='.$data->id.'') }}')" class="btn-red-3d">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9ZM9 12V18H11V12H9ZM13 12V18H15V12H13Z"></path></svg>
                        Delete
                    </button>
                </div>
                 {{-- new row --}}
                <div class="row w-full g-10 space-between align-center">
                    <button onclick="window.location.href='{{ url('admins/transactions?type=gift_code&gift_code_id='.$data->id.'') }}'" class="btn-primary-3d">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V21C21 21.5523 20.5523 22 20 22ZM8 7V9H16V7H8ZM8 11V13H16V11H8ZM8 15V17H16V15H8Z"></path></svg>

                       View History
                    </button>
                    
                    </button>
                </div>
                </div>
               
              @endforeach
           </div>
           @if ($codes->lastPage() > 1)
               @include('components.utilities',[
                'paginate' => true,
                'data' => $codes
               ])
           @endif
       @endif
    </section>

    <section onclick="this.classList.remove('active')" class="modal delete">
    <div onclick="event.stopPropagation()" class="child align-center text-center">
        <div class="w-50 circle perfect-square align-center g-10 justify-center column no-shrink bg-red c-white no-select">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"></path></svg>
        </div>
        <strong class="font-1">Delete this Gift code</strong>
        <span>Are you sure you want to delete this gift code? this action cannot be undone</span>
        <small class="c-red">All users who have already redeemed this gift code won't be affected.</small>
        <div class="row w-full no-select align-center g-10 space-between">
            <div onclick="this.closest('.modal').classList.remove('active')" style="border:1px solid var(--rgt-01);background:var(--rgt-005)" class="h-40 row align-center justify-center br-5 w-fit p-10 p-x-20">Cancel</div>
            <div onclick="window.location.href=this.dataset.url" style="background:var(--primary);color:var(--primary-text)" class="h-40 proceed-btn row align-center justify-center br-5 w-fit p-10 p-x-20">Yes! Proceed</div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script class="js">
        window.MyFunc= {
 DeletePrompt :(link)=>{
            document.querySelector('.delete.modal').querySelector('.proceed-btn').dataset.url=link;
            document.querySelector('.delete.modal').classList.add('active');
        }
        }
        
    </script>
@endsection
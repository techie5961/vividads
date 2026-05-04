@extends('layout.admins.app')
@section('title')
    Task Proofs
@endsection
@section('css')
  <style class="css">
  

  </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M11 4H21V6H11V4ZM11 8H17V10H11V8ZM11 14H21V16H11V14ZM11 18H17V20H11V18ZM3 4H9V10H3V4ZM5 6V8H7V6H5ZM3 14H9V20H3V14ZM5 16V18H7V16H5Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Proofs</span>
                <strong class="desc">{{ number_format($total) }}</strong>
            </div>
        </div>
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M7 3V1H9V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V9H20V5H17V7H15V5H9V7H7V5H4V19H10V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7ZM17 12C14.7909 12 13 13.7909 13 16C13 18.2091 14.7909 20 17 20C19.2091 20 21 18.2091 21 16C21 13.7909 19.2091 12 17 12ZM11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16ZM16 13V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V13H16Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Pending Proofs</span>
                <strong class="desc">{{ number_format($total_pending) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
             <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM17.4571 9.45711L16.0429 8.04289L11 13.0858L8.20711 10.2929L6.79289 11.7071L11 15.9142L17.4571 9.45711Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Approved Proofs</span>
                <strong class="desc">{{ number_format($total_approved) }}</strong>
            </div>
        </div>
        {{-- search --}}
        {{-- <div class="row w-full g-10">
            <div style="border:1px solid var(--rgt-01);" class="w-full search br-primary p-20 bg-light">
                <div class="cont">
                    <input type="search" class="inp input">
                </div>
            </div>
        </div> --}}
        @if ($proofs->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Proof submitted'
            ])
        @else
        
        @if ($status == 'pending' || $status == 'all')
             @if ($total_pending > 0)
             
         <div class="row p-10 align-end justify-end w-full align-center g-10">
            <button onclick="ShowApproveAllModal()" class="btn-green-3d">Approve All Pending</button>
            <button onclick="ShowRejectAllModal()" class="btn-red-3d">Reject All Pending</button>
          </div> 
         @endif
        @endif
          <div class="w-full grid pc-grid-2 g-10 place-center">
              @foreach ($proofs as $data)
                <div style="border:1px solid var(--rgt-01);" class="column w-full p-20 g-10 br-primary bg-light">
                    {{-- new row --}}
                    <div style="border-bottom:1px dashed var(--rgt-01);padding-bottom:10px;" class="row align-center w-full g-10 space-between">
                        <div style="box-shadow: 0 0 10px var(--primary-02)" class="h-50 w-50 min-w-50 min-h-50 circle bg-light p-5">
                            @isset($data->user->photo)
                                <img  class="h-full w-full circle"  src="{{ asset('photos/users/'.$data->user->photo.'') }}" alt="">
                                @else
                                 <div class="h-full w-full column align-center justify-center circle bg-primary primary-text">
                                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
                                    </div>
                            @endisset
                        </div>
                        <div class="column m-right-auto g-5">
                            <strong class="desc c-primary u">{{ $data->user->username }}</strong>
                            <span class="font-size-07">Submitted {{ $data->frame }}</span>
                        </div>
                        <div class="status {{ $data->status == 'approved' ? 'green' : ($data->status == 'pending' ? 'gold' : 'red') }}">{{ $data->status }}</div>
                    </div>
                    {{-- new row --}}
                    @foreach ($data->proofs as $key => $value)
                        <div class="row w-full align-center g-10">
                            <span>{{ $key }}:</span>
                        {!! $value !!}
                    </div>
                    @endforeach
                    {{-- new row --}}
                    <div class="w-full row align-center g-10">
                        <span>Task ID:</span>
                        <span style="background:var(--primary-01)" class="row p-5 w-fit p-x-10 br-5">{{ $data->task->uniqid }}</span>
                    </div>
                    {{-- new row --}}
                    <div class="w-full row align-center g-10">
                        <span>Task Name:</span>
                        <span>{{ $data->type->name ?? 'null' }}</span>
                    </div>
                    {{-- new row --}}
                     <div class="w-full row align-center g-10">
                        <span>Platform:</span>
                        <span>{{ $data->type->platform ?? 'null' }}</span>
                    </div>
                     {{-- new row --}}
                     <div class="w-full row align-center g-10">
                        <span>Task Earning:</span>
                        <div class="font-weight-600 p-5 p-x-10 br-5" style="background:rgba(0,255,0,0.1);color:#4caf50;">{{ $currency }}{{ number_format($data->type->earning,2) }}</div>
                    </div>
                    {{-- new row --}}
                    <div style="border-top:1px dashed var(--rgt-01)" class="row w-full p-top-10 align-center space-between g-10">
                      @if ($data->status == 'pending')
                          
                      <button onclick="ShowApproveModal('{{ $data->id }}','{{ $currency }}{{ number_format($data->type->earning,2) }}')" class="btn-green-3d">
                           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                            Approve
                        </button>
                          <button  onclick="ShowRejectModal('{{ $data->id }}')"  class="btn-red-3d">
                           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 10.5858L9.17157 7.75736L7.75736 9.17157L10.5858 12L7.75736 14.8284L9.17157 16.2426L12 13.4142L14.8284 16.2426L16.2426 14.8284L13.4142 12L16.2426 9.17157L14.8284 7.75736L12 10.5858Z"></path></svg>

                            Reject
                        </button>
                          
                      @endif
                    </div>
                     {{-- new row --}}
                    <div class="row w-full align-center space-between g-10">
                        <button onclick="ShowPenaliseModal('{{ $data->id }}')" class="btn-gold-3d">
                          <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM11.9996 6.34326L17.9493 12.293H12.9996V17.657H10.9996V12.293H6.0498L11.9996 6.34326Z"></path></svg>

                            Penalise
                        </button>
                          <button onclick="window.open('{{ $data->task->link }}')" class="btn-primary-3d">
                           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.0607 8.11097L14.4749 9.52518C17.2086 12.2589 17.2086 16.691 14.4749 19.4247L14.1214 19.7782C11.3877 22.5119 6.95555 22.5119 4.22188 19.7782C1.48821 17.0446 1.48821 12.6124 4.22188 9.87874L5.6361 11.293C3.68348 13.2456 3.68348 16.4114 5.6361 18.364C7.58872 20.3166 10.7545 20.3166 12.7072 18.364L13.0607 18.0105C15.0133 16.0578 15.0133 12.892 13.0607 10.9394L11.6465 9.52518L13.0607 8.11097ZM19.7782 14.1214L18.364 12.7072C20.3166 10.7545 20.3166 7.58872 18.364 5.6361C16.4114 3.68348 13.2456 3.68348 11.293 5.6361L10.9394 5.98965C8.98678 7.94227 8.98678 11.1081 10.9394 13.0607L12.3536 14.4749L10.9394 15.8891L9.52518 14.4749C6.79151 11.7413 6.79151 7.30911 9.52518 4.57544L9.87874 4.22188C12.6124 1.48821 17.0446 1.48821 19.7782 4.22188C22.5119 6.95555 22.5119 11.3877 19.7782 14.1214Z"></path></svg>

                           Visit Task Link
                        </button>
                    </div>



                </div>
            @endforeach
          </div>
          @if ($proofs->lastPage() > 1)
    @include('components.utilities',[
        'paginate' => true,
        'data' => $proofs
    ])              
          @endif
        @endif
      
    
    </section>
    {{-- approve all modal --}}
    <section onclick="this.classList.remove('active')" class="modal approve-all">
        <div onclick="event.stopPropagation()" class="child">
            <form method="POST" action="{{ url('admins/post/approve/all/pending/task/process') }}" onsubmit="PostRequest(event,this,Completed)" class="w-full column g-10 align-center text-center">
               {{-- csrf token --}}
               <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                 <div class="column h-50 w-50 circle bg-green align-center justify-center c-white">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </div>
            <strong class="desc">Approve all pending Task</strong>
            <span>Please confirm to approve all pending task. Due to performance issues the system would appove in batches ie the first 50 records.</span>
            <strong>You would have to come back and click on the approve all button again to reject the next 50 records if there are still pending tasks.</strong>
           <small class="c-red opacity-07">This action is a dangerous action as all proofs would be approved and users balance updated wether they actually performed it or not.</small>
           <button class="post">Yes! Approve</button>
        </form>
            
        </div>
    </section>
     {{-- reject all modal --}}
    <section onclick="this.classList.remove('active')" class="modal reject-all">
        <div onclick="event.stopPropagation()" class="child">
            <form method="POST" action="{{ url('admins/post/reject/all/pending/task/process') }}" onsubmit="PostRequest(event,this,Completed)" class="w-full column g-10 align-center text-center">
               {{-- csrf token --}}
               <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
               <div class="column h-50 w-50 circle bg-red align-center justify-center c-white">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 10.5858L9.17157 7.75736L7.75736 9.17157L10.5858 12L7.75736 14.8284L9.17157 16.2426L12 13.4142L14.8284 16.2426L16.2426 14.8284L13.4142 12L16.2426 9.17157L14.8284 7.75736L12 10.5858Z"></path></svg>

            </div>
            <strong class="desc">Reject all pending Task</strong>
            <span>Please confirm to reject all pending task. Due to performance issues the system would reject in batches ie the first 50 records.</span>
            <strong>You would have to come back and click on the reject all button again to reject the next 50 records if there are still pending tasks.</strong>
           <small class="c-red opacity-07">This action is a dangerous action as all proofs would be rejected wether they actually performed it or not.</small>
           <button class="post">Yes! Reject</button>
        </form>
            
        </div>
    </section>
    {{-- approve modal --}}
    <section onclick="this.classList.remove('active')" class="modal approve">
        <div onclick="event.stopPropagation()" class="child">
            <form method="POST" action="{{ url('admins/post/approve/task/process') }}" onsubmit="PostRequest(event,this,Completed)" class="w-full column g-10 align-center text-center">
               {{-- csrf token --}}
               <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
               {{-- task id --}}
               <input type="hidden" class="inp input" name="id" value="">
                <div class="column h-50 w-50 circle bg-green align-center justify-center c-white">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </div>
            <strong class="desc">Approve this Task</strong>
            <span>Please confirm to approve the task. Note that the user would be creditted the sum of <strong class="amount">N50.00</strong> into his/her wallet as a reward for performing the task.</span>
           <small class="c-red opacity-07">This action is irreversible so ensure the user actually performed the task and the proof submitted is valid.</small>
           <button class="post">Yes! Approve Task</button>
        </form>
            
        </div>
    </section>
    {{-- reject modal --}}
     <section onclick="this.classList.remove('active')" class="modal reject">
        <div onclick="event.stopPropagation()" class="child">
            <form method="POST" action="{{ url('admins/post/reject/task/process') }}" onsubmit="PostRequest(event,this,Completed)" class="w-full column g-10 align-center text-center">
               {{-- csrf token --}}
               <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
               {{-- task id --}}
               <input type="hidden" class="inp input" name="id" value="">
                <div class="column h-50 w-50 circle bg-red align-center justify-center c-white">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 10.5858L9.17157 7.75736L7.75736 9.17157L10.5858 12L7.75736 14.8284L9.17157 16.2426L12 13.4142L14.8284 16.2426L16.2426 14.8284L13.4142 12L16.2426 9.17157L14.8284 7.75736L12 10.5858Z"></path></svg>

            </div>
            <strong class="desc">Reject this Task</strong>
            <span>Please confirm to reject the task.The user wont be rewarded for this task</span>
           <small class="c-red opacity-07">This action is irreversible so ensure the user actually did not  perform the task correctly.</small>
           <button class="post">Yes! Reject Task</button>
        </form>
            
        </div>
    </section>
     {{-- penalise modal --}}
     <section onclick="this.classList.remove('active')" class="modal penalise">
        <div onclick="event.stopPropagation()" class="child">
            <form method="POST" action="{{ url('admins/post/penalise/task/process') }}" onsubmit="PostRequest(event,this,Completed)" class="w-full column g-10 align-center text-center">
               {{-- csrf token --}}
               <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
               {{-- task id --}}
               <input type="hidden" class="inp input" name="id" value="">
                <div class="column h-50 w-50 circle bg-gold align-center justify-center c-black">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM11.9996 6.34326L17.9493 12.293H12.9996V17.657H10.9996V12.293H6.0498L11.9996 6.34326Z"></path></svg>

            </div>
            <strong class="desc">Penalise this Task</strong>
            <span>Please confirm to penalise this task. Only take this action if the task was approved by mistake or wrongly rewarded.</span>
           <small class="c-red opacity-07">This action is irreversible so ensure the user actually did not  perform the task correctly or over rewarded for the task.</small>
        
            <div class="column text-start g-5 w-full">
                  <label for="">Penalty Fee({{ $currency }})</label>
 <small>This is the fee which would be deducted from the users balance as penalty for the task</small>
          
             <div class="cont">
            <input name="amount" type="number" value="{{ $general_settings->task->penalty }}" class="inp input required">
          </div>
         
           </div>
           
          
           <button class="post">Yes! Penalise Task</button>
        </form>
            
        </div>
    </section>
    
@endsection
@section('js')
    <script class="js">
        function ShowApproveModal(task_id,task_earning){
            let modal=document.querySelector('.modal.approve');
            modal.querySelector('form input[name=id]').value=task_id;
            modal.querySelector('.amount').innerHTML=task_earning;
            modal.classList.add('active');
            
        }
        function ShowRejectModal(task_id){
            let modal=document.querySelector('.modal.reject');
            modal.querySelector('form input[name=id]').value=task_id;
            modal.classList.add('active');
            
        }
        function ShowPenaliseModal(task_id){
            let modal=document.querySelector('.modal.penalise');
            modal.querySelector('form input[name=id]').value=task_id;
            modal.classList.add('active');
            
        }
        
        function Completed(response){
           try{
 let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.reload();
            }
           }catch(error){
            alert(error)
           }
        }

        function ShowApproveAllModal(){
            document.querySelector('.modal.approve-all').classList.add('active');
        }
        function ShowRejectAllModal(){
            document.querySelector('.modal.reject-all').classList.add('active');
        }
    </script>
@endsection
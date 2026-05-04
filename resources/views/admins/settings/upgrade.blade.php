@extends('layout.admins.app')
@section('title')
    Upgrade Settings 
@endsection
@section('main')
       <section class="w-full column g-10">
        {{-- settings form --}}
        <form onsubmit="PostRequest(event,this)" action="{{ url('admins/post/upgrade/settings/process') }}" style="border:1px solid var(--rgt-01)" class="w-full bg-light br-primary column g-10 p-20">
           {{-- title --}}
            <div class="row c-primary align-center g-10">
                <span class="h-fit row">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM11.9996 6.34326L17.9493 12.293H12.9996V17.657H10.9996V12.293H6.0498L11.9996 6.34326Z"></path></svg>
                 </span>
                <strong class="desc">Upgrade Settings</strong>
            </div>
            {{-- csrf token --}}
            <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
           {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Upgrade Plan</label>
                <small class="opacity-07">The name of the upgrade plan(this is just for display)</small>
                </label>
                <div class="cont">
                    <input value="{{ $settings->upgrade->name ?? '' }}" name="plan_name" type="text" placeholder="E.g Basic Plan" class="inp input required">
                </div>
            </div>
            {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Upgrade Fee</label>
                <small class="opacity-07">Cost of upgrade(the fee required to pay before being upgraded)</small>
                </label>
                <div class="cont">
                    <input value="{{ $settings->upgrade->fee ?? '' }}" name="upgrade_fee" type="number" placeholder="E.g {{ $currency }}1,000" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Cashback</label>
                <small class="opacity-07">Bonus received immediately after upgrade(set to Zero if none)</small>
                </label>
                <div class="cont">
                    <input value="{{ $settings->upgrade->cashback ?? '' }}" name="cashback" type="number" placeholder="E.g {{ $currency }}300" class="inp input required">
                </div>
            </div>
             {{-- new input --}}
            <div class="row align-center space-between g-5 w-full">
               <div class="column g-2">
                 <label>Upgrade before withdrawal</label>
                <small class="opacity-05">If turned on,The user would be redirected to upgrade page whenever they try to withdraw</small>
                </div> 
                <div class="toggle {{ ($settings->upgrade->portal ?? 'off') == 'on' ? 'active' : '' }}">
                    <div onclick="MyFunc.ToggleBar(this,'upgrade_portal')" class="child"></div>
                </div>
                <input type="hidden" name="upgrade_portal" value="{{ $settings->upgrade->portal ?? 'off' }}" class="inp input">
            </div>
             {{-- new input --}}
            <div class="w-full column g-5">
                <label class="column g-2">
                    <label>Free users Daily Task</label>
                <small class="opacity-07">How many tasks maximum can free users perform daily(Enter 1000 for unlimited)</small>
                </label>
                <div class="cont">
                    <input value="{{ $settings->free_users->daily_tasks ?? '' }}" name="free_users_daily_tasks" type="number" placeholder="E.g 5" class="inp input required">
                </div>
            </div>
           
           
            
            <button class="post">Save Changes</button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc = {
              ToggleBar : function(element,input_name){
                if(element.closest('.toggle').classList.contains('active')){
                    element.closest('.toggle').classList.remove('active');
                    element.closest('form').querySelector(`input[name=${input_name}]`).value='off';
                }else{
                    element.closest('.toggle').classList.add('active');
                    element.closest('form').querySelector(`input[name=${input_name}]`).value='on';
                }
            },
        }
    </script>
@endsection
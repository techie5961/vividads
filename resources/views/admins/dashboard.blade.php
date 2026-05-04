@extends('layout.admins.app')
@section('title')
  Dashboard    
@endsection
@section('css')
    <style class="css">
       .analytic{
        user-select: none;
        
       }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
     <div class="column g-5">
          <strong class="font-1-5 c-primary">Welcome back, {{ ucfirst(Auth::guard('admins')->user()->tag) }}</strong>
   <span class="c-primary">Here's what's happening today.</span>

    </div> 
    {{-- total users --}}
    <div onclick="window.location.href='{{ url('admins/users') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>Total Users</span>
            <span class="c-primary opacity-02">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M164.38,181.1a52,52,0,1,0-72.76,0,75.89,75.89,0,0,0-30,28.89,12,12,0,0,0,20.78,12,53,53,0,0,1,91.22,0,12,12,0,1,0,20.78-12A75.89,75.89,0,0,0,164.38,181.1ZM100,144a28,28,0,1,1,28,28A28,28,0,0,1,100,144Zm147.21,9.59a12,12,0,0,1-16.81-2.39c-8.33-11.09-19.85-19.59-29.33-21.64a12,12,0,0,1-1.82-22.91,20,20,0,1,0-24.78-28.3,12,12,0,1,1-21-11.6,44,44,0,1,1,73.28,48.35,92.18,92.18,0,0,1,22.85,21.69A12,12,0,0,1,247.21,153.59Zm-192.28-24c-9.48,2.05-21,10.55-29.33,21.65A12,12,0,0,1,6.41,136.79,92.37,92.37,0,0,1,29.26,115.1a44,44,0,1,1,73.28-48.35,12,12,0,1,1-21,11.6,20,20,0,1,0-24.78,28.3,12,12,0,0,1-1.82,22.91Z"></path></svg>

            </span>
        </div>
        <strong class="font-1-5">{{ number_format($total_users) }}</strong>
       
    </div>
     {{-- new users --}}
    <div onclick="window.location.href='{{ url('admins/users?new=true') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>New Users</span>
            <span class="c-primary opacity-02">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M256,136a8,8,0,0,1-8,8H232v16a8,8,0,0,1-16,0V144H200a8,8,0,0,1,0-16h16V112a8,8,0,0,1,16,0v16h16A8,8,0,0,1,256,136ZM144,157.68a68,68,0,1,0-71.9,0c-20.65,6.76-39.23,19.39-54.17,37.17A8,8,0,0,0,24,208H192a8,8,0,0,0,6.13-13.15C183.18,177.07,164.6,164.44,144,157.68Z"></path></svg>
                </span>
        </div>
        <strong class="font-1-5">{{ number_format($today_users) }}</strong>
       
    </div>
    
      {{-- pending withdrawal --}}
    <div onclick="window.location.href='{{ url('admins/transactions?type=withdrawal&status=pending') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>Pending Withdrawals</span>
            <span class="c-gold opacity-02">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0ZM88,80h32v64a8,8,0,0,0,16,0V80h32a8,8,0,0,0,5.66-13.66l-40-40a8,8,0,0,0-11.32,0l-40,40A8,8,0,0,0,88,80Z"></path></svg>
              </span>
        </div>
        <strong class="font-1-5">&#8358;{{ number_format($pending_withdrawals,2) }}</strong>
       
    </div>
     {{-- successfull withdrawals --}}
    <div onclick="window.location.href='{{ url('admins/transactions?type=withdrawal&status=success') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>Successfull Withdrawals</span>
            <span class="c-green opacity-02">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0ZM88,80h32v64a8,8,0,0,0,16,0V80h32a8,8,0,0,0,5.66-13.66l-40-40a8,8,0,0,0-11.32,0l-40,40A8,8,0,0,0,88,80Z"></path></svg>
              </span>
        </div>
        <strong class="font-1-5">&#8358;{{ number_format($successfull_withdrawals,2) }}</strong>
       
    </div>
      {{-- rejected withdrawals --}}
    <div onclick="window.location.href='{{ url('admins/transactions?type=withdrawal&status=rejected') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>Rejected Withdrawals</span>
            <span class="c-red opacity-02">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0ZM88,80h32v64a8,8,0,0,0,16,0V80h32a8,8,0,0,0,5.66-13.66l-40-40a8,8,0,0,0-11.32,0l-40,40A8,8,0,0,0,88,80Z"></path></svg>
              </span>
        </div>
        <strong class="font-1-5">&#8358;{{ number_format($rejected_withdrawals,2) }}</strong>
       
    </div>
      {{-- pending deposits --}}
    <div onclick="window.location.href='{{ url('admins/transactions?type=deposit&status=pending') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>Pending Deposits</span>
            <span class="c-gold opacity-02">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0Zm-101.66,5.66a8,8,0,0,0,11.32,0l40-40A8,8,0,0,0,168,96H136V32a8,8,0,0,0-16,0V96H88a8,8,0,0,0-5.66,13.66Z"></path></svg>
              </span>
        </div>
        <strong class="font-1-5">&#8358;{{ number_format($pending_deposits,2) }}</strong>
       
    </div>
      {{-- successfull deposits --}}
    <div onclick="window.location.href='{{ url('admins/transactions?type=deposit&status=success') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>Successfull Deposits</span>
            <span class="c-green opacity-02">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0Zm-101.66,5.66a8,8,0,0,0,11.32,0l40-40A8,8,0,0,0,168,96H136V32a8,8,0,0,0-16,0V96H88a8,8,0,0,0-5.66,13.66Z"></path></svg>
              </span>
        </div>
        <strong class="font-1-5">&#8358;{{ number_format($successfull_deposits,2) }}</strong>
       
    </div>
      {{-- rejected deposits --}}
    <div onclick="window.location.href='{{ url('admins/transactions?type=deposit&status=rejected') }}'" style="border:1px solid var(--primary-02)" class="w-full analytic bg-light p-20 br-primary column g-10">
        <div class="row g-10 align-center space-between w-full">
            <span>Rejected Deposits</span>
            <span class="c-red opacity-02">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="30" width="30"><path d="M224,144v64a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V144a8,8,0,0,1,16,0v56H208V144a8,8,0,0,1,16,0Zm-101.66,5.66a8,8,0,0,0,11.32,0l40-40A8,8,0,0,0,168,96H136V32a8,8,0,0,0-16,0V96H88a8,8,0,0,0-5.66,13.66Z"></path></svg>
              </span>
        </div>
        <strong class="font-1-5">&#8358;{{ number_format($rejected_deposits,2) }}</strong>
       
    </div>
    </section>
@endsection
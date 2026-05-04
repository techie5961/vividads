@extends('layout.users.app')
@section('title')
    Referrals
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="desc">My Downlines</strong>
        <span>View a list of your downlines and the earnings</span>
        @if ($referrals->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'data' => $referrals
            ])
        @else
            @foreach ($referrals as $data)
                <div style="border:1px solid var(--rgt-005)" class="w-full g-10 column p-20 br-primary bg-light">
                    <div class="row w-full g-10 align-center space-between">
                       {{-- profile photo --}}
                        @isset($data->photo)
                       
                            <div style="box-shadow: 0 0 10px var(--primary-02);" class="w-50 p-5 h-50 no-shrink circle">
                                <img style="pointer-events:none;" src="{{ asset('photos/users/'.$data->photo.'') }}" alt="Profile photo" class="w-full h-full circle">
                            </div>
                            @else 
                            <div class="w-50 bg-primary primary-text column align-center justify-center uppercase p-5 h-50 no-shrink circle">
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>

                            </div>
                        @endisset

                        <div class="column m-right-auto g-5">
                            <strong class="font-1">{{ ucfirst($data->name) }}</strong>
                            <small>Joined {{ $data->frame }}</small>
                        </div>
                        <strong class="desc c-green">+{{ $currency }}{{ number_format($data->earned,2) }}</strong>
                    </div>
                </div>
            @endforeach
            @if ($referrals->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $referrals
                ])
            @endif
        @endif
    </section>
@endsection
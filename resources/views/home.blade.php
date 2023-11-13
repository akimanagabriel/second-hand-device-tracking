@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{ Str::ucfirst(Auth::user()->firstname) }}
                        {{ Str::ucfirst(Auth::user()->lastname) }}</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have
                        <a href="/notifications">
                            @if (count(Auth::user()->unReadNotifications))
                               <span class="text-primary">{{ count(Auth::user()->unReadNotifications) }} unread
                                Notifications!</span> 
                            @endif
                            
                        </a>
                    </h6>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img alt="people" src="images/dashboard/people.svg">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">My Devices</p>
                            <p class="fs-30 mb-2">{{ $devices }}</p>
                            <p>Registered</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Users</p>
                            <p class="fs-30 mb-2">{{ $users }}</p>
                            <p>registered</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Transfers</p>
                            <p class="fs-30 mb-2">{{ $transfers }}</p>
                            {{-- <p>since 3 days ago</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Notifications</p>
                            <p class="fs-30 mb-2">{{ $notifications }}</p>
                            <p>Sent to the users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

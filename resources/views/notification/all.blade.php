@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
    <div class="col-lg-12  bg-white mb-4 rounded stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title">Notifications</h4>
                        <p class="card-description">User daily logs</p>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('readAllNotification') }}">Mark all as read</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-item">


        <div class="preview-list">

            @foreach (Auth::user()->notifications->take(10) as $notification)
                <div class="preview-item px-5 py-4 rounded-lg">
                    <div class="preview-thumbnail">
                        @if ($notification->type == 'App\Notifications\RegisterNotification')
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-desktop-mac mx-0"></i>
                            </div>
                        @else
                            <div class="preview-icon bg-secondary">
                                <i class="mdi mdi-repeat mx-0"></i>
                            </div>
                        @endif
                    </div>

                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-bold mb-0 ">
                            @if ($notification->type == 'App\Notifications\RegisterNotification')
                                New Device
                            @else
                                Transfer
                            @endif
                        </h6>
                        <p class="font-weight-light small-text mb-2 text-muted">
                            {{ $notification->created_at->diffForHumans() }}
                        </p>
                        <div>
                            <span style="color: rgba(0, 0, 0, 0.649)">
                                @foreach ($notification->data as $message)
                                    {!! $message !!}
                                @endforeach
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>


@endsection

@extends('layouts.app')

@php
    use App\Models\User;
@endphp

@section('content')
    @if (count($devices))
        <h4>{{ count($devices) }} Results found</h4>

        <div class="row">
            @foreach ($devices as $device)
                @php
                    $owner = User::find($device->user_id);
                @endphp

                <div class="col-md-4 mb-3">
                    <form action="{{ route('showSingleTransfer', $device->id) }}" id="OpenSingleDevice-{{ $device->id }}"
                        method="get"></form>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="m-0">{{ $device->brand }} {{ $device->name }} - ({{ $device->sn }})</h5>
                            <small class="text-muted">{{ $device->created_at->diffForHumans() }}</small>
                            <h5 class="mt-2 text-info fw-bold">Device owner details</h5>
                            <p class="d-flex align-items-center gap-2">
                                <i class="mdi mdi-account-outline menu-icon"></i> &nbsp;&nbsp;
                                <span class="menu-title">{{ $owner->firstname }} {{ $owner->lastname }}</span>
                            </p>
                            <p class="d-flex align-items-center gap-2">
                                <i class="mdi mdi-account-outline menu-icon"></i> &nbsp;&nbsp;
                                <span class="menu-title">{{ $owner->nid }}</span>
                            </p>
                            <p class="d-flex align-items-center gap-2">
                                <i class="mdi mdi-phone-outline menu-icon"></i> &nbsp;&nbsp;
                                <span class="menu-title">{{ $owner->phone }}</span>
                            </p>
                            <p class="d-flex align-items-center gap-2">
                                <i class="mdi mdi-email-outline menu-icon"></i> &nbsp;&nbsp;
                                <span class="menu-title">{{ $owner->email }}</span>
                            </p>
                            <p class="d-flex align-items-center gap-2">
                                <button class="btn btn-primary"
                                    onclick="document.querySelector('#OpenSingleDevice-{{ $device->id }}').submit();">
                                    View Transfers
                                </button>
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            No result found, Please try again with another serialnumber.
        </div>
    @endif
@endsection

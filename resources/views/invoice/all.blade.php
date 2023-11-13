@extends('layouts.app')

@section('title', 'my devices')

@section('content')
    @php
        use App\Models\User;
    @endphp
    <div class="col-lg-12  bg-white mb-4 rounded stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title">Invoices</h4>
                        <p class="card-description">list of all pending invoices</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Owner</th>
                                <th>Device name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingInvoices as $device)
                                @php
                                    $owner = User::find($device->user_id);
                                @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <a href="/invoices/{{ $device->invoice }}" target="_blank">
                                            <img alt="" src="/invoices/{{ $device->invoice }}">
                                            {{ $device->invoice }}
                                        </a>
                                    </td>
                                    <td>{{ $owner->firstname }} {{ $owner->lastname }}</td>
                                    <td>{{ $device->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('invoice.approve', $device->id) }}">Approve</a>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

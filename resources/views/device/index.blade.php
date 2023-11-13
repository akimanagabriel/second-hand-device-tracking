@extends('layouts.app')

@section('title', 'my devices')

@section('content')
    <div class="col-lg-12  bg-white mb-4 rounded stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title">My device page</h4>
                        <p class="card-description">Listing of my devices</p>
                    </div>
                    <div>
                        <button class="btn btn-primary" data-target="#newDevice" data-toggle="modal">Add Device</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($devices) == 0)
        <div class="alert alert-info mx-3">No device registered yet!</div>
    @else
        <div class="row">
            @foreach ($devices as $device)
                <div class="col-md-4 my-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="card-title mb-0">{{ $device->brand }} - {{ $device->name }}</h4>
                                    <small class="text-secondary">{{ $device->created_at->diffForHumans() }}</small>
                                    <div class="mt-2">
                                        <p class="card-description my-2 p-0">
                                            {!! $device->status
                                                ? "<span class='p-1 px-3 rounded bg-success text-white'>ACTIVE</span>"
                                                : "<span class='p-1  px-3 rounded bg-danger text-white'>INACTIVE</span>" !!}
                                        </p>
                                        <p class="card-description m-0 p-0"><strong>Brand:</strong> {{ $device->brand }}</p>
                                        <p class="card-description m-0 p-0"><strong>S.N:</strong> {{ $device->sn }}</p>
                                        <p class="card-description m-0 p-0"><strong>Category:</strong>
                                            {{ $device->category }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="dropdown">
                                        <button {{ !$device->status ? 'disabled' : null }} aria-expanded="false"
                                            aria-haspopup="true"
                                            class="btn btn-primary btn-sm d-flex align-items-center gap-2"
                                            data-target="#transferDevice{{ $device->user_id }}" data-toggle="modal"
                                            type="button">
                                            <i class="mdi mdi-repeat"></i> Transfer
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- {{ Auth::user()->notifications }} --}}
                {{-- transfer modal --}}
                <form action="{{ route('transfer.store') }}" method="post">
                    @csrf
                    <div class="modal fade" id="transferDevice{{ $device->user_id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Transfer of ownership</h4>
                                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p class="text-secondary">
                                        <strong>Warning</strong>
                                        if you make a transfer of this device a system will no longer locate device to you.
                                    </p>

                                    <div class="form-group mt-3">
                                        <label for="">Receiver</label>
                                        <select class="form-control" id="exampleInputUsername1" name="receiver">
                                            <option disabled selected value="">-- Choose a receiver --</option>
                                            @foreach ($persons as $person)
                                                @if ($person->id != Auth::user()->id)
                                                    <option value="{{ $person->id }}">
                                                        {{ $person->firstname }}
                                                        {{ $person->lastname }}
                                                        ({{ $person->email }})
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="">Comment</label>
                                        <textarea class="form-control" id="exampleInputUsername1" name="comment" placeholder="comment" type="text"
                                            value="{{ old('comment') }}"></textarea>
                                    </div>
                                    {{-- other hidden fields { device id } --}}
                                    <input name="device" type="hidden" value="{{ $device->id }}">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Discard</button>
                                    <button class="btn btn-primary" type="submit">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach

        </div>
    @endif


    {{-- new device  modal --}}
    <form action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal" id="newDevice">
            <div class="modal-dialog modal-dialog-sm">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Create a new device</h4>
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-group">
                            <input class="form-control" id="exampleInputUsername1" name="name" placeholder="device name"
                                type="text" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="exampleInputUsername1" name="sn"
                                placeholder="Serial number" type="text" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="exampleInputUsername1" name="brand" placeholder="Brand"
                                type="text" value="{{ old('brand') }}">
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="exampleInputUsername1" name="category">
                                <option disabled selected value="">-- choose category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ Str::ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="exampleInputUsername1" name="invoiceFile" placeholder="Brand"
                                type="file" value="{{ old('invoiceFile') }}">
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Discard</button>
                        <button class="btn btn-primary" type="submit">Save Device</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

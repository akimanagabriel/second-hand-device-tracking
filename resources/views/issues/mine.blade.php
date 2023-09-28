@extends('layouts.app')

@section('title', 'Categories')


@php
    use App\Models\Issue;
    use App\Models\Device;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Issues</h4>
                        <p class="card-description">Listing of issues raised by users</p>
                    </div>
                    <div>
                        <button class="btn btn-primary" data-target="#newUserModal" data-toggle="modal">Raise Issue</button>
                    </div>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Device name</th>
                                <th>Device brand</th>
                                <th>serial number</th>
                                <th>Issue</th>
                                {{-- <th>Status</th> --}}
                                <th>Date recorded</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($issues as $issue)
                                @php
                                    $device = Device::find($issue->device);
                                @endphp
                                <tr>
                                    <td>{{ str_pad($loop->index + 1, 2, 0, STR_PAD_LEFT) }}</td>
                                    <td>{{ $device->name }}</td>
                                    <td>{{ $device->brand }}</td>
                                    <td>{{ strtoupper($device->sn) }}</td>
                                    <td>{{ $issue->issue }}</td>
                                    {{-- <td>{!! $issue->status?"<span class='text-success'>Resolved</span>":"<span class='text-danger'>Pending</span>" !!}</td> --}}
                                    <td>{{ $issue->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end" style="margin-right: 20px">
                {{ $issues->links() }}
            </div>
        </div>
    </div>


    {{-- new category  modal --}}
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf
        <div class="modal" id="newUserModal">
            <div class="modal-dialog modal-dialog-sm">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Create a new category</h4>
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Select a device</label>
                            <select class="form-control" id="exampleInputUsername1" name="device">
                                <option disabled selected value="">-- Select device --</option>
                                @foreach ($devices as $device)
                                    <option value="{{ $device->id }}">{{ $device->name }} - {{ $device->brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Select an issue type</label>
                            <select class="form-control" id="exampleInputUsername1" name="issue">
                                <option disabled selected value="">-- Select issue type --</option>
                                <option value="Stolen">Stolen</option>
                                <option value="Loosen">Loosen</option>
                            </select>
                        </div>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Discard</button>
                        <button class="btn btn-primary" type="submit">Commit</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

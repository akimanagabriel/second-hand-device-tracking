@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Device classifications</h4>
                        <p class="card-description">Listing and operations to the device classifications</p>
                    </div>
                    <div>
                        <button class="btn btn-primary" data-target="#newUserModal" data-toggle="modal">New category</button>
                    </div>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($users as $user)
                                <tr>
                                    <td>{{ str_pad($loop->index + 1, 2, 0, STR_PAD_LEFT) }}</td>
                                    <td>{{ Str::ucfirst($user->firstname) }}</td>
                                    <td>{{ Str::ucfirst($user->lastname) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end" style="margin-right: 20px">
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>


    {{-- new user modal --}}
    <form action="{{ route('users.add') }}" method="POST">
        @csrf
        <div class="modal" id="newUserModal">
            <div class="modal-dialog modal-dialog-sm">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Create a new user</h4>
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-group">
                            <input class="form-control" id="exampleInputUsername1" name="firstname" placeholder="Firstname"
                                type="text" value="{{ old('firstname') }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="exampleInputEmail1" name="lastname" placeholder="Lastname"
                                type="text" value="{{ old('lastname') }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="exampleInputPassword1" name="email" placeholder="Email"
                                type="text" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="exampleInputPassword1" name="phone"
                                placeholder="Telephone number" type="text" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="exampleInputPassword1" name="password" placeholder="Password"
                                type="password" value="{{ old('password') }}">
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="exampleInputPassword1" name="type" placeholder="Password"
                                value="{{ old('type') }}">
                                <option disabled selected value="">--Select account type--</option>
                                <option value="client">Client</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Discard</button>
                        <button class="btn btn-primary" type="submit">Save user</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

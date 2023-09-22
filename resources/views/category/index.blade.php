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
                    @if (count($categories) == 0)
                        <div class="alert alert-info">No category registered yet</div>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td>{{ str_pad($loop->index + 1, 2, 0, STR_PAD_LEFT) }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger"
                                                data-target="#deleteCategory-{{ $cat->id }}"
                                                data-toggle="modal">Delete</button>

                                            {{-- delete  modal --}}
                                            <form action="{{ route('category.destroy', $cat->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="modal" id="deleteCategory-{{ $cat->id }}">
                                                    <div class="modal-dialog modal-dialog-sm">
                                                        <div class="modal-content">
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this category?</p>
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div class="mb-4 mx-5 d-flex justify-content-end">
                                                                <button class="btn btn-secondary mx-3" data-dismiss="modal"
                                                                    type="button">No</button>
                                                                <button class="btn btn-primary" type="submit">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-end" style="margin-right: 20px">
                {{ $categories->links() }}
            </div>
        </div>
    </div>


    {{-- new category  modal --}}
    <form action="{{ route('category.store') }}" method="POST">
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
                            <input class="form-control" id="exampleInputUsername1" name="name"
                                placeholder="Category name" type="text" value="{{ old('name') }}">
                        </div>


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Discard</button>
                        <button class="btn btn-primary" type="submit">Save category</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

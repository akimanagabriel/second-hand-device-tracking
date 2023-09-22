@extends('layouts.empty')

@section('title', 'Login')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form action="{{ route('login') }}" class="pt-3" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="exampleInputEmail1" name="email"
                                        placeholder="Email" type="text" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="exampleInputPassword1" name="password"
                                        placeholder="Password" type="password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input class="form-check-input" type="checkbox">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a class="auth-link text-black" href="#">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a class="text-primary" href="{{ route('register') }}">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
@endsection

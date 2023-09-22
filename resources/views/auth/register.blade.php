@extends('layouts.empty')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            {{-- @include('partials.logo') --}}
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form action="{{ route("createUser") }}" class="pt-3" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input value="{{ old("firstname") }}" class="form-control form-control-lg" id="exampleInputUsername1" name="firstname"
                                        placeholder="Firstname" type="text">
                                </div>
                                <div class="form-group">
                                    <input value="{{ old("lastname") }}"  class="form-control form-control-lg" id="exampleInputEmail1" name="lastname"
                                        placeholder="Lastname" type="text">
                                </div>
                                <div class="form-group">
                                    <input  value="{{ old("email") }}"  class="form-control form-control-lg" id="exampleInputPassword1" name="email"
                                        placeholder="Email" type="text">
                                </div>
                                <div class="form-group">
                                    <input  value="{{ old("phone") }}"  class="form-control form-control-lg" id="exampleInputPassword1" name="phone"
                                        placeholder="Telephone number" type="text">
                                </div>
                                <div class="form-group">
                                    <input  value="{{ old("password") }}"  class="form-control form-control-lg" id="exampleInputPassword1" name="password"
                                        placeholder="Password" type="password">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input class="form-check-input" type="checkbox">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a class="text-primary" href="{{ route('login') }}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

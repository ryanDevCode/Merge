@extends('layouts.custom.app')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div class="login-main">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <form class="needs-validation theme-form" novalidate action="{{ route('login') }}" method="POST">
                                @csrf

                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>
                                <div class="row g-3 mb-3">
                                    <div class="w-100 ">
                                        <label for="validationCustomUsername"   class="form-label">Email or Username</label>
                                        <div class="input-group has-validation ">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input name="username_or_email" type="text" class="form-control"
                                                value="{{ old('username_or_email') }}" aria-describedby="inputGroupPrepend"
                                                required>
                                            <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please choose a username. </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="w-100 ">
                                        <label "   class="form-label">Password</label>
                                                <input name="password" type="password" class="form-control"
                                                    required>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please enter your password! </div>
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6 ">
                                                <div class="checkbox p-0">
                                                    <input id="checkbox1" type="checkbox" name="remember">
                                                    <label class="text-muted" for="checkbox1">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <a class="link" href="{{ route('reset') }}">Forgot password?</a>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block w-100 " type="submit">Sign in</button>
                                        <p class="mt-4 mb-0">Don't have account?<a class="ms-2"
                                                href="{{ route('register') }}">Create Account</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
                var session_layout = '{{ session()->get('layout') }}';
            </script>
@endsection

@section('script')
            <!-- Validation JS -->
            <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
@endsection

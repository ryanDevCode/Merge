@extends('layouts.custom.app')

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
                            <form class="needs-validation theme-form" novalidate action="{{ route('reset') }}" method="POST">
                                <h4>Reset Password</h4>
                                <p>Enter your name and email address to reset your password</p>
                                @csrf
                                <div class="row g-3 mb-3">
                                    <div class="col-md-12 ">
                                        <label   class="form-label">Username</label>
                                        <input name="username" type="text" class="form-control"
                                            value="{{ old('username') }}" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your username! </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label   class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text">@</span>
                                            <input name="email" type="text" class="form-control"
                                                value="{{ old('email') }}" aria-describedby="inputGroupPrepend" required>
                                            <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please enter a valid email. </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label   class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your password! </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label   class="form-label">Confirm Password</label>
                                        <input name="password_confirmation" type="password" class="form-control" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your user password! </div>
                                    </div>
                                    <div class="form-check col-md-12">
                                        <div class="checkbox p-0">
                                            <input class="form-check-input" id="invalidCheck" type="checkbox" required=""
                                                data-bs-original-title="" title="">
                                            <label class="form-check-label" for="invalidCheck">Agree to terms and
                                                conditions</label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit">Submit form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';

        var newPasswordInput = document.getElementById('newPassword');
        var confirmPasswordInput = document.getElementById('confirmPassword');
        var passwordMismatch = document.getElementById('passwordMismatch');

        function validatePasswords() {
            if (newPasswordInput.value !== confirmPasswordInput.value) {
                passwordMismatch.style.display = 'block';
            } else {
                passwordMismatch.style.display = 'none';
            }
        }

        newPasswordInput.addEventListener('input', validatePasswords);
        confirmPasswordInput.addEventListener('input', validatePasswords);
    </script>
@endsection

@section('script')
    <!-- Validation JS -->
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
@endsection

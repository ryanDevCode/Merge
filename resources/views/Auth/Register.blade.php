@extends('layouts.custom.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div class="login-main">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form class="needs-validation theme-form" novalidate action="{{ route('register') }}" method="POST">
                            <h4>Register an account</h4>
                            <p>Enter your details to register</p>
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label   class="form-label">First Name</label>
                                    <input name="first_name" type="text" class="form-control"
                                        value="{{ old('first_name') }}" required>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your first name! </div>
                                </div>
                                <div class="col-md-6">
                                    <label   class="form-label">Last Name</label>
                                    <input name="last_name" type="text" class="form-control"
                                        value="{{ old('last_name') }}" required>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your last name! </div>
                                </div>
                                <div class="col-md-6">
                                    <label   class="form-label">Role</label>
                                    <select name="role_code" class="form-select" required>
                                        <option selected disabled value="{{ old('role_code') }}">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->role_code }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please select your role! </div>
                                </div>
                                <div class="col-md-6">
                                    <label   class="form-label">Department</label>
                                    <select name="department_code" class="form-select" required>
                                        <option selected disabled value="{{ old('department_code') }}">Select Department
                                        </option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->department_code }}">
                                                {{ $department->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please select your department! </div>
                                </div>
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
                                    <div class="invalid-feedback"> Please enter same password! </div>
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
        <script type="text/javascript">
            var session_layout = '{{ session()->get('layout') }}';
        </script>
    @endsection

    @section('script')
        <!-- Validation JS -->
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    @endsection

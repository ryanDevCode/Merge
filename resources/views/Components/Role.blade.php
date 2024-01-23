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
                        <form class="needs-validation theme-form" novalidate action="{{ route('role') }}" method="POST">
                            <h4>Register an role</h4>
                            <p>Enter your role details to register</p>
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-md-12">
                                    <label   class="form-label">>Role Name</label>
                                    <input name="role_name" type="text" class="form-control"
                                        value="{{ old('role_name') }}" required>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter new role name! </div>
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
                                <button class="btn btn-primary w-100" type="submit">Submit Role</button>
                            </div>
                        </form>
                    </div>

                    <div class="login-main">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <h4>Registered Roles</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Role Code</th>
                                    <th>Role Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->role_code }}</td>
                                        <td>{{ $role->role_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

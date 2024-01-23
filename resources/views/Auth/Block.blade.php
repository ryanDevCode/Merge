@extends('layouts.custom.app')
@section('title', 'Deny Access')

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
                            <div class="text-center">
                                <i data-feather="lock" class="icon" style="width: 100px; height: 100px"></i>
                                <h2>Access Denied</h2>
                                <p>You don't have permission to access this page.</p>
                                <a href="{{ $dashboardLink }}" class="btn btn-primary">Back to Dashboard</a>
                            </div>
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
@endsection

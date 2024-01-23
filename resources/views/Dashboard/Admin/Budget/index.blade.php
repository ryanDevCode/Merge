@php
    $name = session()->get('name');
    $role = session()->get('role');
@endphp

@extends('layouts.master')

@section('profile-nav')
    <div class="media profile-media"><img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.png') }}"
            alt="">
        <div class="media-body"><span>{{ $name }}</span>
            <p class="mb-0 font-roboto">{{ strtoupper($role) }} <i class="middle fa fa-angle-down"></i></p>
        </div>
    </div>
@endsection

@section('title', 'Budget Details')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Budget Details</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Budget</li>
    <li class="breadcrumb-item active">Details</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Company Budget</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('admin.budget.create') }}" class="btn btn-primary">Add Budget</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($groupedBudgets->isEmpty())
                            <p>No budgets found.</p>
                        @else
                            @foreach ($groupedBudgets as $departmentCode => $departmentBudgets)
                                @php
                                    $department = $departments->where('department_code', $departmentCode)->first();
                                    $departmentName = $department ? $department->department_name : 'Unknown Department';
                                @endphp
                                <div class="list-group list-group-flush">
                                    <a href="{{ route('admin.budget.show', $departmentCode) }}"
                                        class="list-group-item justify-content-between d-flex align-items-center">
                                        <span class="d-flex align-items-center">
                                            <i data-feather="package"></i>
                                            <div>&nbsp;&nbsp; {{ $departmentName }}</div>
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <div>&nbsp;&nbsp;{{ $departmentBudgets->sum('budget_approvedAmount') }}
                                            </div>
                                            <i data-feather="chevron-right"></i>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
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
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection

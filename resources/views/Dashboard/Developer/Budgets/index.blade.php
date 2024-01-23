@php
    $name = session()->get('name');
    $roleName = session()->get('role');
@endphp

@extends('layouts.master')

@section('title', 'Developer Dashboard')

@section('profile-nav')
    <div class="media profile-media"><img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.png') }}"
            alt="">
        <div class="media-body"><span>{{ $name }}</span>
            <p class="mb-0 font-roboto">{{ strtoupper($roleName) }} <i class="middle fa fa-angle-down"></i></p>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Budget Dashboard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Developer</li>
    <li class="breadcrumb-item">Budget</li>
    <li class="breadcrumb-item active">Details</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <!-- Section 1 -->
            <div class="card">
                <div class="card-header">
                    <h5>Company Budget</h5>
                    <div class="col-md-6">
                        <div class="col-md-6 text-end">
                            <a href="{{ route('budget.create') }}" class="btn btn-primary">Add Budget</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($budgets->isEmpty())
                        <p>No budgets found.</p>
                    @else
                        @php
                            $groupedBudgets = $budgets->groupBy('department_code');
                        @endphp

                        @foreach ($groupedBudgets as $department => $departmentBudgets)
                            <div class="list-group list-group-flush">
                                <a href="{{ route('developer.budgets.show', $department) }}"
                                    class="list-group-item justify-content-between d-flex align-items-center">
                                    <span class="d-flex align-items-center">
                                        <i data-feather="package"></i>
                                        <div>&nbsp;&nbsp; {{ $department }}</div>
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <div>&nbsp;&nbsp;{{ $departmentBudgets->sum('budget_approvedAmount') }}</div>
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

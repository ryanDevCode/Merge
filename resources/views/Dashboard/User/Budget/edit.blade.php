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

@section('title', 'Edit Budget')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Edit Budget</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">Budget</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="needs-validation" novalidate=""
                    action="{{ route('user.budget.update', ['budget' => $budgets->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="card">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Budget Info -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Department Budget</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"> Plan Name</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" data-language="en" name="budget_name"
                                            value="{{ $budgets->budget_name }}" data-bs-original-title="" title=""
                                            required="" />
                                        <div class="valid-feedback">Done!</div>
                                        <div class="invalid-feedback">Please provide a valid plan name.</div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label"> Department</label>
                                    <select class="form-select" name="budget_department" required="">
                                        @foreach ($departments as $department)
                                            @if ($department->department_code == $budgets->budget_department)
                                                <option value="{{ $department->department_code }}" selected>
                                                    {{ $department->department_name }}</option>
                                            @else
                                                <option value="{{ $department->department_code }}">
                                                    {{ $department->department_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please select a valid department.</div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label"> Amount</label>
                                    <input class="form-control" type="number" name="budget_amount"
                                        value="{{ $budgets->budget_amount }}" required="" data-bs-original-title=""
                                        title="">
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid amount.</div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label"> Category</label>
                                    <select class="form-select" name="budget_category" required="">
                                        @foreach ($categories as $category)
                                            @if ($category->category_code == $budgets->budget_category)
                                                <option value="{{ $category->category_code }}" selected>
                                                    {{ $category->category_name }}</option>
                                            @else
                                                <option value="{{ $category->category_code }}">
                                                    {{ $category->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please select a valid category.</div>
                                </div>

                                <div class="date-picker col-md-4 mb-3">
                                    <label class="form-label"> Start Date</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits" type="text" data-language="en"
                                            data-bs-original-title="" title="" name="budget_startDate"
                                            value="{{ $budgets->budget_startDate }}" required="" />
                                        <div class="valid-feedback">Done!</div>
                                        <div class="invalid-feedback">Please provide a valid start date.</div>
                                    </div>
                                </div>

                                <div class="date-picker col-md-4 mb-3">
                                    <label class="form-label"> End Date</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits" type="text" data-language="en"
                                            data-bs-original-title="" title="" name="budget_endDate"
                                            value="{{ $budgets->budget_endDate }}" required="" />
                                        <div class="valid-feedback">Done!</div>
                                        <div class="invalid-feedback">Please provide a valid start date.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="mb-3">
                                    <label class="form-label"> Description</label>
                                    <textarea class="form-control" rows="3" spellcheck="false" name="budget_description"
                                        placeholder="Leave a description here..." required="" data-bs-original-title="" title="">{{ $budgets->budget_description }}</textarea>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid description.</div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="form-check col-md-6 mb-3">
                                    <div class="checkbox p-0">
                                        <input class="form-check-input" id="invalidCheck" type="checkbox" required=""
                                            data-bs-original-title="" title="">
                                        <label class="form-check-label" for="invalidCheck">Agree to terms and
                                            conditions</label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3 text-end">
                                    <button class="btn btn-primary w-50" type="submit" data-bs-original-title=""
                                        title="">Update form</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>

    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection

@extends('layouts.master')

@section('title', 'Create Budget')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Create Budget</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Budget</li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="needs-validation" novalidate=""
                    action="{{ route('dashboard.developer.budgets.store', ['bp_department' => $bp_department]) }}"
                    method="post">
                    @csrf
                    <input type="hidden" name="bp_department" value="{{ $bp_department }}">
                    <!-- Section 1 -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Company Budget</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Plan Name Input -->
                                <div class="col-md-6 mb-3">
                                    <label   class="form-label"> ame</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" data-language="en" name="bp_name"
                                            data-bs-original-title="" title="" required="" />
                                        <div class="valid-feedback">Done!</div>
                                        <div class="invalid-feedback">Please provide a valid plan name.</div>
                                    </div>
                                </div>
                                <!-- Department Dropdown -->
                                <div class="col-md-3 mb-3">
                                    <label   class="form-label"> ment</label>
                                    <select class="form-select"    name="bp_department" required="">
                                        <option value="" selected disabled>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->department_code }}">
                                                {{ $department->department_name }}</option>
                                        @endforeach
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please select a valid department.</div>
                                </div>
                                <!-- Amount Input -->
                                <div class="col-md-3 mb-3">
                                    <label   class="form-label"> </label>
                                    <input class="form-control"   type="number" name="bp_amount"
                                        required="" data-bs-original-title="" title="">
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid amount.</div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <!-- Category Dropdown -->
                                <div class="col-md-4 mb-3">
                                    <label   class="form-label"> ry</label>
                                    <select class="form-select"    name="bp_category" required="">
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please select a valid category.</div>
                                </div>
                                <!-- Start Date Input -->
                                <div class="date-picker col-md-4 mb-3">
                                    <label   class="form-label"> Date</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits" type="text" data-language="en"
                                            data-bs-original-title="" title="" name="bp_startDate" required="" />
                                        <div class="valid-feedback">Done!</div>
                                        <div class="invalid-feedback">Please provide a valid start date.</div>
                                    </div>
                                </div>
                                <!-- End Date Input -->
                                <div class="date-picker col-md-4 mb-3">
                                    <label   class="form-label"> te</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits" type="text" data-language="en"
                                            data-bs-original-title="" title="" name="bp_endDate" required="" />
                                        <div class="valid-feedback">Done!</div>
                                        <div class="invalid-feedback">Please provide a valid start date.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <!-- Description Textarea -->
                                <div class="mb-3">
                                    <label   class="form-label"> ption</label>
                                    <textarea class="form-control"   rows="3" spellcheck="false"
                                        name="bp_description" placeholder="Leave a description here..." required="" data-bs-original-title=""
                                        title=""></textarea>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid description.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2 (Budget Status) -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Budget Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Actual Spending Input -->
                                <div class="col-md-6 mb-3">
                                    <label   class="form-label">  Spending</label>
                                    <input class="form-control"   type="number"
                                        name="bp_actualSpending" required="" data-bs-original-title=""
                                        title="">
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid amount.</div>
                                </div>
                                <!-- Variance Input -->
                                <div class="col-md-6 mb-3">
                                    <label   class="form-label"> ce</label>
                                    <input class="form-control"   type="number"
                                        name="bp_variance" required="" data-bs-original-title="" title="">
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid amount.</div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <!-- Reason Textarea -->
                                <div class="mb-3">
                                    <label   class="form-label"> </label>
                                    <textarea class="form-control"   rows="3" spellcheck="false"
                                        name="bp_varianceReason" placeholder="Leave a reason here..." required="" data-bs-original-title=""
                                        title=""></textarea>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid reason.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3 (Approval Status) -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Approval Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Approval Status Dropdown -->
                                <div class="col-md-6 mb-3">
                                    <label   class="form-label"> al Status</label>
                                    <select class="form-select"    name="bp_approvalStatus"
                                        required="">
                                        <option value="" selected disabled>Select Approval Status</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please select a valid approval status.</div>
                                </div>
                                <!-- Approver Name Dropdown -->
                                <div class="col-md-6 mb-3">
                                    <label   class="form-label"> er Name</label>
                                    <select class="form-select"    name="bp_approverName"
                                        required="">
                                        <option value="" selected disabled>Select Approver Name</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->username }}">
                                                {{ $user ->first_name. ' '. $user ->last_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please select a valid approver name.</div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <!-- Amount Input -->
                                <div class="col-md-6 mb-3">
                                    <label   class="form-label"> </label>
                                    <input class="form-control"   type="number"
                                        name="bp_approvedAmount" required="" data-bs-original-title=""
                                        title="">
                                    <div class="valid-feedback">Done!</div>
                                    <div class="invalid-feedback">Please provide a valid amount.</div>
                                </div>
                                <!-- Approval Date Input -->
                                <div class="date-picker col-md-6 mb-3">
                                    <label   class="form-label"> val Date</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits" type="text"
                                            data-language="en" data-bs-original-title="" title=""
                                            name="bp_approvedDate" required="" />
                                        <div class="valid-feedback">Done!</div>
                                        <div class="invalid-feedback">Please provide a valid approval date.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <!-- Notes Textarea -->
                                <div class="mb-3">
                                    <label   class="form-label"> /label>
                                    <textarea class="form-control"   rows="3" spellcheck="false"
                                        placeholder="Leave a note here..." name="bp_notes" data-bs-original-title="" title=""></textarea>
                                    <div class="valid-feedback">Done!</div>
                                    {{-- <div class="invalid-feedback">Please provide a valid notes.</div> --}}
                                </div>
                            </div>
                            <div class="row g-3">
                                <!-- Agreement Checkbox -->
                                <div class="form-check col-md-6 mb-3">
                                    <div class="checkbox p-0">
                                        <input class="form-check-input" id="invalidCheck" type="checkbox" required=""
                                            data-bs-original-title="" title="">
                                        <label class="form-check-label" for="invalidCheck">Agree to terms and
                                            conditions</label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="col-md-6 mb-3 text-end">
                                    <button class="btn btn-primary w-50" type="submit" data-bs-original-title=""
                                        title="">Submit form</button>
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
    <!-- Validation JS -->
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
@endsection

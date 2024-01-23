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

@section('title', 'Budget')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">

@endsection

@section('style')
    <style>
        th.sortable {
            cursor: pointer;
        }

        th.sortable:hover {
            background-color: #f2f2f2;
        }

        th.sortable::after {
            content: '\25B4';
            color: #000;

        }

        th.sorted-asc::after {
            content: '\25BE';
            color: #000;
        }

        th.sorted-desc::after {
            content: '\25B4';
            color: #000;
        }

        .table-container {
            height: 500px;
            /* Adjust the height as needed */
            overflow-y: scroll;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h3>Company Budget</h3>
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
                @if (Session::has('success'))
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3 class="mb-3">Rkive Budget Record</h3><span>Rkive Administrative Solution is a company that
                            provides efficient and reliable administrative services to businesses of all sizes. We offer a
                            range of solutions, such as bookkeeping, payroll, invoicing, data entry, and more. Our goal is
                            to help our clients save time and money by outsourcing their administrative tasks to us. We have
                            a team of experienced and qualified professionals who can handle any project with accuracy and
                            professionalism. Whether you need a one-time service or a long-term partnership, we are here to
                            serve you.</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="{{ route('admin.budget.create') }}" class="btn btn-primary">Add Budget</a>
                            </div>
                            <div class="col-md-6 text-end">
                                <form action="{{ route('admin.budget.search', ['department_code' => $department_code]) }}"
                                    method="get" class="d-flex justify-content-end mb-">
                                    @csrf
                                    <label for="search" class="visually-hidden">Search</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control w-25" name="search" placeholder="Search">
                                        <button type="submit" class="btn btn-primary"><i class="icon-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <div class="table-container">
                                <table class="table">
                                    <thead class="text-center">
                                        <tr>
                                            <th colspan="7">
                                                <b>Plan</b>
                                            </th>

                                            <th colspan="5">
                                                <b>Approvals</b>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="sortable">ID</th>
                                            <th class="sortable">Name</th>
                                            <th class="sortable">Amount</th>
                                            <th class="sortable">Description</th>
                                            <th class="sortable">Category</th>
                                            <th class="sortable">Start</th>
                                            <th class="sortable">End</th>

                                            <th class="sortable">Status</th>
                                            <th class="sortable">Approver</th>
                                            <th class="sortable">Date</th>
                                            <th class="sortable">Amount</th>
                                            <th class="sortable">Notes</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($error))
                                            <tr>
                                                <td colspan="18" class=" text-center">
                                                    {{ $error }}
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($budgets as $bdgt)
                                                <tr class="text-center">
                                                    <td>{{ $bdgt->id }}</td>
                                                    <td>{{ $bdgt->budget_name }}</td>
                                                    <td>{{ $bdgt->budget_amount }}</td>
                                                    <td>{{ $bdgt->budget_description }}</td>
                                                    <td>
                                                        @foreach ($categories as $category)
                                                            @if ($category->category_code == $bdgt->budget_category)
                                                                {{ $category->category_name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $bdgt->budget_startDate }}</td>
                                                    <td>{{ $bdgt->budget_endDate }}</td>
                                                    <td>
                                                        @foreach ($statuses as $status)
                                                            @if ($status->status_code == $bdgt->budget_status)
                                                                {{ $status->status_name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($users as $user)
                                                            @if ($user->username == $bdgt->budget_approvedBy)
                                                                {{ $user->first_name . ' ' . $user->last_name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $bdgt->budget_approvedDate }}</td>
                                                    <td>{{ $bdgt->budget_approvedAmount }}</td>
                                                    <td>{{ $bdgt->budget_notes }}</td>
                                                    <td>
                                                        <form
                                                            action="{{ route('admin.budget.edit', ['budget' => $bdgt->id]) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class=" btn btn-warning btn-sm "><i
                                                                    class="icon-pencil-alt"></i></button>
                                                        </form>

                                                        <form action="{{ route('admin.budget.destroy', $bdgt->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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
    {{-- Column sorting --}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const getCellValue = (row, index) => row.children[index].innerText || row.children[index].textContent;

            const comparer = (index, asc) => (a, b) => {
                const valA = getCellValue(asc ? a : b, index);
                const valB = getCellValue(asc ? b : a, index);
                return isNaN(valA) || isNaN(valB) ? valA.localeCompare(valB) : valA - valB;
            };

            document.querySelectorAll('th.sortable').forEach(headerCell => {
                headerCell.addEventListener('click', () => {
                    const table = headerCell.closest('table');
                    const thIndex = Array.prototype.indexOf.call(headerCell.parentNode.children,
                        headerCell);
                    const isAsc = headerCell.classList.contains('sorted-asc');
                    const isDesc = headerCell.classList.contains('sorted-desc');
                    const direction = isAsc ? 'desc' : 'asc';

                    table.querySelectorAll('th').forEach(th => th.classList.remove('sorted-asc',
                        'sorted-desc'));
                    headerCell.classList.toggle(`sorted-${direction}`);

                    Array.from(table.querySelectorAll('tbody tr'))
                        .sort(comparer(thIndex, isAsc))
                        .forEach(tr => table.querySelector('tbody').appendChild(tr));
                });
            });
        });
    </script>
@endsection

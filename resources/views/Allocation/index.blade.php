@extends('layouts.master')

@section('title', 'Cost Allocation')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Echart css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/echart.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Cost Allocation</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Allocation</li>
    <li class="breadcrumb-item active">Cost</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <!-- Section 1 -->
                <div class="card">
                    <div class="card-header">
                        <h5>Company Budget</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-9">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <select class="form-select" id="chartType" onchange="changeChart()">
                                            <option value="pie">Pie Chart</option>
                                            <option value="line">Line Chart</option>
                                            <option value="bar">Bar Chart</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary w-100" type="submit" data-bs-original-title=""
                                            title="">History</button>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <!-- Your HTML container for the chart -->
                                        <div id="area-spaline" style="display: block">
                                            <h1>1</h1>
                                        </div>
                                        <div id="stacked-column" style="display: block">
                                            <h1>2</h1>
                                        </div>
                                        <div id="gradient-donut" style="display: block">
                                            <h1>3</h1>
                                        </div>

                                        <!-- Your JavaScript code -->


                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="2">
                                                    <h2>Summary</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th scope="col">Department</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($groupedBudgets->isEmpty())
                                                <p>No budgets found.</p>
                                            @else
                                                @foreach ($groupedBudgets as $departmentCode => $departmentBudgets)
                                                    @php
                                                        $department = $departments->where('department_code', $departmentCode)->first();
                                                        $departmentName = $department ? $department->department_name : 'Unknown Department';
                                                    @endphp

                                                    <tr>
                                                        <td>{{ $departmentName }}</td>
                                                        <td>{{ $departmentBudgets->sum('budget_approvedAmount') }}</td>
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

                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
                    data-bs-original-title="" title="">Vertically centered</button>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Modal title</h5>
                                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                              </div>
                              <div class="modal-body">
                                 <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                              </div>
                              <div class="modal-footer">
                                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
                                 <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';


        function changeChart() {
            var select = document.getElementById("chartType");

            if (select.value == "line") {
                document.getElementById("area-spaline").style.display = "block";
                document.getElementById("stacked-column").style.display = "none";
                document.getElementById("gradient-donut").style.display = "none";
            } else if (select.value == "bar") {
                document.getElementById("area-spaline").style.display = "none";
                document.getElementById("stacked-column").style.display = "block";
                document.getElementById("gradient-donut").style.display = "none";
            } else if (select.value == "pie") {
                document.getElementById("area-spaline").style.display = "none";
                document.getElementById("stacked-column").style.display = "none";
                document.getElementById("gradient-donut").style.display = "block";
            }
        }

        // function refnumber() {
        //     var select = document.getElementById("payment");

        //     if (select.value == "Gcash") {
        //         document.getElementById("rf").style.display = "block";
        //         document.getElementById("rfs").style.display = "block";
        //     } else {
        //         document.getElementById("rf").style.display = "none";
        //         document.getElementById("rfs").style.display = "none";

        //     }
        // }
    </script>


@endsection

@section('script')
    <!-- Echart JS-->

    <!-- Apex Chart JS-->
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script>


    <script>
        // Fetch data from the Laravel API
        fetch('/api/roses') // Use the route you defined
            .then(response => response.json())
            .then(data => {
                var chartData = data.map(item => item.value);

                var options = {
                    series: chartData,
                    chart: {
                        width: 380,
                        type: 'polarArea'
                    },
                    labels: data.map(item => item.name),
                    fill: {
                        opacity: 1
                    },
                    stroke: {
                        width: 1,
                        colors: undefined
                    },
                    yaxis: {
                        show: false
                    },
                    legend: {
                        position: 'bottom'
                    },
                    plotOptions: {
                        polarArea: {
                            rings: {
                                strokeWidth: 0
                            },
                            spokes: {
                                strokeWidth: 0
                            },
                        }
                    },
                    theme: {
                        monochrome: {
                            enabled: true,
                            shadeTo: 'light',
                            shadeIntensity: 0.6
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart2"), options);
                chart.render();
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
@endsection

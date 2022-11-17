@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection
@push('script-page')
    <script>
            @if(\Auth::user()->can('show dashboard'))
        var options = {
                series: [
                    {
                        name: "{{__('Income')}}",
                        data: {!! json_encode($incExpLineChartData['income']) !!}
                    },
                    {
                        name: "{{__('Expense')}}",
                        data: {!! json_encode($incExpLineChartData['expense']) !!}
                    }
                ],
                chart: {
                    height: 350,
                    type: 'line',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#77B6EA', '#545454'],
                dataLabels: {
                    enabled: true,
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: '',
                    align: 'left'
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                markers: {
                    size: 1
                },
                xaxis: {
                    categories: {!! json_encode($incExpLineChartData['day']) !!},
                    title: {
                        text: 'Days'
                    }
                },
                yaxis: {
                    title: {
                        text: '{{__('Amount')}}'
                    },

                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                }
            };
        var chart = new ApexCharts(document.querySelector("#cash-flow"), options);
        chart.render();


        var SalesChart = {
            series: [
                {
                    name: "{{__('Income')}}",
                    data: {!! json_encode($incExpBarChartData['income']) !!}
                },
                {
                    name: "{{__('Expense')}}",
                    data: {!! json_encode($incExpBarChartData['expense']) !!}
                }
            ],
            colors: ['#77B6EA', '#545454'],
            chart: {
                type: 'bar',
                height: 430
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            dataLabels: {
                enabled: true,
                offsetX: -6,
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['#fff']
            },
            xaxis: {
                categories: {!! json_encode($incExpBarChartData['month']) !!},
            },
        };
        var sales = new ApexCharts(document.querySelector("#incExpBarChart"), SalesChart);
        sales.render();


        var incomeCategories = {
            // series: [10,20],
            series:{!! json_encode($incomeCatAmount) !!},

            chart: {
                width: '500px',
                type: 'pie',
            },
            colors: {!! json_encode($incomeCategoryColor) !!},
            labels: {!! json_encode($incomeCategory) !!},

            plotOptions: {
                pie: {
                    dataLabels: {
                        offset: -5
                    }
                }
            },
            title: {
                text: ""
            },
            dataLabels: {},
            legend: {
                display: false
            },

        };
        var incomeCategory = new ApexCharts(document.querySelector("#incomeByCategory"), incomeCategories);
        incomeCategory.render();


        var expenseCategories = {
            // series: [10,20],
            series: {!! json_encode($expenseCatAmount) !!},

            chart: {
                width: '500px',
                height: '500px',
                type: 'pie',
            },
            colors: {!! json_encode($expenseCategoryColor) !!},
            labels: {!! json_encode($expenseCategory) !!},

            plotOptions: {
                pie: {
                    dataLabels: {
                        offset: -5
                    }
                }
            },
            title: {
                text: ""
            },
            dataLabels: {},
            legend: {
                show: true
            }
        };
        var expenseCategory = new ApexCharts(document.querySelector("#expenseByCategory"), expenseCategories);
        expenseCategory.render();

        @endif
    </script>
@endpush
@section('content')

    @if(\Auth::user()->can('show dashboard'))
        @if(\Auth::user()->type=='company')
            <div class="row">
                <!-- @if($constant['taxes'] <= 0)
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            {{__('Please add constant taxes. ')}}<a href="{{route('taxes.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif -->
                @if($constant['category'] <= 0)
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            {{__('Please add constant category. ')}}<a href="{{route('product-category.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif
                @if($constant['units'] <= 0)
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            {{__('Please add constant unit. ')}}<a href="{{route('product-unit.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif

                @if($constant['bankAccount'] <= 0)
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            {{__('Please create bank account. ')}}<a href="{{route('bank-account.index')}}"><b>{{__('click here')}}</b></a>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card radius-10">
                        <div class="card-header border-bottom-0 bg-transparent">
                            <div class="d-lg-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-bold mb-2 mb-lg-0">Lorem, ipsum.</h6>
                                </div>
                                <div class="ms-lg-auto mb-2 mb-lg-0">
                                    <div class="btn-group-round">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-white">Last 1 Year</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">Last Week</a>
                                            </div>
                                            <button type="button" class="btn btn-white dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span
                                                    class="visually-hidden">Toggle
                                                    Dropdown</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card radius-10 bg-gradient-burning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="dash-assets/images/icons/appointment-book.png" width="45" alt="" />
                                <div class="ms-auto text-end">
                                    <p class="mb-0 text-white"><i class='bx bxs-arrow-from-bottom'></i> 2.69%</p>
                                    <p class="mb-0 text-white">Since Last Month</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div class="flex-grow-1">
                                    <p class="mb-1 text-white">lorem</p>
                                    <h4 class="mb-0 text-white font-weight-bold">1879</h4>
                                </div>
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card radius-10 bg-gradient-blues">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="dash-assets/images/icons/surgery.png" width="45" alt="" />
                                <div class="ms-auto text-end">
                                    <p class="mb-0 text-white"><i class='bx bxs-arrow-from-bottom'></i> 3.56%</p>
                                    <p class="mb-0 text-white">Since Last Month</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div class="flex-grow-1">
                                    <p class="mb-1 text-white">lorem</p>
                                    <h4 class="mb-0 text-white font-weight-bold">3768</h4>
                                </div>
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        
            <div class="row row-cols-1 row-cols-lg-3">
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bold">Lorem, ipsum dolor.</h6>
                                <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
                                </p>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <img src="dash-assets/images/avatars/avatar-1.png" width="45" height="45" class="rounded-circle"
                                    alt="" />
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">4.9</span>
                                    </p>
                                    <p class="font-weight-bold mb-0">Neil Wagner</p>
                                    <p class="text-secondary mb-0">Manager</p>
                                </div> <a href="#" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <img src="dash-assets/images/avatars/avatar-2.png" width="45" height="45" class="rounded-circle"
                                    alt="" />
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">3.5</span>
                                    </p>
                                    <p class="font-weight-bold mb-0">Kane Williamson</p>
                                    <p class="text-secondary mb-0">Manager</p>
                                </div> <a href="#" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <img src="dash-assets/images/avatars/avatar-3.png" width="45" height="45" class="rounded-circle"
                                    alt="" />
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">5.2</span>
                                    </p>
                                    <p class="font-weight-bold mb-0">Tom Bundle</p>
                                    <p class="text-secondary mb-0">Manager</p>
                                </div> <a href="#" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <img src="dash-assets/images/avatars/avatar-4.png" width="45" height="45" class="rounded-circle"
                                    alt="" />
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0"><span class="badge badge-pill bg-light-danger text-danger">8.9</span>
                                    </p>
                                    <p class="font-weight-bold mb-0">Tim Southee</p>
                                    <p class="text-secondary mb-0">Manager</p>
                                </div> <a href="#" class="btn btn-sm btn-outline-primary radius-10">Schedule</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bold">Lorem, ipsum.</h6>
                                <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
                                </p>
                            </div>
                            <div class="pt-5">
                                <div id="chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card radius-10 w-100 overflow-hidden">
                        <div class="card-body">
                            <div class="">
                                <h4 class="mb-2 font-weight-bold">3,240</h4>
                                <p class="mb-3 text-secondary">Lorem, ipsum dolor.</p>
                            </div>
                        </div>
                        <div id="chart5"></div>
                    </div>
                </div>
            </div>
            <!--end row-->
        
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bold">Lorem, ipsum dolor.</h6>
                                <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
                                </p>
                            </div>
                            <div class="d-flex my-4">
                                <h1 class="mb-0 font-weight-bold">144</h1>
                                <p class="mb-0 ml-3 font-14 align-self-end text-secondary">lorem</p>
                            </div>
                            <div class="progress radius-10" style="height: 10px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 45%" aria-valuenow="15"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="30"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="20"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="20"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="20"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class='bx bxs-checkbox me-2 font-24 text-primary'></i>
                                                    </div>
                                                    <div>Lorem, ipsum.</div>
                                                </div>
                                            </td>
                                            <td>lorem</td>
                                            <td class="px-0 text-end">33%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class='bx bxs-checkbox me-2 font-24 text-danger'></i>
                                                    </div>
                                                    <div>Lorem, ipsum.</div>
                                                </div>
                                            </td>
                                            <td>lorem</td>
                                            <td class="px-0 text-end">17%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class='bx bxs-checkbox me-2 font-24 text-success'></i>
                                                    </div>
                                                    <div>Lorem, ipsum.</div>
                                                </div>
                                            </td>
                                            <td>lorem</td>
                                            <td class="px-0 text-end">21%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class='bx bxs-checkbox me-2 font-24 text-warning'></i>
                                                    </div>
                                                    <div>Lorem, ipsum.</div>
                                                </div>
                                            </td>
                                            <td>lorem</td>
                                            <td class="px-0 text-end">23%</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <div><i class='bx bxs-checkbox me-2 font-24 text-info'></i>
                                                    </div>
                                                    <div>Other</div>
                                                </div>
                                            </td>
                                            <td>lorem</td>
                                            <td class="px-0 text-end">19%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 font-weight-bold">Lorem, ipsum dolor.</h6>
                                <p class="mb-0 ms-auto"><i class='bx bx-dots-horizontal-rounded float-end font-24'></i>
                                </p>
                            </div>
                            <div class="bg-light-primary p-3 radius-10 text-center mt-3">
                                <h1 class="mb-0 font-weight-bold text-primary">$8,305</h1>
                                <p class="mb-0">Lorem, ipsum dolor.</p>
                            </div>
                            <div id="chart6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <h6 class="mb-0 font-weight-bold">lorem</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center ">
                                        <img src="dash-assets/images/avatars/avatar-1.png" width="35" height="35"
                                            class="rounded-circle" alt="">
                                        <div class="flex-grow-1 ms-3">
                                            <p class="font-weight-bold mb-0">Lorem, ipsum.</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Cody Fisher</td>
                                <td>Jun 08, 2020, 1:00pm</td>
                                <td><span class="badge badge-pill bg-success">lorem</span>
                                </td>
                                <td>
                                    <div class="tables_buttons">
                                        <button class="btn ">View</button>
                                        <button class="btn ">Edit</button>
                                        <button class="btn ">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center  ">
                                        <img src="dash-assets/images/avatars/avatar-2.png" width="35" height="35"
                                            class="rounded-circle" alt="">
                                        <div class="flex-grow-1 ms-3">
                                            <p class="font-weight-bold mb-0">Devone Lane</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Esther Howard</td>
                                <td>Jun 08, 2020, 2:00pm</td>
                                <td><span class="badge badge-pill bg-danger">lorem</span>
                                </td>
                                <td>
                                    <div class="tables_buttons">
                                        <button class="btn ">View</button>
                                        <button class="btn ">Edit</button>
                                        <button class="btn ">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center  ">
                                        <img src="dash-assets/images/avatars/avatar-3.png" width="35" height="35"
                                            class="rounded-circle" alt="">
                                        <div class="flex-grow-1 ms-3">
                                            <p class="font-weight-bold mb-0">Kathryn Murphy</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Wade Warren</td>
                                <td>Jun 08, 2020, 3:00pm</td>
                                <td><span class="badge badge-pill bg-info">lorem</span>
                                </td>
                                <td>
                                    <div class="tables_buttons">
                                        <button class="btn ">View</button>
                                        <button class="btn ">Edit</button>
                                        <button class="btn ">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center ">
                                        <img src="dash-assets/images/avatars/avatar-4.png" width="35" height="35"
                                            class="rounded-circle" alt="">
                                        <div class="flex-grow-1 ms-3">
                                            <p class="font-weight-bold mb-0"> lorem</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Jane Cooper</td>
                                <td>Jun 08, 2020, 5:00pm</td>
                                <td><span class="badge badge-pill bg-warning">lorem</span>
                                </td>
                                <td>
                                    <div class="tables_buttons">
                                        <button class="btn ">View</button>
                                        <button class="btn ">Edit</button>
                                        <button class="btn ">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--  
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box bg-success"><i class="fas fa-users"></i></div>
                        <h4>{{__('Total Customers')}}</h4>
                    </div>
                    <div class="number-icon">{{\Auth::user()->countCustomers()}}</div>
                </div>
                <img src="{{ asset('assets/img/dot-icon.png') }}" alt="" class="dotted-icon">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box bg-warning"><i class="fas fa-user"></i></div>
                        <h4>{{__('Total Vendors')}}</h4>
                    </div>
                    <div class="number-icon">{{\Auth::user()->countVenders()}}</div>
                </div>
                <img src="{{ asset('assets/img/dot-icon.png') }}" alt="" class="dotted-icon">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box bg-primary"><i class="fas fa-money-bill"></i></div>
                        <h4>{{__('Total Invoices')}}</h4>
                    </div>
                    <div class="number-icon">{{\Auth::user()->countInvoices()}}</div>
                </div>
                <img src="{{ asset('assets/img/dot-icon.png') }}" alt="" class="dotted-icon">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box bg-dagner"><i class="fas fa-database"></i></div>
                        <h4>{{__('Total Bills')}}</h4>
                    </div>
                    <div class="number-icon">{{\Auth::user()->countBills()}}</div>
                </div>
                <img src="{{ asset('assets/img/dot-icon.png') }}" alt="" class="dotted-icon">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div>
                    <h4 class="h4 font-weight-400 float-left">{{__('Cashflow')}}</h4>
                    <h6 class="last-day-text">{{__('Last')}} <span>{{__('15 days')}}</span></h6>
                </div>
                <div class="card bg-none">
                    <div class="scrollbar-inner">
                        <div id="cash-flow" class="chartjs-render-monitor" height="210"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <h4 class="h4 font-weight-400">{{__('Income Vs Expense')}}</h4>
                <div class="card bg-none dashboard-box-1">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <tbody class="list">
                            <tr>
                                <td>
                                    <h4 class="mb-0">{{__('Income')}}</h4>
                                    <h5 class="mb-0">{{__('Today')}}</h5>
                                </td>
                                <td>
                                    <h3 class="green-text">{{\Auth::user()->priceFormat(\Auth::user()->todayIncome())}}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="mb-0">{{__('Expense')}}</h4>
                                    <h5 class="mb-0">{{__('Today')}}</h5>
                                </td>
                                <td>
                                    <h3 class="red-text">{{\Auth::user()->priceFormat(\Auth::user()->todayExpense())}}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="mb-0">{{__('Income This')}}</h4>
                                    <h5 class="mb-0">{{__('Month')}}</h5>
                                </td>
                                <td>
                                    <h3 class="green-text">{{\Auth::user()->priceFormat(\Auth::user()->incomeCurrentMonth())}}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="mb-0">{{__('Expense This')}}</h4>
                                    <h5 class="mb-0">{{__('Month')}}</h5>
                                </td>
                                <td>
                                    <h3 class="red-text">{{\Auth::user()->priceFormat(\Auth::user()->expenseCurrentMonth())}}</h3>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="">
                    <h4 class="h4 font-weight-400 float-left">{{__('Account Balance')}}</h4>
                </div>
                <div class="card bg-none dashboard-box-1">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>{{__('Bank')}}</th>
                                <th>{{__('Holder Name')}}</th>
                                <th>{{__('Balance')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bankAccountDetail as $bankAccount)
                                <tr class="font-style">
                                    <td>{{$bankAccount->bank_name}}</td>
                                    <td>{{$bankAccount->holder_name}}</td>
                                    <td>{{\Auth::user()->priceFormat($bankAccount->opening_balance)}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center">
                                            <h6>{{__('there is no account balance')}}</h6>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div>
                    <h4 class="h4 font-weight-400 float-left">{{__('Income & Expense')}}</h4>
                    <h6 class="last-day-text">{{__('Current Year').' - '.$currentYear}}</h6>
                </div>
                <div class="card bg-none">
                    <div class="scrollbar-inner">
                        <div id="incExpBarChart" height="250"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div>
                    <h4 class="h4 font-weight-400 float-left">{{__('Income By Category')}}</h4>
                    <h6 class="last-day-text">{{__('Current Year').' - '.$currentYear}}</h6>
                </div>
                <div class="card bg-none">
                    <div class="card-body align-self-center height-440">
                        <div id="incomeByCategory"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div>
                    <h4 class="h4 font-weight-400 float-left">{{__('Expense By Category')}}</h4>
                    <h6 class="last-day-text">{{__('Current Year').' - '.$currentYear}}</h6>
                </div>
                <div class="card bg-none">
                    <div class="card-body align-self-center height-440">
                        <div id="expenseByCategory"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="">
                    <h4 class="h4 font-weight-400 float-left">{{__('Latest Income')}}</h4>
                    <a href="{{route('revenue.index')}}" class="more-text history-text float-right">{{__('View All')}}</a>
                </div>
                <div class="card bg-none dashboard-box-1">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Customer')}}</th>
                                <th>{{__('Amount Due')}}</th>
                                <th>{{__('Description')}}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @forelse($latestIncome as $income)
                                <tr>
                                    <td>{{\Auth::user()->dateFormat($income->date)}}</td>
                                    <td>{{!empty($income->customer)?$income->customer->name:''}}</td>
                                    <td>{{\Auth::user()->priceFormat($income->amount)}}</td>
                                    <td>{{$income->description}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center">
                                            <h6>{{__('there is no latest income')}}</h6>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="">
                    <h4 class="h4 font-weight-400 float-left">{{__('Latest Expense')}}</h4>
                    <a href="{{route('payment.index')}}" class="more-text history-text float-right">{{__('View All')}}</a>
                </div>
                <div class="card bg-none dashboard-box-1">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Customer')}}</th>
                                <th>{{__('Amount Due')}}</th>
                                <th>{{__('Description')}}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @forelse($latestExpense as $expense)
                                <tr>
                                    <td>{{\Auth::user()->dateFormat($expense->date)}}</td>
                                    <td>{{!empty($expense->customer)?$expense->customer->name:''}}</td>
                                    <td>{{\Auth::user()->priceFormat($expense->amount)}}</td>
                                    <td>{{$expense->description}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center">
                                            <h6>{{__('there is no latest expense')}}</h6>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="">
                    <h4 class="h4 font-weight-400 float-left">{{__('Invoices')}}</h4>
                </div>
                <div class="card bg-none invo-tab dashboard-box-2">
                    <ul class="nav nav-tabs">
                        <li>
                            <a data-toggle="tab" href="#weekly_statistics" class="active">{{__('Weekly Statistics')}}</a>
                        </li>
                        <li class="annual-billing">
                            <a data-toggle="tab" href="#monthly_statistics" class="">{{__('Monthly Statistics')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="weekly_statistics" class="tab-pane in active">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <tbody class="list">
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Invoice Generated')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($weeklyInvoice['invoiceTotal'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Paid')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="red-text">{{\Auth::user()->priceFormat($weeklyInvoice['invoicePaid'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Due')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($weeklyInvoice['invoiceDue'])}}</h3>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="monthly_statistics" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 ">
                                    <tbody class="list">
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Invoice Generated')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($monthlyInvoice['invoiceTotal'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Paid')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="red-text">{{\Auth::user()->priceFormat($monthlyInvoice['invoicePaid'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Due')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($monthlyInvoice['invoiceDue'])}}</h3>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-6">
                <div class="">
                    <h4 class="h4 font-weight-400 float-left">{{__('Recent Invoices')}}</h4>
                </div>
                <div class="card bg-none dashboard-box-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Customer')}}</th>
                                <th>{{__('Issue Date')}}</th>
                                <th>{{__('Due Date')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Status')}}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @forelse($recentInvoice as $invoice)
                                <tr>
                                    <td>{{\Auth::user()->invoiceNumberFormat($invoice->invoice_id)}}</td>
                                    <td>{{!empty($invoice->customer)? $invoice->customer->name:'' }} </td>
                                    <td>{{ Auth::user()->dateFormat($invoice->issue_date) }}</td>
                                    <td>{{ Auth::user()->dateFormat($invoice->due_date) }}</td>
                                    <td>{{\Auth::user()->priceFormat($invoice->getTotal())}}</td>
                                    <td>
                                        @if($invoice->status == 0)
                                            <span class="badge badge-pill badge-primary">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 1)
                                            <span class="badge badge-pill badge-warning">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 2)
                                            <span class="badge badge-pill badge-danger">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 3)
                                            <span class="badge badge-pill badge-info">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                        @elseif($invoice->status == 4)
                                            <span class="badge badge-pill badge-success">{{ __(\App\Invoice::$statues[$invoice->status]) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-center">
                                            <h6>{{__('there is no recent invoice')}}</h6>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-6">
                <div class="">
                    <h4 class="h4 font-weight-400 float-left">{{__('Recent Bills')}}</h4>
                </div>
                <div class="card bg-none dashboard-box-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Vendor')}}</th>
                                <th>{{__('Bill Date')}}</th>
                                <th>{{__('Due Date')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Status')}}</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @forelse($recentBill as $bill)
                                <tr>
                                    <td>{{\Auth::user()->billNumberFormat($bill->bill_id)}}</td>
                                    <td>{{!empty($bill->vender)? $bill->vender->name:'' }} </td>
                                    <td>{{ Auth::user()->dateFormat($bill->bill_date) }}</td>
                                    <td>{{ Auth::user()->dateFormat($bill->due_date) }}</td>
                                    <td>{{\Auth::user()->priceFormat($bill->getTotal())}}</td>
                                    <td>
                                        @if($bill->status == 0)
                                            <span class="badge badge-pill badge-primary">{{ __(\App\Bill::$statues[$bill->status]) }}</span>
                                        @elseif($bill->status == 1)
                                            <span class="badge badge-pill badge-warning">{{ __(\App\Bill::$statues[$bill->status]) }}</span>
                                        @elseif($bill->status == 2)
                                            <span class="badge badge-pill badge-danger">{{ __(\App\Bill::$statues[$bill->status]) }}</span>
                                        @elseif($bill->status == 3)
                                            <span class="badge badge-pill badge-info">{{ __(\App\Bill::$statues[$bill->status]) }}</span>
                                        @elseif($bill->status == 4)
                                            <span class="badge badge-pill badge-success">{{ __(\App\Bill::$statues[$bill->status]) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="text-center">
                                            <h6>{{__('there is no recent bill')}}</h6>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="">
                    <h4 class="h4 font-weight-400 float-left">{{__('Bills')}}</h4>
                </div>
                <div class="card bg-none invo-tab dashboard-box-2">
                    <ul class="nav nav-tabs">
                        <li>
                            <a data-toggle="tab" href="#bill_weekly_statistics" class="active">{{__('Weekly Statistics')}}</a>
                        </li>
                        <li class="annual-billing">
                            <a data-toggle="tab" href="#bill_monthly_statistics" class="">{{__('Monthly Statistics')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="bill_weekly_statistics" class="tab-pane in active">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <tbody class="list">
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Bill Generated')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($weeklyBill['billTotal'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Paid')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="red-text">{{\Auth::user()->priceFormat($weeklyBill['billPaid'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Due')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($weeklyBill['billDue'])}}</h3>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="bill_monthly_statistics" class="tab-pane">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <tbody class="list">
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Bill Generated')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($monthlyBill['billTotal'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Paid')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="red-text">{{\Auth::user()->priceFormat($monthlyBill['billPaid'])}}</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="mb-0">{{__('Total')}}</h4>
                                            <h5 class="mb-0">{{__('Due')}}</h5>
                                        </td>
                                        <td>
                                            <h3 class="green-text">{{\Auth::user()->priceFormat($monthlyBill['billDue'])}}</h3>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div>
                    <h4 class="h4 font-weight-400 float-left">{{__('Goal')}}</h4>
                    @forelse($goals as $goal)
                        @php
                            $total= $goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['total'];
                            $percentage=$goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['percentage'];
                        @endphp
                        <div class="card pb-0 mb-4">
                            <div class="row">
                                <div class="col-md-2 col-sm-6">
                                    <div class="p-4">
                                        <h5 class="report-text gray-text mb-0">{{__('Name')}}</h5>
                                        <h5 class="report-text mb-0">{{$goal->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="p-4">
                                        <h5 class="report-text gray-text mb-0">{{__('Type')}}</h5>
                                        <h5 class="report-text mb-0">{{ __(\App\Goal::$goalType[$goal->type]) }}</h5>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="p-4">
                                        <h5 class="report-text gray-text mb-0">{{__('Duration')}}</h5>
                                        <h5 class="report-text mb-0">{{$goal->from .' To '.$goal->to}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="p-4">
                                        <h5 class="report-text gray-text mb-0">{{__('Target')}}</h5>
                                        <h5 class="report-text mb-0">{{\Auth::user()->priceFormat($total).' of '. \Auth::user()->priceFormat($goal->amount)}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="p-4">
                                        <h5 class="report-text gray-text mb-0">{{__('Progress')}}</h5>
                                        <h5 class="report-text mb-0">{{number_format($goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['percentage'], Utility::getValByName('decimal_number'), '.', '')}}%</h5>
                                    </div>
                                </div>
                                <div class="col-12 px-4">
                                    <div class="progress-wrapper pt-0">
                                        <div class="progress progress-xs mb-0 w-100">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{number_format($goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['percentage'], Utility::getValByName('decimal_number'), '.', '')}}" aria-valuemin="0" aria-valuemax="100" style="width: {{number_format($goal->target($goal->type,$goal->from,$goal->to,$goal->amount)['percentage'], Utility::getValByName('decimal_number'), '.', '')}}%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card pb-0">
                            <div class="card-body text-center">
                                <h6>{{__('There is no goal.')}}</h6>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        --}}
    @else
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="text-danger">{{__('Permission Denied')}}</h4>
            </div>
        </div>
    @endif
@endsection


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
            <?php if(\Auth::user()->can('show dashboard')): ?>
        var options = {
                series: [
                    {
                        name: "<?php echo e(__('Income')); ?>",
                        data: <?php echo json_encode($incExpLineChartData['income']); ?>

                    },
                    {
                        name: "<?php echo e(__('Expense')); ?>",
                        data: <?php echo json_encode($incExpLineChartData['expense']); ?>

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
                    categories: <?php echo json_encode($incExpLineChartData['day']); ?>,
                    title: {
                        text: 'Days'
                    }
                },
                yaxis: {
                    title: {
                        text: '<?php echo e(__('Amount')); ?>'
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
                    name: "<?php echo e(__('Income')); ?>",
                    data: <?php echo json_encode($incExpBarChartData['income']); ?>

                },
                {
                    name: "<?php echo e(__('Expense')); ?>",
                    data: <?php echo json_encode($incExpBarChartData['expense']); ?>

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
                categories: <?php echo json_encode($incExpBarChartData['month']); ?>,
            },
        };
        var sales = new ApexCharts(document.querySelector("#incExpBarChart"), SalesChart);
        sales.render();


        var incomeCategories = {
            // series: [10,20],
            series:<?php echo json_encode($incomeCatAmount); ?>,

            chart: {
                width: '500px',
                type: 'pie',
            },
            colors: <?php echo json_encode($incomeCategoryColor); ?>,
            labels: <?php echo json_encode($incomeCategory); ?>,

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
            series: <?php echo json_encode($expenseCatAmount); ?>,

            chart: {
                width: '500px',
                height: '500px',
                type: 'pie',
            },
            colors: <?php echo json_encode($expenseCategoryColor); ?>,
            labels: <?php echo json_encode($expenseCategory); ?>,

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

        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(\Auth::user()->can('show dashboard')): ?>
        <?php if(\Auth::user()->type=='company'): ?>
            <div class="row">
                <!-- <?php if($constant['taxes'] <= 0): ?>
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            <?php echo e(__('Please add constant taxes. ')); ?><a href="<?php echo e(route('taxes.index')); ?>"><b><?php echo e(__('click here')); ?></b></a>
                        </div>
                    </div>
                <?php endif; ?> -->
                <?php if($constant['category'] <= 0): ?>
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            <?php echo e(__('Please add constant category. ')); ?><a href="<?php echo e(route('product-category.index')); ?>"><b><?php echo e(__('click here')); ?></b></a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($constant['units'] <= 0): ?>
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            <?php echo e(__('Please add constant unit. ')); ?><a href="<?php echo e(route('product-unit.index')); ?>"><b><?php echo e(__('click here')); ?></b></a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($constant['bankAccount'] <= 0): ?>
                    <div class="col-3">
                        <div class="alert alert-danger text-xs">
                            <?php echo e(__('Please create bank account. ')); ?><a href="<?php echo e(route('bank-account.index')); ?>"><b><?php echo e(__('click here')); ?></b></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

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

        
    <?php else: ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="text-danger"><?php echo e(__('Permission Denied')); ?></h4>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/dashboard/index.blade.php ENDPATH**/ ?>
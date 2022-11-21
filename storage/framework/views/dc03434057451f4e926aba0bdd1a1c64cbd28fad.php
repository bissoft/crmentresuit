
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
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box"><i class="fas fa-users"></i></div>
                        <h4><?php echo e(__('Total Customers')); ?></h4>
                    </div>
                    <div class="number-icon"><?php echo e(\Auth::user()->countCustomers()); ?></div>
                </div>
                <img src="<?php echo e(asset('assets/img/dot-icon.png')); ?>" alt="" class="dotted-icon">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box"><i class="fas fa-user"></i></div>
                        <h4><?php echo e(__('Total Vendors')); ?></h4>
                    </div>
                    <div class="number-icon"><?php echo e(\Auth::user()->countVenders()); ?></div>
                </div>
                <img src="<?php echo e(asset('assets/img/dot-icon.png')); ?>" alt="" class="dotted-icon">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box"><i class="fas fa-money-bill"></i></div>
                        <h4><?php echo e(__('Total Invoices')); ?></h4>
                    </div>
                    <div class="number-icon"><?php echo e(\Auth::user()->countInvoices()); ?></div>
                </div>
                <img src="<?php echo e(asset('assets/img/dot-icon.png')); ?>" alt="" class="dotted-icon">
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="left-card">
                        <div class="icon-box"><i class="fas fa-database"></i></div>
                        <h4>Amount Re.</h4>
                    </div>
                    <div class="number-icon"><?php echo e(\Auth::user()->countBills()); ?></div>
                </div>
                <img src="<?php echo e(asset('assets/img/dot-icon.png')); ?>" alt="" class="dotted-icon">
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\linkdin\crmentresuit-update\resources\views/dashboard/index.blade.php ENDPATH**/ ?>
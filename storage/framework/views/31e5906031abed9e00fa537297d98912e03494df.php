<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_favicon=Utility::getValByName('company_favicon');
?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?php if(auth()->guard()->check()): ?>

    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <meta name="base-url" content="<?php echo e(url('/')); ?>">
    <meta name="user-id" content="<?php echo e(Auth::id()); ?>">
    <?php
        $user = auth()->user();
    ?>
    <?php if(!isset($user->app_name) or $user->app_name==""): ?>
    <title><?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'MYAccount')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>
    <?php else: ?>
    <title><?php echo e($user->app_name); ?></title>
    <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
    <title><?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'MYAccount')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>
    <?php endif; ?>
    <link rel="shortcut icon" href="<?php echo e(url('public/favicon.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/libs/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/libs/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/libs/select2/dist/css/select2.min.css')); ?>">

    <?php echo $__env->yieldPushContent('css-page'); ?>

    <link rel="stylesheet" href="<?php echo e(url('assets/css/site.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/css/ac.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/css/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/css/stylesheet.css')); ?>">
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class="application application-offset">
<div class="container-fluid container-application">
    <?php echo $__env->make('partials.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-content position-relative">
        <?php echo $__env->make('partials.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="page-content">
            <div class="page-title">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-4 col-lg-4 col-md-4 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                        
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 d-flex align-items-center justify-content-between justify-content-md-end">
                        <?php echo $__env->yieldContent('action-button'); ?>
                    </div>
                </div>
            </div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div>
                <h4 class="h4 font-weight-400 float-left modal-title" id="exampleModalLabel"></h4>
                <a href="#" class="more-text widget-text float-right close-icon" data-dismiss="modal" aria-label="Close"><?php echo e(__('Close')); ?></a>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>


<script src="<?php echo e(url('assets/js/site.core.js')); ?>"></script>

<script src="<?php echo e(url('assets/libs/progressbar.js/dist/progressbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/libs/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.js')); ?>"></script>
<script src="<?php echo e(url('assets/libs/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(url('assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/libs/nicescroll/jquery.nicescroll.min.js')); ?> "></script>
<script src="<?php echo e(url('assets/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
<script>moment.locale('en');</script>
<?php echo $__env->yieldPushContent('theme-script'); ?>

<script>
    var dataTabelLang = {
        paginate: {previous: "<?php echo e(__('Previous')); ?>", next: "<?php echo e(__('Next')); ?>"},
        lengthMenu: "<?php echo e(__('Show')); ?> _MENU_ <?php echo e(__('entries')); ?>",
        zeroRecords: "<?php echo e(__('No data available in table')); ?>",
        info: "<?php echo e(__('Showing')); ?> _START_ <?php echo e(__('to')); ?> _END_ <?php echo e(__('of')); ?> _TOTAL_ <?php echo e(__('entries')); ?>",
        infoEmpty: " ",
        search: "<?php echo e(__('Search:')); ?>"
    }
</script>

<script src="<?php echo e(url('assets/js/site.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/datatables.min.js')); ?>"></script>

<script src="<?php echo e(url('assets/js/jscolor.js')); ?> "></script>
<script src="<?php echo e(url('assets/js/custom.js')); ?> "></script>
<script>
    var date_picker_locale = {
        format: 'YYYY-MM-DD',
        daysOfWeek: [
            "<?php echo e(__('Sun')); ?>",
            "<?php echo e(__('Mon')); ?>",
            "<?php echo e(__('Tue')); ?>",
            "<?php echo e(__('Wed')); ?>",
            "<?php echo e(__('Thu')); ?>",
            "<?php echo e(__('Fri')); ?>",
            "<?php echo e(__('Sat')); ?>"
        ],
        monthNames: [
            "<?php echo e(__('January')); ?>",
            "<?php echo e(__('February')); ?>",
            "<?php echo e(__('March')); ?>",
            "<?php echo e(__('April')); ?>",
            "<?php echo e(__('May')); ?>",
            "<?php echo e(__('June')); ?>",
            "<?php echo e(__('July')); ?>",
            "<?php echo e(__('August')); ?>",
            "<?php echo e(__('September')); ?>",
            "<?php echo e(__('October')); ?>",
            "<?php echo e(__('November')); ?>",
            "<?php echo e(__('December')); ?>"
        ],
    };
    var calender_header = {
        today: "<?php echo e(__('today')); ?>",
        month: '<?php echo e(__('month')); ?>',
        week: '<?php echo e(__('week')); ?>',
        day: '<?php echo e(__('day')); ?>',
        list: '<?php echo e(__('list')); ?>'
    };
</script>

<?php if($message = Session::get('success')): ?>
    <script>
        show_toastr('Success', '<?php echo $message; ?>', 'success');
    </script>
<?php endif; ?>
<?php if($message = Session::get('error')): ?>
    <script>
        show_toastr('Error', '<?php echo $message; ?>', 'error');
    </script>
<?php endif; ?>
<?php echo $__env->yieldPushContent('script-page'); ?>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6cf972f1-fe97-4d08-8a5b-31d0272ab093";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
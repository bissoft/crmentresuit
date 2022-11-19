<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/core/main.css">
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/daygrid/main.css">
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/timegrid/main.css">
<link rel="stylesheet" href="/dash-assets/plugins/calender_js/list/main.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Booking & Schedule')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create project')): ?>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="<?php echo e(route('booking.create')); ?>" data-size="xl" data-ajax-popup="true" data-title="<?php echo e(__('Create New Project')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="page-content">
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Bookings and Schedules</h5>
                </div>
                
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div id='calendar'></div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src='/dash-assets/plugins/calender_js/core/main.js'></script>
<script src='/dash-assets/plugins/calender_js/daygrid/main.js'></script>
<script src='/dash-assets/plugins/calender_js/timegrid/main.js'></script>
<script src='/dash-assets/plugins/calender_js/list/main.js'></script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {

        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ["dayGrid"],
            height: "parent",
            header: {
                left: "prev,next today",
                center: "title",
                right: ""
            },
            defaultView: "dayGridMonth",
            defaultDate: "<?php echo e(now()); ?>",
            navLinks: true,
            editable: true,
            eventLimit: true,
            events: [
                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                    id: "<?php echo e($booking->id); ?>",
                    title: "<?php echo e($booking->title); ?>",
                    start: "<?php echo e($booking->from_date . 'T' . $booking->from); ?>",
                    end: "<?php echo e($booking->to_date . 'T' . $booking->to); ?>",
                    color: "#9267FF"
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            eventClick: function (info) {
                // window.location.href = '/bookings/' + info.event.id;

                // change the border color just for fun
                info.el.style.borderColor = 'red';
            }
        });

        calendar.render();
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/booking/schedule.blade.php ENDPATH**/ ?>
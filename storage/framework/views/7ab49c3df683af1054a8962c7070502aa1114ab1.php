
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
        <?php if(Session::has('msg')): ?>
        <div class="alert alert-<?php echo e(Session('type')); ?> alert-dismissible fade show" role="alert">
            <strong><?php echo Session('msg'); ?></strong>
        </div>
        <?php endif; ?>
        <div class="card-header bg-transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Bookings and Schedules</h5>
                </div>
                <div>
                    <a class="btn btn-dark pull-right" href="<?php echo e(route('bookingSchedule')); ?>">Calender</a>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($bookings->count()): ?>
                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($booking->title); ?></td>
                        <td><?php echo e($booking->from_date); ?></td>
                        <td><?php echo e($booking->to_date); ?></td>
                        <td><?php echo e($booking->from); ?></td>
                        <td><?php echo e($booking->to); ?></td>
                        <td>
                            <a href="<?php echo e(route('booking.show',$booking->id)); ?>" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="#" class="edit-icon" data-size="2xl" data-url="<?php echo e(route('booking.edit',$booking->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($booking->id); ?>').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['booking.destroy',
                                $booking->id],'id'=>'delete-form-'.$booking->id]); ?>

                                <?php echo Form::close(); ?>

                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6" class="fw-bold text-center bg-primary text-wrap">No Bookings and Schedules Found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--end row-->
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\crmentresuit\resources\views/booking/index.blade.php ENDPATH**/ ?>

<?php
    $profile=asset(Storage::url('uploads/avatar/'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Emails')); ?>

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
                    <h5>Email List</h5>
                </div>
                <div>
                    <a class="btn btn-dark pull-right" href="<?php echo e(route('emails.index')); ?>">Email List</a>
                    <a href="<?php echo e(route('emails.create')); ?>" class="btn btn-info pull-right">Add Email</a>
                    <a href="<?php echo e(route('emails.send')); ?>" class="btn btn-info pull-right">Send Email</a>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Via</th>
                        <th>Date</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td> 
                        <td><?php echo e($item->email); ?></td>
                        <td><?php echo e($item->via); ?></td>
                        <td><?php echo e(date("j F, Y, g:i a", strtotime($item->created_at))); ?></td>
                        <td>
                          <a href="<?php echo e(route('emails.update',$item->id)); ?>" class="fa fa-edit fa-sm mr-2" title="Edit"></a>
                          <a href="<?php echo e(route('emails.index')); ?>?delete=<?php echo e($item->id); ?>" class="fa fa-trash sconfirm mr-2 fa-sm" title="Delete"></a>
                          <a href="<?php echo e(route('emails.send.single',$item->id)); ?>" class="fa fa-envelope fa-sm mr-2" title="Send Email"></a>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--end row-->
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/email-marketing/index.blade.php ENDPATH**/ ?>
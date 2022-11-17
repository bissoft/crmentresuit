
<?php
    $profile=asset(Storage::url('uploads/avatar/'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Emails')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-content">
    <!--end row-->
    <div class="text-end">
        <a class="btn btn-primary" href="<?php echo e(route('emails.index')); ?>"> Back</a>
    </div>
    <div class="row mt-5">
       

        <div class="col">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary">Update Email</h5>

                    </div>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form action="" class="row g-3" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="name" value="<?php echo e($email->name); ?>"  class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" value="<?php echo e($email->email); ?>"  class="form-control" placeholder="Enter Email">
                        </div>


                        <div class="col-12 text-end">
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/email-marketing/update.blade.php ENDPATH**/ ?>
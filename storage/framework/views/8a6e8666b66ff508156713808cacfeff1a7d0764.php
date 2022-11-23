<div class="card bg-none card-box">
    <form action="<?php echo e(route('departments.update', $department)); ?>" method="POST" class="">
        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" value="<?php echo e($department->name); ?>"  name="name" autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                 </div>
                 <div class="form-group">
                    <label>Department Email <span class="required">*</span></label>
                    <input type="email" class="form-control form-control-sm" value="<?php echo e($department->email); ?>" name="email" autocomplete="off">
                    <div class="invalid-feedback d-block email"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/departments/edit.blade.php ENDPATH**/ ?>
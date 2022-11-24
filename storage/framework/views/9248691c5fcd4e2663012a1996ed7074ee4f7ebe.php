<div class="card bg-none card-box">
    <form action="<?php echo e(route('plan_attributes.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
            </div>
            <input type="hidden" name="plan_id" value="<?php echo e($plan_id); ?>">
            <div class="form-group col-md-6 mt-4">
                <div class="form-check">
                    <input class="form-check-input" name="included" type="checkbox" value="1" id="included" checked>
                    <label class="form-check-label" for="included">
                        Included
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/plan_attributes/create.blade.php ENDPATH**/ ?>
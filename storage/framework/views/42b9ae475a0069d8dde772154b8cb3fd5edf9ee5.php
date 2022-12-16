<div class="card bg-none card-box">
    <form action="<?php echo e(route('plans.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo e(old('price')); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Type</label>
                    <select class="form-control" name="type">
                        <?php
                        $_type = old('type');
                        $types = ['monthly', 'yearly'];
                        ?>
                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type); ?>" <?php if($_type==$type): ?> selected <?php endif; ?>><?php echo e($type); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Stripe Plan ID</label>
                    <input type="text" class="form-control" name="stripe_plan_id" value="<?php echo e(old('stripe_plan_id')); ?>">
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/plans/create.blade.php ENDPATH**/ ?>
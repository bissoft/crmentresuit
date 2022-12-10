<div class="card bg-none card-box">
    <?php echo e(Form::model($contract, array('route' => array('contracts.update', $contract->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name', __('Name'),['class'=>'form-control-label'])); ?>

            <input type="text" name="name" value="<?php echo e($contract->name); ?>" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                <?php echo e(Form::label('contract_type', __('Contract Type'),['class'=>'form-control-label'])); ?>

                <Select name="contract_type" class="form-control select2" required>
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type->id); ?>" <?php if($contract->contract_type == $type->id): ?> selected <?php endif; ?>><?php echo e($type->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </Select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="customer" class="form-control-label">Customer</label>
            <Select name="customer_id" class="form-control select2" required>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($customer->id); ?>" <?php if($contract->customer_id == $customer->id): ?> selected <?php endif; ?>><?php echo e($customer->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </Select>
        </div>
        <div class="form-group col-md-6">
            <label for="contract_value" class="form-control-label">Contract Value</label>
            <input type="text" name="contract_value" value="<?php echo e($contract->contract_value); ?>" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="start_date" class="form-control-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="<?php echo e($contract->start_date); ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="end_date" class="form-control-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="<?php echo e($contract->end_date); ?>">
        </div>

        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description', $contract->description, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="col-md-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/contracts/edit.blade.php ENDPATH**/ ?>
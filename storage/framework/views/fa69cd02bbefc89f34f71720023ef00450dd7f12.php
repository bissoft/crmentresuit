<div class="card bg-none card-box">
    <?php echo e(Form::model($contractType, array('route' => array('contract-types.update', $contractType->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name', __('Name'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('name', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="col-md-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/contractType/edit.blade.php ENDPATH**/ ?>
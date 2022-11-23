<div class="card bg-none card-box">
    <form action="<?php echo e(route('ticketpriorities.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="name" autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                 </div>
                 <div class="form-group">
                    <label>Descritpion <span class="required">*</span></label>
                    <textarea name="description" class="form-control form-control-sm" id="" cols="30" rows="10"></textarea>
                 </div>
            </div>

            <div class="col-md-12">
                <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/ticketpriorities/create.blade.php ENDPATH**/ ?>
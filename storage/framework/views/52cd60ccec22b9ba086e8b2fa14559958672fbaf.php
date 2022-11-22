
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Create Interview
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.interview.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="required" for="topic">Topic <small style="color:red;">*</small></label>
                    <input class="form-control" type="text" name="topic" id="topic" placeholder="Enter Topic" value="<?php echo e(old('topic')); ?>">
                    <?php echo $errors->first('topic', "<span class='text-danger'>:message</span>"); ?>

                </div>
                <div class="form-group">
                    <label class="required" for="start_time">Start Time <small style="color:red;">*</small></label>
                    <input class="form-control" type="datetime-local" placeholder="Enter Start Time" name="start_time" id="start_time"
                        value="<?php echo e(old('start_time')); ?>">
                    <?php echo $errors->first('start_time', "<span class='text-danger'>:message</span>"); ?>

                </div>
                <div class="form-group">
                    <label class="required" for="duration">Duration <small style="color:red;">*</small></label>
                    <input class="form-control" type="number" placeholder="Enter Duration" name="duration" id="duration"
                        value="<?php echo e(old('duration')); ?>">
                    <?php echo $errors->first('duration', "<span class='text-danger'>:message</span>"); ?>

                </div>
                <div class="form-group">
                    <label class="required">User <small style="color:red;">*</small></label>
                    <select name="user" class="form-control" id="">
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($item->id); ?>"><?php echo e($item->name ?? ''); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        SAVE
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\crmentresuit\resources\views/admin/interview/create.blade.php ENDPATH**/ ?>
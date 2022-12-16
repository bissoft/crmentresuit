<div class="card bg-none card-box">
<form action="<?php echo e(route('projects.update', $project)); ?>" method="POST" class="">
    <?php echo method_field('PATCH'); ?>
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="main-content">
                <div class="form-group mb-3 ">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e($project->name); ?>">
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="customer_id">Customer <span class="required">*</span></label>
                    <select name="customer_id" class='form-control'>
                        <option value="">Select</option>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->id); ?>" <?php if($customer->id == $project->customer_id): ?> selected <?php endif; ?>><?php echo e($customer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback d-block"></div>
                </div>
                
                <div class="form-group mb-3 ">
                    <label for="progress" style="margin-bottom: 15px!important;">
                        Progress <span id="progress_rate">0</span>%
                    </label>
                    <input name="progress" id="progress" style="border: none !important;" type="range" min="0" max="100"
                        step="1" value="<?php echo e($project->progress); ?>" class="form-control ">
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="billing_type_id">Billing Type <span class="required">*</span></label>
                            <select name="billing_type_id" class='form-control  selectPickerWithoutSearch'>
                                <option value="" selected="selected">Select</option>
                                <option value="1" <?php if($project->billing_type_id == 1): ?> selected <?php endif; ?>>Fixed Rate</option>
                                <option value="2" <?php if($project->billing_type_id == 2): ?> selected <?php endif; ?>>Project Hours</option>
                                <option value="3" <?php if($project->billing_type_id == 3): ?> selected <?php endif; ?>>Task Hours</option>
                            </select>
                            <div class="invalid-feedback d-block"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status_id" class='form-control  selectPickerWithoutSearch'>
                                <option value="1" <?php if($project->status_id == 1): ?> selected <?php endif; ?>>Not Started</option>
                                <option value="2" <?php if($project->status_id == 2): ?> selected <?php endif; ?>>In Progress</option>
                                <option value="3" <?php if($project->status_id == 3): ?> selected <?php endif; ?>>On Hold</option>
                                <option value="4" <?php if($project->status_id == 4): ?> selected <?php endif; ?>>Cancelled</option>
                                <option value="5" <?php if($project->status_id == 5): ?> selected <?php endif; ?>>Finished</option>
                            </select>
                            <div class="invalid-feedback d-block"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 billing_rate" style="">
                    <label for="billing_rate">Billing Rate</label>
                    <input type="text" class="form-control  " id="billing_rate" name="billing_rate" value="<?php echo e($project->billing_rate); ?>">
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="start_date">Start Date <span class="required">*</span></label>
                            <input type="text" class="form-control  datepicker " id="start_date" name="start_date"
                                value="<?php echo e($project->start_date); ?>">
                            <div class="invalid-feedback d-block"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="dead_line">Deadline</label>
                            <input type="text" class="form-control datepicker" id="dead_line"
                                name="dead_line" value="<?php echo e($project->dead_line); ?>">
                            <div class="invalid-feedback d-block"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="group_id">Members</label>
                    <div class="input-group">
                        <select name="user_id[]" class='form-control select2' multiple='multiple'>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="group_id">Tags</label>
                    <div class="select2-wrapper">
                        <select name="tag_id[]" class='form-control  select2-multiple' multiple='multiple'>
                            <option value="4">Gas boiler 200 L</option>
                            <option value="2">Important</option>
                            <option value="3">SWH</option>
                            <option value="1">Tomorrow</option>
                        </select>
                    </div>
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"
                        class="form-control "><?php echo e($project->description); ?></textarea>
                    <div class="invalid-feedback d-block"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 text-end">
        <button type="submit" class="btn-create badge-blue">Save</button>
        <button type="submit" class="btn-create bg-gray" data-dismiss="modal">Cancel</button>
    </div>
    <br>
</form>
</div>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/projects/edit.blade.php ENDPATH**/ ?>
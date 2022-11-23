<div class="card bg-none card-box">
    <form action="<?php echo e(route('tickets.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Subject <span class="required">*</span> </label>
                    <input type="text" class="form-control" name="subject"
                        value="">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group contact">
                    <label>Contact <span class="required">*</span></label>
                    <select name="customer_contact_id" class='form-control form-control-lg'>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Department <span class="required">*</span></label>
                        <select name="department_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" selected="selected">Select</option>
                            <option value="2">Account Receivable and Payable</option>
                            <option value="3">Care Team</option>
                            <option value="1">Marketing</option>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>CC </label>
                        <input type="email" class="form-control"
                            name="email_cc" value="">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="group_id">Tag</label>
                    <div class="select2-wrapper">
                        <select name="tag_id[]" class='form-control select2-multiple'
                            multiple='multiple'>
                            <option value="4">Gas boiler 200 L</option>
                            <option value="2">Important</option>
                            <option value="3">SWH</option>
                            <option value="1">Tomorrow</option>
                        </select>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Assign ticket (default is current user) <span
                                class="required">*</span></label>
                        <select name="assigned_to" class='form-control selectpicker'>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status <span class="required">*</span></label>
                        <select name="ticket_status_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="1">Open</option>
                            <option value="2">In Progress</option>
                            <option value="3">Answered</option>
                            <option value="4">On Hold</option>
                            <option value="5">Closed</option>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Priority <span class="required">*</span></label>
                        <select name="ticket_priority_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" selected="selected">Select</option>
                            <option value="1">High</option>
                            <option value="3">Low</option>
                            <option value="2">Medium</option>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Service</label>
                        <select name="ticket_service_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" selected="selected">Select</option>
                            <option value="3">b</option>
                            <option value="1">Companion Care</option>
                            <option value="2">Personal Care</option>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                </div>



                <div class="form-group project_selection">
                    <label>Project</label>
                    <select name="project_id" class='form-control  project_id'>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>


            </div>

            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Insert predefined reply</label>
                        <select name="pre_defined_replies_id"
                            class='form-control'>
                            <option value="" selected="selected">Select</option>
                            <option value="7">Dodo suddenly called.</option>
                            <option value="9">Dormouse into the sky. Twinkle.</option>
                            <option value="4">Drawling-master was.</option>
                            <option value="8">King was the first minute or two.</option>
                            <option value="10">PLEASE mind what you're talking.</option>
                            <option value="3">Puss,' she began, in a solemn tone.</option>
                            <option value="6">There was no use their putting their.</option>
                            <option value="5">What made you so.</option>
                            <option value="1">WOULD not remember ever.</option>
                            <option value="2">YOU.--Come, I'll take no denial.</option>
                        </select>
                    </div>


                </div>
                <div class="form-group">
                    <textarea name="details" rows="4" id="details"  class="form-control"></textarea>
                    <div class="invalid-feedback d-block"></div>
                </div>
            </div>

            <div class="col-md-12">
                <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/tickets/create.blade.php ENDPATH**/ ?>
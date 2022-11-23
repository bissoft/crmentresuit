<div class="card bg-none card-box">
    <form action="<?php echo e(route('tickets.update', $ticket)); ?>" method="POST" class="">
        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Subject <span class="required">*</span> </label>
                    <input type="text" class="form-control" name="subject"
                        value="<?php echo e($ticket->subject); ?>">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group contact">
                    <label>Contact <span class="required">*</span></label>
                    <select name="customer_contact_id" class='form-control form-control-lg'>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php if($ticket->customer_contact_id == $user->id): ?> selected <?php endif; ?>><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Department <span class="required">*</span></label>
                        <select name="department_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" selected="">Select</option>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="2" <?php if($ticket->department_id == $item->id): ?> selected <?php endif; ?>><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>CC </label>
                        <input type="email" class="form-control"
                            name="email_cc" value="<?php echo e($ticket->email_cc); ?>">
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
                            <option value="<?php echo e($user->id); ?>" <?php if($ticket->assigned_to == $user->id): ?> selected <?php endif; ?>><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status <span class="required">*</span></label>
                        <select name="ticket_status_id"
                            class='form-control selectPickerWithoutSearch'>
                            <?php $__currentLoopData = $ticket_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="1" <?php if($ticket->ticket_status_id == $item->id): ?> selected <?php endif; ?>><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Priority <span class="required">*</span></label>
                        <select name="ticket_priority_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" ">Select</option>
                            <?php $__currentLoopData = $ticket_priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="1" <?php if($ticket->ticket_priority_id == $item->id): ?> selected <?php endif; ?> ><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Service</label>
                        <select name="ticket_service_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" selected="selected">Select</option>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="3" <?php if($ticket->ticket_service_id ==  $item->id): ?> selected <?php endif; ?> ><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                </div>



                <div class="form-group project_selection">
                    <label>Project</label>
                    <select name="project_id" class='form-control  project_id'>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($project->id); ?>" <?php if($ticket->project_id == $project->id): ?> selected <?php endif; ?> ><?php echo e($project->name); ?></option>
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
                            <option value="">Select</option>
                            <?php $__currentLoopData = $predefinedreply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php if($ticket->pre_defined_replies_id == $item->id): ?> selected <?php endif; ?>><?php echo e($item->question); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>


                </div>
                <div class="form-group">
                    <textarea name="details" rows="4" id="details"  class="form-control"><?php echo e($ticket->details); ?></textarea>
                    <div class="invalid-feedback d-block"></div>
                </div>
            </div>

            <div class="col-md-12">
                <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>
<script>
    $(document).on('change', 'select[name=pre_defined_replies_id]', function () {
        if (this.value) {
            get_predefined_content(this.value);
        }

    });

    function get_predefined_content($id) {
        $.post("<?php echo e(route('predefined-reply')); ?>", {
                "_token": "<?php echo e(csrf_token()); ?>",
                id: $id
            })
            .done(function (response) {
                if (response.status == 1) {
                    var content = $('#details').val(response.answer);
                    $('select[name=pre_defined_replies_id]').val(null).trigger("change");
                }

            });
    }
</script><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/tickets/edit.blade.php ENDPATH**/ ?>
<?php $__env->startPush('script-page'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dash-assets/plugins/rangeslider/rangeslider.css')); ?>" />
<script src="<?php echo e(asset('dash-assets/plugins/rangeslider/rangeslider.min.js')); ?>"></script>
<script>
    $(function () {
        var progressBarInput = $('input[type="range"]');
        progressBarInput.rangeslider({
            // Feature detection the default is `true`.
            // Set this to `false` if you want to use
            // the polyfill also in Browsers which support
            // the native <input type="range"> element.
            polyfill: false,
            // Default CSS classes
            rangeClass: 'rangeslider',
            disabledClass: 'rangeslider--disabled',
            horizontalClass: 'rangeslider--horizontal',
            verticalClass: 'rangeslider--vertical',
            fillClass: 'rangeslider__fill',
            handleClass: 'rangeslider__handle',
            // Callback function
            onInit: function () {},
            // Callback function
            onSlide: function (position, value) {
                $("#progress_rate").html(value);
            },
            // Callback function
            onSlideEnd: function (position, value) {

            }
        });


        $("#calculate_progress_through_tasks").change(function () {
            if (this.checked) {
                progressBarInput.prop('disabled', true);
            } else {
                progressBarInput.prop('disabled', false);
            }
            progressBarInput.rangeslider('update');
        });
        $("select[name=billing_type_id]").change(function () {
            billing_type_id = $(this).val();
            if (billing_type_id == '1') {
                $("label[for*='billing_rate']").html("Total Rate");
            } else if (billing_type_id == '2') {
                $("label[for*='billing_rate']").html("Rate Per Hour");
            }
            if (billing_type_id == '3') {
                $('.billing_rate').hide();
            } else {
                $('.billing_rate').show();
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>
<div class="card bg-none card-box">
<form action="<?php echo e(route('projects.store')); ?>" method="POST" class="">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="main-content">
                <div class="form-group mb-3 ">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>">
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="form-group mb-3">
                    <label for="customer_id">Customer <span class="required">*</span></label>
                    <select name="customer_id" class='form-control'>
                        <option value="">Select</option>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback d-block"></div>
                </div>
                
                <div class="form-group mb-3 ">
                    <label for="progress" style="margin-bottom: 15px!important;">
                        Progress <span id="progress_rate">0</span>%
                    </label>
                    <input name="progress" id="progress" style="border: none !important;" type="range" min="0" max="100"
                        step="1" value="<?php echo e(old('progress') ?? 0); ?>" class="form-control ">
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="billing_type_id">Billing Type <span class="required">*</span></label>
                            <select name="billing_type_id" class='form-control  selectPickerWithoutSearch'>
                                <option value="" selected="selected">Select</option>
                                <option value="1">Fixed Rate</option>
                                <option value="2">Project Hours</option>
                                <option value="3">Task Hours</option>
                            </select>
                            <div class="invalid-feedback d-block"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status_id" class='form-control  selectPickerWithoutSearch'>
                                <option value="1">Not Started</option>
                                <option value="2">In Progress</option>
                                <option value="3">On Hold</option>
                                <option value="4">Cancelled</option>
                                <option value="5">Finished</option>
                            </select>
                            <div class="invalid-feedback d-block"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 billing_rate" style="">
                    <label for="billing_rate">Billing Rate</label>
                    <input type="text" class="form-control  " id="billing_rate" name="billing_rate" value="">
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="start_date">Start Date <span class="required">*</span></label>
                            <input type="text" class="form-control  datepicker " id="start_date" name="start_date"
                                value="<?php echo e(old('start_date')); ?>">
                            <div class="invalid-feedback d-block"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="dead_line">Deadline</label>
                            <input type="text" class="form-control datepicker" id="dead_line"
                                name="dead_line" value="<?php echo e(old('dead_line')); ?>">
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
                        class="form-control"><?php echo e(old('description')); ?></textarea>
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
</div><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/projects/create.blade.php ENDPATH**/ ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_favicon=Utility::getValByName('company_favicon');
 $lang=\App\Utility::getValByName('default_language');
?>
<?php $__env->startPush('script-page'); ?>
    <script>
        function myFunction() {
      // Get the text field
      var copyText = document.getElementById("myInput");
    
      // Select the text field
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices
    
      // Copy the text inside the text field
      navigator.clipboard.writeText(copyText.value);
      
      // Alert the copied text
      alert("Copied the text: " + copyText.value);
    }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="nav-tabs">
                <div class="col-lg-12 our-system">
                    <div class="row">
                        <ul class="nav nav-tabs my-4">
                            <li>
                                <a data-toggle="tab" href="#business-setting" class="active"><?php echo e(__('Referrals')); ?></a>
                            </li>
                            <li class="annual-billing">
                                <a data-toggle="tab" href="#system-setting" class=""><?php echo e(__('Referrer')); ?> </a>
                            </li>
                            <li class="annual-billing">
                                <a data-toggle="tab" href="#company-setting" class=""><?php echo e(__('My Referral Link')); ?> </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="tab-content">


                    <div id="business-setting" class="tab-pane in active">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('Referrals')); ?></h4>
                                </div>
                            </div>
                            <div class="card bg-none">
                                <div class="table-responsive p-3">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($referrals) and $referrals->count()): ?>
                                            <?php $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($referral->full_name); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="2" class="fw-bold text-center bg-primary text-wrap">No
                                                    Referrals Found</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        

                    </div>

                    <div id="system-setting" class="tab-pane">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('Referrer')); ?></h4>
                                </div>
                            </div>
                            <div class="card bg-none">
                                <div class="table-responsive p-3">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php if(isset($referrer)): ?>
                                            <tr>
                                                <td>1</td>
                                                <td><?php echo e($referrer->full_name ?? ''); ?></td>
                                            </tr>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="2" class="fw-bold text-center bg-primary text-wrap">No Referrer
                                                    Found</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="company-setting" class="tab-pane">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('My Referral Link')); ?></h4>
                                </div>
                            </div>
                            <div class="card bg-none">
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo e($link); ?>" class="form-control"
                                        placeholder="Share this referral link" aria-label="Share this referral link"
                                        aria-describedby="button-addon2" id="myInput">
                                    <button class="btn btn-labeled btn-success" type="button" id="button-addon2" onclick="myFunction()">
                                        <span class="btn-label"><i class="fa fa-copy"></i></span>
                                        Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\linkdin\crmentresuit-update\resources\views/referral/index.blade.php ENDPATH**/ ?>
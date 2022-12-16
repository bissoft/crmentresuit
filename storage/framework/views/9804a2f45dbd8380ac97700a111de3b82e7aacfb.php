

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="pricing_card mt-5">
        <h2 class="text-center mb-5">Subscription Plans</h2>
        <div class="demo">
            <div class="text-center d-flex justify-content-center my-3">
                <label class="mr-2" for="plan-type">Monthly</label>
                <div class="custom-control custom-switch ">
                    <input type="checkbox" class="custom-control-input" id="plan-type" <?php if($type=='yearly' ): ?> checked
                        <?php endif; ?>>
                    <label class="custom-control-label" for="plan-type">Yearly</label>
                </div>
            </div>
            <div class="container pb-5">
                <div class="row">

                    <?php if($plans->count()): ?>

                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="pricingTable blue">
                            <div class="pricingTable-header">
                                <h3 class="title"><?php echo e($plan->name); ?></h3>
                                <div class="price-value">
                                    <span class="amount">$<?php echo e($plan->price); ?></span>
                                </div>
                            </div>
                            <ul class="pricing-content">

                                <?php $__currentLoopData = $plan->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="<?php echo e($attribute->included ? '' : 'disable'); ?>"><?php echo e($attribute->name); ?></li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                            <div class="pricingTable-signup">

                                <?php if(auth()->user()->subscribed($plan->name)): ?>
                                <a class="btn-yellow rounded p-1 px-3 px-md-1" href="javascript:void(0)">Subscribed</a>
                                <?php else: ?>
                                <a class="btn-yellow rounded p-1 px-3 px-md-1" href="<?php echo e(route('subscribe', $plan->id)); ?>">Subscribe</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                    <div class="text-center">No plans found</div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/plans.blade.php ENDPATH**/ ?>
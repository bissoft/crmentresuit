
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Contract Types')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create goal')): ?>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="<?php echo e(route('contracts.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Contract Type')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fas fa-plus"></i> <?php echo e(__('Create')); ?>

                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr>
                                <th> <?php echo e(__('#')); ?></th>
                                <th> <?php echo e(__('Subject')); ?></th>
                                <th> <?php echo e(__('Contract Type')); ?></th>
                                <th> <?php echo e(__('Customer')); ?></th>
                                <th> <?php echo e(__('Contract Value')); ?></th>
                                <th> <?php echo e(__('Date')); ?></th>
                                <th> <?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($contract->id); ?></td>
                                <td><?php echo e($contract->name); ?></td>
                                <td><?php echo e($contract->contractType->name ?? ""); ?></td>
                                <td><?php echo e($contract->customer->name ?? ""); ?></td>
                                <td><?php echo e($contract->contract_value); ?></td>
                                <td><?php echo e($contract->start_date); ?></td>
                                <td>
                                    
                                    <a href="#" class="edit-icon" data-size="2xl" data-url="<?php echo e(route('contracts.edit',$contract->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($contract->id); ?>').submit();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['contracts.destroy',
                                        $contract->id],'id'=>'delete-form-'.$contract->id]); ?>

                                        <?php echo Form::close(); ?>


                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/contracts/index.blade.php ENDPATH**/ ?>
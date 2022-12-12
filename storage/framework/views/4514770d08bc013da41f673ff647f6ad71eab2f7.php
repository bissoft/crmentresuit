
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Leads')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="<?php echo e(route('leads.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create Lead')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                <i class="fas fa-plus"></i> <?php echo e(__('Create')); ?>

            </a>
        </div>
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
                                <th> <?php echo e(__('Name')); ?></th>
                                <th> <?php echo e(__('Source')); ?></th>
                                <th> <?php echo e(__('Budget')); ?></th>
                                <th> <?php echo e(__('Status')); ?></th>
                                <th> <?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="font-style">
                                    <td><?php echo e($lead->id); ?></td>
                                    <td><?php echo e($lead->name); ?></td>
                                    <td><?php echo e($lead->source->name ?? ''); ?></td>
                                    <td style="background-color: <?php echo e($lead->status->color ?? ''); ?>" class="text-dark"><?php echo e($lead->status->name ?? ''); ?></td>
                                    <td><?php echo e(number_format($lead->estimate_budget)); ?></td>
                                    <td class="Action">
                                        <span>
                                            <a href="<?php echo e(route('leads.show',$lead->id)); ?>" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="<?php echo e(__('Attributes')); ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="edit-icon" data-url="<?php echo e(route('leads.edit',$lead->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Lead')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($lead->id); ?>').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['leads.destroy', $lead->id],'id'=>'delete-form-'.$lead->id]); ?>

                                            <?php echo Form::close(); ?>

                                        </span>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/leads/index.blade.php ENDPATH**/ ?>
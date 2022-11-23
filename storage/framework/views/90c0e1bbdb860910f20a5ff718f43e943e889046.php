
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage predefined-replies')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
            <div class="all-button-box">
                <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto" data-url="<?php echo e(route('predefined-replies.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Predefinedreply')); ?>">
                    <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php if(Session::has('msg')): ?>
                <div class="alert alert-<?php echo e(Session('type')); ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo Session('msg'); ?></strong>
                </div>
                <?php endif; ?>
                <div class="card-body py-0">
                    
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr role="row">
                                <th><?php echo e(__('Question')); ?></th>
                                <th><?php echo e(__('Answer')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $predefinedreplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->question); ?></td>
                                        <td><?php echo e(substr($item->answer, 0, 45) . '......'); ?></td>
                                        <td>
                                           
                                            <a href="#" class="edit-icon" data-size="2xl" data-url="<?php echo e(route('predefined-replies.edit',$item->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                
                                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($item->id); ?>').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['predefined-replies.destroy',
                                                $item->id],'id'=>'delete-form-'.$item->id]); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/predefined-replies/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Permissions')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Invoice')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Permissions')); ?></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4><?php echo e(__('Manage Permissions')); ?></h4>
                                <a href="#" data-url="<?php echo e(route('permissions.create')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Create New Permission')); ?>" class="btn btn-icon icon-left btn-primary">
                                    <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush" id="dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th> <?php echo e(__('Permissions')); ?></th>
                                                        <th class="text-right" width="200px"> <?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($permission->name); ?></td>

                                                            <td class="action">

                                                                <a href="#" class="edit-icon" data-url="<?php echo e(route('permissions.edit',$permission->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Update permission')); ?>" class="btn btn-outline btn-xs blue-madison" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>

                                                                <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($permission->id); ?>').submit();">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id],'id'=>'delete-form-'.$permission->id]); ?>

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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/permission/index.blade.php ENDPATH**/ ?>
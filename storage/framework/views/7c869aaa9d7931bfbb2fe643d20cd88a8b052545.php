
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Projects')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create project')): ?>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="<?php echo e(route('projects.create')); ?>" data-size="xl" data-ajax-popup="true" data-title="<?php echo e(__('Create New Project')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="card radius-10 mt-5">
        <?php if(Session::has('msg')): ?>
        <div class="alert alert-<?php echo e(Session('type')); ?> alert-dismissible fade show" role="alert">
            <strong><?php echo Session('msg'); ?></strong>
        </div>
        <?php endif; ?>
        <div class="card-header bg-transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Projects</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table table-striped mb-0 dataTable">
                <thead>
                    <tr>
                        <th>Project#</th>
                        <th>Name</th>
                        <th>Customer</th>
                        <th>Start Date</th>
                        <th>Deadline</th>
                        <th>Billing Type</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($projects->count()): ?>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e("PRJ-".sprintf("%06d", 100000 + $project->id)); ?></td>
                        <td><?php echo e($project->name); ?></td>
                        <td><?php echo e($project->customer->name?? ''); ?></td>
                        <td><?php echo e($project->start_date); ?></td>
                        <td><?php echo e($project->dead_line); ?></td>
                        <td><?php echo e($project->billing_type_id); ?></td>
                        <td><?php echo e($project->status_id); ?></td>
                        <td>
                            <a href="<?php echo e(route('projects.show',$project->id)); ?>" class="edit-icon bg-success" data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="#" class="edit-icon" data-size="2xl" data-url="<?php echo e(route('projects.edit',$project->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($project->id); ?>').submit();">
                                <i class="fas fa-trash"></i>
                            </a>
                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['projects.destroy',
                                $project->id],'id'=>'delete-form-'.$project->id]); ?>

                                <?php echo Form::close(); ?>


                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="8" class="fw-bold text-center bg-primary text-wrap">No Projects Found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--end row-->
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/projects/index.blade.php ENDPATH**/ ?>
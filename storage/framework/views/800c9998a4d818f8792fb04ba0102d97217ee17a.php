
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Leads')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="page-content">
    <div class="text-end">
        <a class="btn btn-primary" href="<?php echo e(route('leads.index')); ?>"> Back</a>
    </div>
    <!--end row-->
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <h6 class="mb-0 font-weight-bold">Lead Information</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th>
                            Name:
                        </th>
                        <td>
                            <?php echo e($lead->name); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Source:
                        </th>
                        <td>
                            <?php echo e($lead->source->name ?? ''); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Company Name:
                        </th>
                        <td>
                            <?php echo e($lead->company_name); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Position:
                        </th>
                        <td>
                            <?php echo e($lead->position); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Status:
                        </th>
                        <td>
                            <?php echo e($lead->status->name ?? ''); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Status Color:
                        </th>
                        <td style="background-color: <?php echo e($lead->status->color??''); ?>">
                            <?php echo e($lead->status->color ?? ''); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Estimate Budget:
                        </th>
                        <td>
                            <?php echo e($lead->estimate_budget); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Member:
                        </th>
                        <td>
                            <?php echo e($lead->member->name ?? ''); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Phone:
                        </th>
                        <td>
                            <?php echo e($lead->phone); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Website:
                        </th>
                        <td>
                            <?php echo e($lead->website); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Country:
                        </th>
                        <td>
                            <?php echo e($lead->country); ?>

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Description:
                        </th>
                        <td>
                            <?php echo e($lead->description); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/leads/show.blade.php ENDPATH**/ ?>
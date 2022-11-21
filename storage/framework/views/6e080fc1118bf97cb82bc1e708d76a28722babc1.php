
<?php $__env->startSection('content'); ?>

<div class="main_content_iner overly_inner ">
    <div class="container p-0 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_body pt-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <a href="<?php echo e(route('document.upload', $staff_id)); ?>" class="status_btn btn-primary">Upload Document</a>
                                <div class="table-responsive ">
                                    <?php if($documents->count()): ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                   <th>Type</th>
                                                   <th>Sign</th>
                                                   <th>Download</th>
                                                   <th>Pages</th>
                                                   <th>Data Size</th>
                                                   <th>Upload Date</th>
                                                   <th>Expiry Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><i class="fas fa-file-alt fa-2x"></i></td>
                                                        <td>
                                                            <?php if(!$document->signature): ?>
                                                                <a href="<?php echo e(route('document.modify',$document->id)); ?>"
                                                                   target="_blank">
                                                                    Sign<i class="fa fa-pencil"></i>
                                                                </a>
                                                            <?php else: ?>
                                                                <span class="text-success">Signed</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if(!$document->signature): ?>
                                                                <a href="<?php echo e(asset('assets/files/documents/'.$document->file)); ?>"
                                                                   target="_blank" style="font-size: 15px">
                                                                    <?php echo e($document->name.'.'.$document->extension); ?>

                                                                </a>
                                                            <?php else: ?>
                                                                <a href="<?php echo e(route('download.document.file',[$document->id,$document->user->id,$document->created_by])); ?>"
                                                                   target="_blank" style="font-size: 15px">
                                                                    <?php echo e($document->name.'.'.$document->extension); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($document->pages); ?></td>
                                                        <td><?php echo e(App\Helpers\HumanReadable::bytesToHuman($document->size)); ?></td>
                                                        <td><?php echo e(date('d/m/Y',strtotime($document->created_at))); ?></td>
                                                        <td><?php echo e(date('d/m/Y',strtotime($document->expiry))); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <div class="text-center text-dark">No documents</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\linkdin\crmentresuit-update\resources\views/staff/documents.blade.php ENDPATH**/ ?>
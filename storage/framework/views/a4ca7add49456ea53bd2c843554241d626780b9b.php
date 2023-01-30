
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url('js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="app">
<video-chat :user="<?php echo e($user); ?>" :others="<?php echo e($others); ?>" pusher-key="<?php echo e(config('broadcasting.connections.pusher.key')); ?>" pusher-cluster="<?php echo e(config('broadcasting.connections.pusher.options.cluster')); ?>"></video-chat>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/video_chat/index.blade.php ENDPATH**/ ?>
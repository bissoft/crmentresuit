
<?php $__env->startSection('content'); ?>
<div class="body-content">
	<div class="row">
	  <div class="col-md-12 col-lg-12">
		 <?php if(Session::has('msg') and Session::has('type')): ?>
		 <div class="alert alert-<?php echo e(Session('type')); ?> alert-dismissible fade show" role="alert">
			<strong><?php echo Session('msg'); ?></strong>
		 </div>
		 <?php endif; ?>
	
		  <!-- this is content body........................................ -->
		 <div class="card mb-4">
			<div class="card-header">
			  <div class="d-flex justify-content-between align-items-center">
				 <div>
					<h6 class="fs-17 font-weight-600 mb-0">Zoom Credential </h6>
				 </div>
				 <div class="text-right">
					<div class="actions">
					  <a href="/video-meeting" class="btn btn-primary pull-right">Video Meeting</a>
					 
					  
					</div>
				 
				 </div>
			  </div>
			</div>
			<div class="card-body">
			  <form method="POST" action="" enctype="multipart/form-data">
				 <?php echo csrf_field(); ?>
				 <input type="hidden" name="id" value="<?php echo e($zoom->id ?? ""); ?>">
					<div class="form-group">
						<label class=" req font-weight-600">User Name</label>
						<input type="text" class="form-control tcount" placeholder="Enter name..." name="name" value="<?php echo e($zoom->name ?? ''); ?>">
						<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							 <div class="text-danger"><?php echo e($message); ?> </div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label class=" req font-weight-600">ZOOM API URL</label>
						<input type="text" class="form-control tcount" placeholder="Enter Zoom Api Url..." readonly name="api_url" value="https://api.zoom.us/v2/">
						<?php $__errorArgs = ['api_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							 <div class="text-danger"><?php echo e($message); ?></div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label class=" req font-weight-600">ZOOM API KEY</label>
						<input type="text" class="form-control tcount" placeholder="Enter Zoom Api Key..." name="api_key" value="<?php echo e($zoom->api_key ?? ''); ?>">
						<?php $__errorArgs = ['api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							 <div class="text-danger"><?php echo e($message); ?></div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label class=" req font-weight-600">ZOOM API SECRET</label>
						<input type="text" class="form-control tcount" placeholder="Enter Zoom Api Secret..." name="api_secret" value="<?php echo e($zoom->api_secret ?? ''); ?>">
						<?php $__errorArgs = ['api_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							 <div class="text-danger"><?php echo e($message); ?></div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					</div><div class="form-group">
							<button type="submit" name="submit" value="Submit" class="btn btn-info float-right">Submit </button>
						</div>
					</div>
				 </form>
			  </div>
			</div>
		 </div>
	  </div>
 </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\crmentresuit\resources\views/admin/interview/credentials.blade.php ENDPATH**/ ?>
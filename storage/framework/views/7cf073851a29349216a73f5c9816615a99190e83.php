
<?php $__env->startSection('content'); ?>
 
		<?php if(Session::has('msg') and Session::has('type')): ?>
		<div class="alert alert-<?php echo e(Session('type')); ?> alert-dismissible fade show" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<strong><?php echo Session('msg'); ?></strong>
		</div>
		<?php endif; ?>
		
    <div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between align-items-center">
				
		  
				<div>
					<h6 class="fs-17 font-weight-600 mb-0">Your Zoom API Key And Secret</h6>
				</div>
				<div class="text-right">
					<div class="actions">
							<!-- Button trigger modal -->
						<button type="button" id="zoomModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Tips To Create Credentails
						</button>						
						<a href="/credentials" class="btn btn-primary pull-right">
							<?php if(!empty($zoom)): ?>
								Update Credentails
							<?php else: ?>
								Add Credentials
							<?php endif; ?> 
						</a>
						
						
					</div>
				</div>
			</div>
			<?php if(!empty($zoom)): ?>
			<div class="form-group mt-3">
				<input type="text" class="form-control tcount"  disabled name="api_key" value="<?php echo e($zoom->api_key  ?? ''); ?>">
			</div>
			<div class="form-group">
				<input type="text" class="form-control tcount"  disabled name="api_secret" value="<?php echo e($zoom->api_secret ?? ''); ?>">
			</div>
			<?php else: ?>
				 <div class="text-danger"><h3 class="text-danger">Please Enter your Zoom Credentails First</h3></div>
			<?php endif; ?>
            
        </div>
       
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
		<?php if(!empty($zoom)): ?>
		  
				<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" href="<?php echo e(route('admin.interview.create')); ?>">
								Add New
							</a>
						</div>
				</div>
			
        <div class="card-body">
			<div class="">
            <h4>Video Interviews</h4>
        </div>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                    <thead>
                        <tr>    
                            <th>
                                Sr.
                            </th>
                            <th>
                                Topic
                            </th>
                            <th>
                                Start Time 
                            </th>
                            <th>
                                Invite
                            </th>
                            <th>
                                Start
                            </th>
                            <th>
                                Duration
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                Created_at
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $interview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($index+1); ?>

                                </td>
                                <td>
                                    <?php echo e($item->topic ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($item->start_time ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($item->invite_link ?? ''); ?>

                                </td>
                                <td>
                                    <a href="https://zoom.us/s/<?php echo e($item->uuid); ?>" target="_blank" class="btn btn-info">Start</a>
                                </td>
                                <td>
                                    <?php echo e($item->duration ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($item->user_name->first_name ?? ''); ?> <?php echo e($item->user_name->last_name ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo $item->created_at ?? ''; ?>

                                </td>
                                <td style="min-width:180px">
                                    
                                        <a class="btn btn-xs btn-info" href="<?php echo e(url('video-meeting/edit/'.$item->id )); ?>">
                                            Edit
                                        </a>
                                    
                                    
                                    <a class="btn btn-xs btn-danger" onclick="interviewDelete<?php echo e($item->id); ?>(<?php echo e($item->id); ?>)">
                                        Delete
                                    </a>
                                    
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
		<?php endif; ?>
   </div>

 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">How to Create Credentials</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			<h4>Access Zoom marketplace</h4> 
			<div class=""><span class="text-success h5">2 :> </span> 	<a href="https://marketplace.zoom.us/">Sign in</a></div>
			<div class=""><span class="text-success h5">3 :> </span> <a href="https://marketplace.zoom.us/develop/create">Click  'Develop'  button on header and select Build App menu.</a>	</div>
			<div class="text-info"><span class="text-success h5">4 :> </span>  	Choose the 'JWT' and create application with the app name what you want.</div>
			<p class="text-primary"><span class="text-success h5">5 :> </span>  	Input required information AppName, ShortDescription, CompanyName, Name,and Email Address and click Continue until your app will be activated. Don't forget to remember your credentials. It's used for API calling.</p>

			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			
			</div>
		</div>
	</div>
</div>



<div class="modal fade " id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div>
					<h4 class="h4 font-weight-400 float-left modal-title" id="exampleModalLabel">Create New Project</h4>
					<a href="#" class="more-text widget-text float-right close-icon" data-dismiss="modal" aria-label="Close">Close</a>
			</div>
			<div class="modal-body">  
					<div class="card bg-none card-box">
							<h4>Access Zoom marketplace</h4> 
							<div class=""><span class="text-success h5">2 :> </span> 	<a href="https://marketplace.zoom.us/">Sign in</a></div>
							<div class=""><span class="text-success h5">3 :> </span> <a href="https://marketplace.zoom.us/develop/create">Click  'Develop'  button on header and select Build App menu.</a>	</div>
							<div class="text-info"><span class="text-success h5">4 :> </span>  	Choose the 'JWT' and create application with the app name what you want.</div>
							<p class="text-primary"><span class="text-success h5">5 :> </span>  	Input required information AppName, ShortDescription, CompanyName, Name,and Email Address and click Continue until your app will be activated. Don't forget to remember your credentials. It's used for API calling.</p>
			
							<div class="col-12 text-end">
								<button type="submit" class="btn-create bg-gray" data-dismiss="modal">Cancel</button>
								<br>
							</div>
							<br>
					</div>
				</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
    <?php $__currentLoopData = $interview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
				$(document).ready(function(){
					$('#zoomModal').on('click',function(){
						$('#commonModal').modal('toggle');
					});
				});
            function interviewDelete<?php echo e($item->id); ?>(id) {
                swal({
                    title: "Are You Sure Want To Delete?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '<?php echo e(route('deleteInterview',':id')); ?>';
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                            },
                            url: url,
                            dataType: "json",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log(data);
                                //var data = JSON.parse(response);
                                iziToast.success({
                                    message: data.message,
                                    position: 'topRight'
                                });
                                //Reload page
                                window.location.reload();

                            }
                        });
                    }
                });
            }
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\crmentresuit\resources\views/admin/interview/index.blade.php ENDPATH**/ ?>
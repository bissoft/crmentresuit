<?php if($message->request_id): ?>
    <?php $request = $message->request; ?>
    <div class="card offer-here mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bold">New Request</h6>
            <h5 class="font-weight-bold">$<?php echo e($request->price); ?></h5>
        </div>
        <div class="card-body">
            <p><?php echo e($request->requirements); ?></p>
            <hr>
            <div>
            <h6 class="text-dark font-weight-bold mb-2">Your offer includes</h6>
             <p><?php echo $message->text; ?></p>
             </div>
             <hr>
             <div class="text-right">
                <?php if(auth()->user()->id == $request->customer_id): ?>
                    <?php if($request->status == 'accepted'): ?>
    
                        <a href="<?php echo e(url('order-summary', $message->request->id)); ?>" class="btn btn-success">Pay Now</a>
                        <!--<a href="<?php echo e(route('customer.review.request', $message->request->id)); ?>" class="btn btn-primary">Offer Accepted</a>-->
                    <?php else: ?>
                        <a href="#" class="btn btn-primary text-capitalize">Order <?php echo e($request->status); ?></a>
                    <?php endif; ?>
                <?php elseif(auth()->user()->id == $request->athlete_id): ?>
                    <?php if($request->status == 'pending'): ?>
                        <a href="<?php echo e(url('accept-request', $message->request->id)); ?>" class="btn btn-primary ">Accept Offer</a>
                    <?php else: ?>
                        <a href="#" class="btn btn-primary text-capitalize">Order <?php echo e($request->status); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
             </div>
        </div>
    </div>
<?php elseif($message->sender): ?>
    <?php if($message->sender->id === auth()->user()->id): ?>
    <div class="media text-group me">
        <img class="mr-3" src="<?php echo e($message->sender->picture ?? '/dash-assets/images/user/user10.jpg'); ?>" alt=" image">
        <div class="media-body">
            <h5 class="mt-0"><?php echo e($message->sender->id == 1 ? config('app.name') . ' Support' : $message->sender->first_name . ' ' . $message->sender->last_name); ?> <small><?php echo e($message->created_at); ?></small></h5>
            <p><?php echo $message->text; ?></p>
        </div>
    </div>
    <?php else: ?>
    <div class="media">
        <img class="mr-3" src="<?php echo e($message->sender->picture ?? '/dash-assets/images/user/user9.jpg'); ?>" alt=" image">
        <div class="media-body">
            <h5 class="mt-0"><?php echo e($message->sender->id == 1 ? config('app.name') . ' Support' : $message->sender->first_name . ' ' . $message->sender->last_name); ?> <small><?php echo e($message->created_at); ?></small></h5>
            <p><?php echo $message->text; ?></p>
        </div>
    </div>
    <?php endif; ?>
    <?php if($loop->last): ?>
    <div class="animateHere"></div>
    <?php endif; ?>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\crmentresuit\resources\views/message.blade.php ENDPATH**/ ?>
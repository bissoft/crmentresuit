
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dash-assets/css/chat.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="athlete-chat padding-bottom-70px">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?php if(Session::has('msg')): ?>
        <div class="alert alert-<?php echo e(Session('type')); ?> text-dark alert-dismissible fade show" role="alert">
            <strong><?php echo e(ucwords(Session('type'))); ?>!</strong> <?php echo Session('msg'); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
    </div>
    <div class="container-fluid mt-5">
        <div class="row bg-light border mx-md-0 no-gutters">
            <div class="col-12 col-md-3 border-right">
                <div class="search row no-gutters border">
                    <input type="text" name="" class="col-9 border-0 pl-3" style="min-height: 59px;"
                        placeholder="Search…">
                    <button class="btn border bg-white border-0 col-3"><i class="fa fa-search"></i></button>
                </div>
                <div class="user-tabs">
                    <?php if($chats->count()): ?>
                    <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($chat->user1 && $chat->user2): ?>
                    <?php if(($chat->user2->id == 1 && auth()->user()->id == 1) || $chat->user2->id !== 1): ?>
                    <div class="user <?php if($chat_open->id == $chat->id): ?> active <?php endif; ?>" data-chat_id="<?php echo e($chat->id); ?>">
                        <div class="media">
                            <img class="mr-3"
                                src="<?php echo e(($chat->user1_id == auth()->user()->id ? $chat->user2->picture : $chat->user1->picture) ?? '/dash-assets/images/user/user9.jpg'); ?>"
                                alt=" image">
                            <?php $last_msg = $chat->last_msg ?? null ?>
                            <div class="media-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mt-0">
                                        <?php echo e($chat->user1_id == auth()->user()->id ? $chat->user2->name : $chat->user1->name); ?>

                                    </h5>
                                    <small><?php echo e($last_msg ? $last_msg->created_at : ''); ?></small>
                                </div>
                                <p><?php if($last_msg): ?> <?php echo $last_msg->text; ?> <?php endif; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <p class="btn btn-danger text-center w-100 mb-5">No chats found <a class="btn btn-info" href="<?php echo e(route('startChat')); ?>">Click To Start Chat</a></p>
                    
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-9 ">
                <?php if($chats->count() && $chat_open->user1 && $chat_open->user2): ?>
                <?php
                $chat_user = $chat_open->user1_id == auth()->user()->id ? $chat_open->user2 : $chat_open->user1;
                ?>
                <div class="chat-person" data-id="<?php echo e($chat_user->id); ?>">
                    <div class="top-bar ">
                        <div class="d-flex align-items-center">
                            <span class="online-badge"></span>
                            <h5 class="font-weight-bold text-dark">
                                <?php echo e($chat_user->name); ?></h5>
                        </div>
                        <p class="pl-4 ">online</p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-md-8">
                            <div class="messages">
                                <?php echo $__env->make('messages', ['messages' => $messages], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="message-type">
                                <div class="media text-group me sent-msg d-none">
                                    <img class="mr-3"
                                        src="<?php echo e(auth()->user()->picture ?? '/dash-assets/images/user/user10.jpg'); ?>"
                                        alt=" image">
                                    <div class="media-body">
                                        <h5 class="mt-0">
                                            <?php echo e(auth()->user()->name); ?>

                                            <small><?php echo e(\Carbon\Carbon::now()->diffForHumans()); ?></small></h5>
                                        <p class="content"></p>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group px-3 m-0">
                                        <textarea class="form-control msg" data-chat_id="<?php echo e($chat_open->id); ?>"
                                            id="exampleFormControlTextarea1" rows="2"
                                            placeholder="Type here"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between px-3">
                                        <button class="btn btn-primary my-3 px-4 send-msg">Send</button>
                                    </div>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Create Offer</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-danger errors d-none">Please fill out all
                                                        required fields</div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="requirements" rows="5"
                                                            placeholder="Describe Your Offer"></textarea>
                                                    </div>
                                                    <h6 class="text-dark">Define the terms of your offer and what it
                                                        includes.</h6>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-md-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Revisions </label>
                                                                <input type="number" class="form-control"
                                                                    id="revisions-input" aria-describedby="emailHelp"
                                                                    placeholder="1">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> Delivery </label>
                                                                <input type="number" class="form-control"
                                                                    id="delivery-input" aria-describedby="emailHelp"
                                                                    placeholder="Days">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Price </label>
                                                                <input type="number" class="form-control"
                                                                    id="hours-input" aria-describedby="emailHelp"
                                                                    placeholder="$">

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        class="btn btn-primary send-offer">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 border-left">
                            <div class="about-chat-person">
                                <div class="card bg-light p-2 mt-3">
                                    <h5 class="text-dark font-weight-bold">About</h5>
                                    <div class=" text-center">
                                        <img src="<?php echo e(@$chat_user->picture ?? '/dash-assets/images/user/user9.jpg'); ?>"
                                            width="">
                                        <h6 class="font-weight-bold">
                                            <?php echo e(@$chat_user->name); ?></h6>
                                        <hr>
                                    </div>
                                    
                                </div>
                                <div class="card bg-light p-2 mt-3">
                                    <h6 class="font-weight-bold text-dark text-center">Instructions</h6>
                                    <p class="mb-0" style="font-size: 13px;">This is where you will sort out the other
                                        various details of your service</p>
                                    <p class="mb-0" style="font-size: 13px;">
                                        1) Mutually agreed upon location<br>
                                        o We recommend conducting lessons or assisting practices in public areas (i.e.
                                        public parks or high school fields)<br>
                                        o Recruiting advice can be done over zoom</p>
                                    <pclass="mb-0" style="font-size: 13px;"> 2) Any communication/payment done outside
                                        of this platform will result in your
                                        account being suspended</p>
                                        <p class="mb-0" style="font-size: 13px;">
                                            3) We highly recommend adding your events on google calendars to receive
                                            reminders!
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <h3 class="text-center">No chats found</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>
<!-- end employer-details -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function () {

        $('.create-offer').on('click', function (e) {
            e.preventDefault();

            $('#exampleModalCenter').modal('show');
        });

        $('.send-offer').on('click', function (e) {
            e.preventDefault();

            if (!$('#requirements').val()) {
                $('.errors').removeClass('d-none');
            } else {
                window.location.href = '/send-request/' + $('.chat-person').data('id') +
                    '?requirements=' + $('#requirements').val() + '&price=' + $('#hours-input').val() +
                    '&revisions=' + $('#revisions-input').val() + '&delivery=' + $('#delivery-input')
                    .val() + '&chat_id=' + $('.msg').data('chat_id');
            }
        });

        $('.send-msg').on('click', function (e) {
            e.preventDefault();

            let msg = $('.sent-msg');
            let text = $('.msg').val();
            let chat_id = $('.msg').data('chat_id');

            msg.find('.content').text(text);
            msg.removeClass('d-none');
            msg.addClass('d-flex');

            $('.messages').append(msg);
            $('.msg').val('');
            $('.no-msgs').hide();

            $.ajax({
                url: '/send-msg',
                data: {
                    msg: text,
                    chat_id: chat_id
                },
                success: function (res) {
                    scrollToLastMsg();
                }
            });
        });

        let myVar = setInterval(refreshMsgs, 5000);

        function refreshMsgs() {
            $.ajax({
                url: '/refresh-msgs/' + $('.user.active').data('chat_id'),
                success: function (res) {
                    $('.messages').html(res);
                }
            });
        }

        $('.user').on('click', function (e) {
            e.preventDefault();

            window.location.href = '/chat/' + $(this).data('chat_id');
        });

        

        function scrollToLastMsg() {
            console.log($(".message-type").offset().top);
            $('.messages').animate({
                scrollTop: $(".message-type").offset().top
            }, 2000);
        }

        scrollToLastMsg();
    });

</script>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/chat.blade.php ENDPATH**/ ?>
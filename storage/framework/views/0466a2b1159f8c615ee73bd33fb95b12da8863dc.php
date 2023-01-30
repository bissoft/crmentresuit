<?php
    $users=\Auth::user();
    $profile=Storage::url('uploads/avatar/');
    
    $currantLang = $users->currentLanguage();
    $languages=Utility::languages();
?>
<nav class="navbar navbar-main navbar-expand-lg navbar-border n-top-header" id="navbar-main">
    <div class="container-fluid">
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbar-main-collapse"
                aria-controls="navbar-main-collapse"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- User's navbar -->
        <div class="navbar-user d-lg-none ml-auto">
            <ul class="navbar-nav flex-row align-items-center">
                <li class="nav-item">
                    <a
                        href="#"
                        class="nav-link nav-link-icon sidenav-toggler"
                        data-action="sidenav-pin"
                        data-target="#sidenav-main"
                    ><i class="fas fa-bars"></i
                        ></a>
                </li>
                <li class="nav-item dropdown dropdown-animate">
                    <a
                        class="nav-link pr-lg-0"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                    <span class="avatar avatar-sm rounded-circle">
                      <img src="<?php echo e((!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')); ?>"/>
                    </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="dropdown-header px-0"><?php echo e(__('Hi')); ?>, <?php echo e(\Auth::user()->name); ?></h6>
                        <?php if(\Auth::guard('customer')->check()): ?>
                            <a href="<?php echo e(route('customer.profile')); ?>" class="dropdown-item">
                                <i class="fas fa-user"></i> <span><?php echo e(__('My Profile')); ?></span>
                            </a>
                        <?php elseif(\Auth::guard('vender')->check()): ?>
                            <a href="<?php echo e(route('vender.profile')); ?>" class="dropdown-item">
                                <i class="fa fa-user"></i> <span><?php echo e(__('My Profile')); ?></span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('profile')); ?>" class="dropdown-item has-icon">
                                <i class="fa fa-user"></i> <span><?php echo e(__('My Profile')); ?></span>
                            </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span><?php echo e(__('Logout')); ?></span>
                        </a>
                        <?php if(\Auth::guard('customer')->check()): ?>
                            <form id="frm-logout" action="<?php echo e(route('customer.logout')); ?>" method="POST" class="d-none">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        <?php else: ?>
                            <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-center d-none d-lg-flex">
                <li class="nav-item">
                    <a
                        href="#"
                        class="nav-link nav-link-icon sidenav-toggler"
                        data-action="sidenav-pin"
                        data-target="#sidenav-main"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item dropdown dropdown-animate">
                    <a
                        class="nav-link pr-lg-0"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <div class="media media-pill align-items-center">
                      <span class="avatar rounded-circle">
                          
                        <img src="<?php echo e((!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')); ?>"/>
                      </span>
                            <div class="ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm font-weight-bold"><?php echo e(\Auth::user()->name); ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="dropdown-header px-0"><?php echo e(__('Hi')); ?>, <?php echo e(\Auth::user()->name); ?></h6>
                        <?php if(\Auth::guard('customer')->check()): ?>
                            <a href="<?php echo e(route('customer.profile')); ?>" class="dropdown-item">
                                <i class="fas fa-user"></i> <span><?php echo e(__('My Profile')); ?></span>
                            </a>
                        <?php elseif(\Auth::guard('vender')->check()): ?>
                            <a href="<?php echo e(route('vender.profile')); ?>" class="dropdown-item">
                                <i class="fa fa-user"></i> <span><?php echo e(__('My Profile')); ?></span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('profile')); ?>" class="dropdown-item has-icon">
                                <i class="fa fa-user"></i> <span><?php echo e(__('My Profile')); ?></span>
                            </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span><?php echo e(__('Logout')); ?></span>
                            <?php if(\Auth::guard('customer')->check()): ?>
                                <form id="frm-logout" action="<?php echo e(route('customer.logout')); ?>" method="POST" class="d-none">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            <?php else: ?>
                                <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            <?php endif; ?>
                        </a>
                    </div>
                </li>
                <?php if( Gate::check('create product & service') ||  Gate::check('create customer') ||  Gate::check('create vender')||  Gate::check('create proposal')||  Gate::check('create invoice')||  Gate::check('create bill') ||  Gate::check('create goal') ||  Gate::check('create bank account')): ?>
                    
                <?php endif; ?>
            </ul>
           
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/partials/admin/header.blade.php ENDPATH**/ ?>
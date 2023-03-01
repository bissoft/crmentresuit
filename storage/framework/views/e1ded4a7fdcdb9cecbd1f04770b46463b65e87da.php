<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
?>

<div class="sidenav custom-sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">

            <?php
                $user = auth()->user();
            ?>
            <?php if(!isset($user->app_logo) or $user->app_logo==""): ?>
            <img src="<?php echo e('/'. asset('app/assets/img/logov2.png')); ?>" class="navbar-brand-img"/>
            <?php else: ?>
                <?php
                $image = url("/public/assets/images/".$user->app_logo);
                ?>
                <img src="<?php echo e($image); ?>" class="navbar-brand-img"/>
            <?php endif; ?>
        </a>
        <div class="ml-auto">
            <div class="sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="scrollbar-inner">
        <div class="div-mega">
            <ul class="navbar-nav navbar-nav-docs">
                <li class="nav-item">
                    <?php if(\Auth::guard('customer')->check()): ?>
                        <a href="<?php echo e(route('customer.dashboard')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'customer.dashboard') ? ' active' : ''); ?>">
                            <i class="fas fa-fire"></i><?php echo e(__('Dashboard')); ?>

                        </a>
                    <?php elseif(\Auth::guard('vender')->check()): ?>
                        <a href="<?php echo e(route('vender.dashboard')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'vender.dashboard') ? ' active' : ''); ?>">
                            <i class="fas fa-fire"></i><?php echo e(__('Dashboard')); ?>

                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'dashboard') ? ' active' : ''); ?>">
                            <i class="fas fa-fire"></i><?php echo e(__('Dashboard')); ?>

                        </a>
                    <?php endif; ?>
                </li>
                <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage customer proposal')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('customer.proposal')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'customer.proposal' || Request::route()->getName() == 'customer.proposal.show') ? ' active' : ''); ?>">
                            <i class="fas fa-file"></i><?php echo e(__('Proposal')); ?>

                        </a>
                    </li>
                <?php endif; ?> -->

                
					
					<?php if( Auth::user()->name == 'Admin'): ?>
						   

                            
                            
					<?php endif; ?>

                    <li class="nav-item">
                        <a href="<?php echo e(route('join.video.session')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'join-video-session') ? 'active':''); ?>">
                            <i class="fas fa-file"></i><?php echo e(__('Startup Meetups')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('record.video')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'video') ? 'active':''); ?>">
                            <i class="fas fa-file"></i><?php echo e(__('Startups Help')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('demo-video.index')); ?>" class="nav-link <?php echo e((request()->segment(1) == 'demo-video') ? 'active':''); ?>">
                            <i class="fas fa-file"></i><?php echo e(__('Demo Videos')); ?>

                        </a>
                    </li>

                    <?php if( Auth::user()->name == 'Admin'): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('plans.index')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'plans.create' || Request::route()->getName() == 'plans.edit') ? ' active' : ''); ?>">
                            <i class="fas fa-file"></i><?php echo e(__('Account Plans')); ?>

                        </a>
                    </li>

                    <?php else: ?>

                    <li class="nav-item">
                        <a href="<?php echo e(route('subscription.plans')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'plans.create' || Request::route()->getName() == 'plans.edit') ? ' active' : ''); ?>">
                            <i class="fas fa-file"></i><?php echo e(__('Account Plans')); ?>

                        </a>
                    </li>

                    <?php endif; ?>

                    

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage customer invoice')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('customer.invoice')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'customer.invoice' || Request::route()->getName() == 'customer.invoice.show') ? ' active' : ''); ?> ">
                            <i class="fas fa-file"></i><?php echo e(__('Invoice')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage customer payment')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('customer.payment')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'customer.payment') ? ' active' : ''); ?> ">
                            <i class="fas fa-money-bill-alt"></i><?php echo e(__('Payment')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage customer transaction')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('customer.transaction')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'customer.transaction') ? ' active' : ''); ?>">
                            <i class="fas fa-history"></i><?php echo e(__('Transaction')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage vender bill')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('vender.bill')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'vender.bill' || Request::route()->getName() == 'vender.bill.show') ? ' active' : ''); ?> ">
                            <i class="fas fa-file"></i><?php echo e(__('Bill')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage vender payment')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('vender.payment')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'vender.payment') ? ' active' : ''); ?> ">
                            <i class="fas fa-money-bill-alt"></i><?php echo e(__('Payment')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage vender transaction')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('vender.transaction')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'vender.transaction') ? ' active' : ''); ?>">
                            <i class="fas fa-history"></i><?php echo e(__('Transaction')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if(\Auth::user()->type=='super admin'): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage user')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit') ? ' active' : ''); ?>">
                                <i class="fas fa-columns"></i><?php echo e(__('User')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <?php if( Gate::check('manage user') || Gate::check('manage role')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e((Request::segment(1) == 'users' || Request::segment(1) == 'permissions' )?' active':'collapsed'); ?>" href="#navbar-staff" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'users' || Request::segment(1) == 'permissions' )?'true':'false'); ?>" aria-controls="navbar-staff">
                                <i class="fas fa-users"></i><?php echo e(__('Team Management')); ?>

                               <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <div class="collapse <?php echo e((Request::segment(1) == 'users' || Request::segment(1) == 'permissions')?'show':''); ?>" id="navbar-staff">
                                <ul class="nav flex-column submenu-ul">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage user')): ?>
                                        <li class="nav-item <?php echo e((Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit') ? ' active' : ''); ?>">
                                            <a href="<?php echo e(route('users.index')); ?>" class="nav-link"><?php echo e(__('User')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                   <!--  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage role')): ?>
                                        <li class="nav-item <?php echo e((Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : ''); ?>">
                                            <a href="<?php echo e(route('roles.index')); ?>" class="nav-link"><?php echo e(__('Role')); ?></a>
                                        </li>
                                    <?php endif; ?> -->
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                
                
                <?php if(Gate::check('manage goal')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('referral.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'referral')?'active':''); ?>">
                            <i class="fas fa-user-plus"></i><?php echo e(__('Referral')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('booking.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'booking' || Request::segment(1) == 'booking-schedule')?'active':''); ?>">
                            <i class="fas fa-ticket-alt"></i><?php echo e(__('Scheduling')); ?>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'lead-sources' || Request::segment(1) == 'lead-status' || Request::segment(1) == 'leads'  )?' active':'collapsed'); ?>" href="#navbar-leads" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'lead-sources' || Request::segment(1) == 'lead-status'   || Request::segment(1) == 'leads'  )?'true':'false'); ?>" aria-controls="navbar-leads">
                            <i class="fas fa-money-bill-wave-alt"></i><?php echo e(__('Leads')); ?>

                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'lead-sources' || Request::segment(1) == 'lead-status' || Request::segment(1) == 'leads'  )?'show':''); ?>" id="navbar-leads">
                            <ul class="nav flex-column submenu-ul">
                                <li class="nav-item <?php echo e((Request::route()->getName() == 'lead-status.index' || Request::route()->getName() == 'lead-status.create' || Request::route()->getName() == 'lead-status.edit' || Request::route()->getName() == 'lead-status.show') ? ' active' : ''); ?>">
                                    <a href="<?php echo e(route('lead-status.index')); ?>" class="nav-link"><?php echo e(__('Lead Status')); ?></a>
                                </li>
                                <li class="nav-item <?php echo e((Request::route()->getName() == 'lead-sources.index' || Request::route()->getName() == 'lead-sources.create' || Request::route()->getName() == 'lead-sources.edit' || Request::route()->getName() == 'lead-sources.show') ? ' active' : ''); ?>">
                                    <a href="<?php echo e(route('lead-sources.index')); ?>" class="nav-link"><?php echo e(__('Lead Sources')); ?></a>
                                </li>
                                <li class="nav-item <?php echo e((Request::route()->getName() == 'leads.index' || Request::route()->getName() == 'leads.create' || Request::route()->getName() == 'leads.edit' || Request::route()->getName() == 'leads.show') ? ' active' : ''); ?>">
                                    <a href="<?php echo e(route('leads.index')); ?>" class="nav-link"><?php echo e(__('Leads')); ?></a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'contract-types' || Request::segment(1) == 'contracts'  )?' active':'collapsed'); ?>" href="#navbar-contract" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'contract-types' || Request::segment(1) == 'contracts'  )?'true':'false'); ?>" aria-controls="navbar-contract">
                            <i class="fas fa-money-bill-wave-alt"></i><?php echo e(__('Contracts')); ?>

                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'contract-types' || Request::segment(1) == 'contracts'  )?'show':''); ?>" id="navbar-contract">
                            <ul class="nav flex-column submenu-ul">
                                <li class="nav-item <?php echo e((Request::route()->getName() == 'contracts.index' || Request::route()->getName() == 'contracts.create' || Request::route()->getName() == 'contracts.edit' || Request::route()->getName() == 'contracts.show') ? ' active' : ''); ?>">
                                    <a href="<?php echo e(route('contracts.index')); ?>" class="nav-link"><?php echo e(__('Contracts')); ?></a>
                                </li>
                                <li class="nav-item <?php echo e((Request::route()->getName() == 'contract-types.index' || Request::route()->getName() == 'contract-types.create' || Request::route()->getName() == 'contract-types.edit' || Request::route()->getName() == 'contract-types.show') ? ' active' : ''); ?>">
                                    <a href="<?php echo e(route('contract-types.index')); ?>" class="nav-link"><?php echo e(__('Contract Types')); ?></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                

                <?php if(Gate::check('manage product & service')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('productservice.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'productservice')?'active':''); ?>">
                            <i class="fas fa-shopping-cart"></i><?php echo e(__('Product & Service')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Gate::check('manage customer')): ?>
                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'customer' || Request::segment(1) == 'roles' || Request::segment(1) == 'departments' || Request::segment(1) == 'designations' || Request::segment(1) == 'docments' )?' active':'collapsed'); ?>" href="#navbar-customer" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'customer' || Request::segment(1) == 'roles' || Request::segment(1) == 'departments' || Request::segment(1) == 'designations' || Request::segment(1) == 'docments' )?'true':'false'); ?>" aria-controls="navbar-customer">
                            <i class="fas fa-user-ninja"></i><?php echo e(__('Customer')); ?>

                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'customer' || Request::segment(1) == 'roles' || Request::segment(1) == 'departments' || Request::segment(1) == 'designations' || Request::segment(1) == 'docments')?'show':''); ?>" id="navbar-customer">
                            <ul class="nav flex-column submenu-ul">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage customer')): ?>
                                   
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'customer.index' || Request::route()->getName() == 'customer.create' || Request::route()->getName() == 'customer.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('customer.index')); ?>" class="nav-link"><?php echo e(__('Customer')); ?></a>
                                    </li>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage role')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('roles.index')); ?>" class="nav-link"><?php echo e(__('Set Roles')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'departments.index' || Request::route()->getName() == 'departments.create' || Request::route()->getName() == 'departments.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('departments.index')); ?>" class="nav-link"><?php echo e(__('Departments')); ?></a>
                                    </li>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'designations.index' || Request::route()->getName() == 'designations.create' || Request::route()->getName() == 'designations.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('designations.index')); ?>" class="nav-link"><?php echo e(__('Designations')); ?></a>
                                    </li>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'docments.index' || Request::route()->getName() == 'docments.create' || Request::route()->getName() == 'docments.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('docments.index')); ?>" class="nav-link"><?php echo e(__('Documents')); ?></a>
                                    </li>
                                <?php endif; ?>
                               <!--  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage role')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('roles.index')); ?>" class="nav-link"><?php echo e(__('Role')); ?></a>
                                    </li>
                                <?php endif; ?> -->
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(Gate::check('manage vender')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('vender.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'vender')?'active':''); ?>">
                            <i class="fas fa-sticky-note"></i><?php echo e(__('Vendor')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('chat')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'chat')?'active':''); ?>">
                            <i class="fa fa-comment"></i><?php echo e(__('Messages')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('emails.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'emails')?'active':''); ?>">
                            <i class="fa fa-mail-bulk"></i><?php echo e(__('E-mail Marketing')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if( Auth::user()->name == 'Admin'): ?>
                <li class="nav-item">
                        
                    <a href="<?php echo e(route('intake.index')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'intake.index') ? ' active' : ''); ?>">
                        <i class="fas fa-sliders-h"></i>Intake Form
                    </a>
                </li> 
                <?php else: ?>

                <li class="nav-item">
                        
                    <a href="<?php echo e(route('intake')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'intake') ? ' active' : ''); ?>">
                        <i class="fas fa-sliders-h"></i>Intake Form
                    </a>
                </li> 

                <?php endif; ?>
                <!-- <?php if(Gate::check('manage proposal')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('proposal.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'proposal')?'active':''); ?>">
                            <i class="fas fa-receipt"></i><?php echo e(__('Proposal')); ?>

                        </a>
                    </li>
                <?php endif; ?> -->
                <?php if( Gate::check('manage bank account') ||  Gate::check('manage transfer')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer')?' active':'collapsed'); ?>" href="#navbar-banking" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer')?'true':'false'); ?>" aria-controls="navbar-banking">
                            <i class="fas fa-university"></i><?php echo e(__('Banking')); ?>

                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer')?'show':''); ?>" id="navbar-banking">
                            <ul class="nav flex-column submenu-ul">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage bank account')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'bank-account.index' || Request::route()->getName() == 'bank-account.create' || Request::route()->getName() == 'bank-account.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('bank-account.index')); ?>" class="nav-link"><?php echo e(__('Account')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage transfer')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'transfer.index' || Request::route()->getName() == 'transfer.create' || Request::route()->getName() == 'transfer.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('transfer.index')); ?>" class="nav-link"><?php echo e(__('Transfer')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if( Gate::check('manage invoice') ||  Gate::check('manage revenue') ||  Gate::check('manage credit note')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note')?' active':'collapsed'); ?>" href="#navbar-income" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note')?'true':'false'); ?>" aria-controls="navbar-income">
                            <i class="fas fa-money-bill-alt"></i><?php echo e(__('Income')); ?>

                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note')?'show':''); ?>" id="navbar-income">
                            <ul class="nav flex-column submenu-ul">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage invoice')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'invoice.index' || Request::route()->getName() == 'invoice.create' || Request::route()->getName() == 'invoice.edit' || Request::route()->getName() == 'invoice.show') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('invoice.index')); ?>" class="nav-link"><?php echo e(__('Invoice')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage revenue')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'revenue.index' || Request::route()->getName() == 'revenue.create' || Request::route()->getName() == 'revenue.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('revenue.index')); ?>" class="nav-link"><?php echo e(__('Revenue')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage credit note')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'credit.note' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('credit.note')); ?>" class="nav-link"><?php echo e(__('Credit Note')); ?></a>
                                    </li>
                                <?php endif; ?> -->
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if( Gate::check('manage bill')  ||  Gate::check('manage payment') ||  Gate::check('manage debit note')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'bill' || Request::segment(1) == 'payment' || Request::segment(1) == 'debit-note'  )?' active':'collapsed'); ?>" href="#navbar-expense" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'bill' || Request::segment(1) == 'payment' || Request::segment(1) == 'debit-note'  )?'true':'false'); ?>" aria-controls="navbar-expense">
                            <i class="fas fa-money-bill-wave-alt"></i><?php echo e(__('Expense')); ?>

                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'bill' || Request::segment(1) == 'payment' || Request::segment(1) == 'debit-note'  )?'show':''); ?>" id="navbar-expense">
                            <ul class="nav flex-column submenu-ul">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage bill')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'bill.index' || Request::route()->getName() == 'bill.create' || Request::route()->getName() == 'bill.edit' || Request::route()->getName() == 'bill.show') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('bill.index')); ?>" class="nav-link"><?php echo e(__('Bill')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage payment')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'payment.index' || Request::route()->getName() == 'payment.create' || Request::route()->getName() == 'payment.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('payment.index')); ?>" class="nav-link"><?php echo e(__('Payment')); ?></a>
                                    </li>
                                <?php endif; ?>
                               <!--  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage debit note')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'debit.note' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('debit.note')); ?>" class="nav-link"><?php echo e(__('Debit Note')); ?></a>
                                    </li>
                                <?php endif; ?> -->
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if( Gate::check('manage chart of account') ||  Gate::check('manage journal entry') ||   Gate::check('balance sheet report') ||  Gate::check('ledger report') ||  Gate::check('trial balance report')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'chart-of-account' || Request::segment(1) == 'journal-entry' || Request::segment(2) == 'ledger' ||  Request::segment(2) == 'balance-sheet' ||  Request::segment(2) == 'trial-balance')?' active':'collapsed'); ?>" href="#navbar-double-entry" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'bill' )?'true':'false'); ?>" aria-controls="navbar-double-entry">
                            <i class="fas fa-balance-scale"></i><?php echo e(__('Double Entry')); ?>

                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'chart-of-account'  || Request::segment(1) == 'journal-entry' || Request::segment(2) == 'ledger' ||  Request::segment(2) == 'balance-sheet' ||  Request::segment(2) == 'trial-balance')?'show':''); ?>" id="navbar-double-entry">
                            <ul class="nav flex-column submenu-ul">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage chart of account')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'chart-of-account.index') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('chart-of-account.index')); ?>" class="nav-link"><?php echo e(__('Chart of Accounts')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage journal entry')): ?>
                                    
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ledger report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.ledger' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.ledger')); ?>" class="nav-link"><?php echo e(__('Ledger Summary')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('balance sheet report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.balance.sheet' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.balance.sheet')); ?>" class="nav-link"><?php echo e(__('Balance Sheet')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trial balance report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'trial.balance' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('trial.balance')); ?>" class="nav-link"><?php echo e(__('Trial Balance')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(Gate::check('manage goal')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('projects.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'projects')?'active':''); ?>">
                            <i class="fas fa-layer-group"></i><?php echo e(__('Projects')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <?php if(\Auth::guard('customer')->check()): ?>
                            <a href="<?php echo e(route('customer.tasks')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'customer.tasks') ? ' active' : ''); ?>">
                                <i class="fas fa-fire"></i><?php echo e(__('Tasks')); ?>

                            </a>
                        <?php elseif(\Auth::guard('vender')->check()): ?>
                            <a href="<?php echo e(route('vender.tasks')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'vender.tasks') ? ' active' : ''); ?>">
                                <i class="fas fa-fire"></i><?php echo e(__('Tasks')); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('tasks.index')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'tasks') ? ' active' : ''); ?>">
                                <i class="fas fa-fire"></i><?php echo e(__('Tasks')); ?>

                            </a>
                        <?php endif; ?>
                    </li>
                                      
                    <!--<li class="nav-item">-->
                    <!--    <a href="<?php echo e(route('goal.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'goal')?'active':''); ?>">-->
                    <!--        <i class="fas fa-bullseye"></i><?php echo e(__('Goal')); ?>-->
                    <!--    </a>-->
                    <!--</li>-->
                <?php endif; ?>
                <!-- <?php if(Gate::check('manage assets')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('account-assets.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'account-assets')?'active':''); ?>">
                            <i class="fas fa-calculator"></i><?php echo e(__('Assets')); ?>

                        </a>
                    </li>
                <?php endif; ?> -->
                <?php if( Gate::check('income report') || Gate::check('expense report') || Gate::check('income vs expense report') || Gate::check('tax report')  || Gate::check('loss & profit report') || Gate::check('invoice report') || Gate::check('bill report') || Gate::check('invoice report') ||  Gate::check('manage transaction')||  Gate::check('statement report')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(((Request::segment(1) == 'report' || Request::segment(1) == 'transaction') &&  Request::segment(2) != 'ledger' &&  Request::segment(2) != 'balance-sheet' &&  Request::segment(2) != 'trial-balance')?' active':'collapsed'); ?>" href="#navbar-reports" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'report' || Request::segment(1) == 'transaction')?'true':'false'); ?>" aria-controls="navbar-reports">
                            <i class="fas fa-chart-area"></i><?php echo e(__('Report')); ?>

                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e(((Request::segment(1) == 'report' || Request::segment(1) == 'transaction') &&  Request::segment(2) != 'ledger' &&  Request::segment(2) != 'balance-sheet' &&  Request::segment(2) != 'trial-balance')?'show':''); ?>" id="navbar-reports">
                            <ul class="nav flex-column submenu-ul">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage transaction')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'transaction.index' || Request::route()->getName() == 'transfer.create' || Request::route()->getName() == 'transaction.edit') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('transaction.index')); ?>" class="nav-link"><?php echo e(__('Transaction')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('statement report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.account.statement') ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.account.statement')); ?>" class="nav-link"><?php echo e(__('Account Statement')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.income.summary' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.income.summary')); ?>" class="nav-link"><?php echo e(__('Income Summary')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.expense.summary' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.expense.summary')); ?>" class="nav-link"><?php echo e(__('Expense Summary')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income vs expense report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.income.vs.expense.summary' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.income.vs.expense.summary')); ?>" class="nav-link"><?php echo e(__('Income VS Expense')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.tax.summary' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.tax.summary')); ?>" class="nav-link"><?php echo e(__('Tax Summary')); ?></a>
                                    </li>
                                <?php endif; ?> -->
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loss & profit report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.profit.loss.summary' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.profit.loss.summary')); ?>" class="nav-link"><?php echo e(__('Profit & Loss')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.invoice.summary' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.invoice.summary')); ?>" class="nav-link"><?php echo e(__('Invoice Summary')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bill report')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'report.bill.summary' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('report.bill.summary')); ?>" class="nav-link"><?php echo e(__('Bill Summary')); ?></a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(Gate::check('manage constant tax') || Gate::check('manage constant category') ||Gate::check('manage constant unit') ||Gate::check('manage constant payment method') ||Gate::check('manage constant custom field') ): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type')?' active':'collapsed'); ?>" href="#navbar-constant" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) ==
                        'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type')?'true':'false'); ?>" aria-controls="navbar-constant">
                            <i class="fas fa-cog"></i><?php echo e(__('Constant')); ?>

                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type')?'show':''); ?>" id="navbar-constant">
                            <ul class="nav flex-column submenu-ul">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage constant tax')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'taxes.index' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('taxes.index')); ?>" class="nav-link"><?php echo e(__('Taxes')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage constant category')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'product-category.index' ) ? 'active' : ''); ?>">
                                        <a href="<?php echo e(route('product-category.index')); ?>" class="nav-link"><?php echo e(__('Category')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage constant unit')): ?>
                                    <li class="nav-item <?php echo e((Request::route()->getName() == 'product-unit.index' ) ? ' active' : ''); ?>">
                                        <a href="<?php echo e(route('product-unit.index')); ?>" class="nav-link"><?php echo e(__('Unit')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage constant custom field')): ?>
                                    
                                <?php endif; ?>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(Gate::check('manage company settings')): ?>
                    <!-- <li class="nav-item">
                        <a href="<?php echo e(route('company.setting')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'systems.index') ? ' active' : ''); ?>">
                            <i class="fas fa-sliders-h"></i><?php echo e(__('Settings')); ?>

                        </a>
                    </li> -->
                <?php endif; ?>
                <!-- <li class="nav-item">
                        
                        <a href="<?php echo e(route('staff.documents', ['staff_id' => auth()->user()->id, 'category' => 'document'])); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'staff.documents') ? ' active' : ''); ?>">
                            <i class="fas fa-sliders-h"></i>Documents
                        </a>
                </li> -->

               
                <?php if(Gate::check('manage goal')): ?>
                <li class="nav-item">
                        
                    <a href="<?php echo e(route('app-customization')); ?>" class="nav-link <?php echo e((Request::route()->getName() == 'app-customization') ? ' active' : ''); ?>">
                        <i class="fas fa-cog"></i>Customization
                    </a>
                </li>
                
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('tickets.index')); ?>" class="nav-link <?php echo e((Request::segment(1) == 'tickets')?'active':''); ?>">
                            <i class="fas fa-headset"></i><?php echo e(__('Support')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((Request::segment(1) == 'departments' || Request::segment(1) == 'services' || Request::segment(2) == 'redefined-replies' ||  Request::segment(2) == 'ticketpriorities' ||  Request::segment(2) == 'ticketstatuses')?' active':'collapsed'); ?>" href="#navbar-support-setting" data-toggle="collapse" role="button" aria-expanded="<?php echo e((Request::segment(1) == 'bill' )?'true':'false'); ?>" aria-controls="navbar-support-setting">
                            <i class="fas fa-cog"></i><?php echo e(__('Support Settings')); ?>

                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse <?php echo e((Request::segment(1) == 'departments'  || Request::segment(1) == 'services' || Request::segment(2) == 'redefined-replies' ||  Request::segment(2) == 'ticketpriorities' ||  Request::segment(2) == 'ticketstatuses')?'show':''); ?>" id="navbar-support-setting">
                            <ul class="nav flex-column submenu-ul">
                                <li class="nav-item <?php echo e((Request::segment(1) == 'departments')?'active':''); ?>">
                                    <a href="<?php echo e(route('departments.index')); ?>" class="nav-link">
                                        <?php echo e(__('Departments')); ?>

                                    </a>
                                </li>
                                <li class="nav-item <?php echo e((Request::segment(1) == 'services')?'active':''); ?>">
                                    <a href="<?php echo e(route('services.index')); ?>" class="nav-link">
                                        <?php echo e(__('Services')); ?>

                                    </a>
                                </li>
                                <li class="nav-item <?php echo e((Request::segment(1) == 'predefined-replies')?'active':''); ?>">
                                    <a href="<?php echo e(route('predefined-replies.index')); ?>" class="nav-link">
                                        <?php echo e(__('Predefined Replies')); ?>

                                    </a>
                                </li>
            
                                <li class="nav-item <?php echo e((Request::segment(1) == 'ticketpriorities')?'active':''); ?>">
                                    <a href="<?php echo e(route('ticketpriorities.index')); ?>" class="nav-link">
                                        <?php echo e(__('Ticket Priorities')); ?>

                                    </a>
                                </li>
                                <li class="nav-item <?php echo e((Request::segment(1) == 'ticketstatuses')?'active':''); ?>">
                                    <a href="<?php echo e(route('ticketstatuses.index')); ?>" class="nav-link">
                                        <?php echo e(__('Ticket Statuses')); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\ItSolzTechOkara\crmentresuit\resources\views/partials/admin/menu.blade.php ENDPATH**/ ?>
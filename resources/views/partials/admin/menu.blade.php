@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
@endphp

<div class="sidenav custom-sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('dashboard') }}">

            @php
                $user = auth()->user();
            @endphp
            @if (!isset($user->app_logo) or $user->app_logo=="")
            <img src="{{url('public/app/assets/img/logov2.png') }}" class="navbar-brand-img"/>
            @else
                @php
                $image = url("/public/assets/images/".$user->app_logo);
                @endphp
                <img src="{{ $image}}" class="navbar-brand-img"/>
            @endif
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
                    @if(\Auth::guard('customer')->check())
                        <a href="{{route('customer.dashboard')}}" class="nav-link {{ (Request::route()->getName() == 'customer.dashboard') ? ' active' : '' }}">
                            <i class="fas fa-fire"></i>{{__('Dashboard')}}
                        </a>
                        <li class="nav-item">
                            <a href="{{ route('customer.demo-video.index') }}" class="nav-link {{ (request()->segment(1) == 'demo-video') ? 'active':''}}">
                                <i class="fas fa-file"></i>{{__('Demo Videos')}}
                            </a>
                        </li>

                    @elseif(\Auth::guard('vender')->check())
                        <a href="{{route('vender.dashboard')}}" class="nav-link {{ (Request::route()->getName() == 'vender.dashboard') ? ' active' : '' }}">
                            <i class="fas fa-fire"></i>{{__('Dashboard')}}
                        </a>
                        <li class="nav-item">
                            <a href="{{ route('vender.demo-video.index') }}" class="nav-link {{ (request()->segment(1) == 'demo-video') ? 'active':''}}">
                                <i class="fas fa-file"></i>{{__('Demo Videos')}}
                            </a>
                        </li>
                    @else
                        <a href="{{route('dashboard')}}" class="nav-link {{ (Request::route()->getName() == 'dashboard') ? ' active' : '' }}">
                            <i class="fas fa-fire"></i>{{__('Dashboard')}}
                        </a>
                        <li class="nav-item">
                            <a href="{{ route('join.video.session') }}" class="nav-link {{ (request()->segment(1) == 'join-video-session') ? 'active':''}}">
                                <i class="fas fa-file"></i>{{__('Meetings')}}
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route('record.video') }}" class="nav-link {{ (request()->segment(1) == 'video') ? 'active':''}}">
                                <i class="fas fa-file"></i>{{__('Startups Help')}}
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{ route('demo-video.index') }}" class="nav-link {{ (request()->segment(1) == 'demo-video') ? 'active':''}}">
                                <i class="fas fa-file"></i>{{__('Demo Videos')}}
                            </a>
                        </li>
                    @endif
                </li>
                <!-- @can('manage customer proposal')
                    <li class="nav-item">
                        <a href="{{route('customer.proposal')}}" class="nav-link {{ (Request::route()->getName() == 'customer.proposal' || Request::route()->getName() == 'customer.proposal.show') ? ' active' : '' }}">
                            <i class="fas fa-file"></i>{{__('Proposal')}}
                        </a>
                    </li>
                @endcan -->

                {{-- <li class="nav-item">
                    <a href="{{ route('video_chat') }}" class="nav-link {{ (request()->segment(1) == 'video_chat') ? 'active':''}}">
                        <i class="fas fa-file"></i>{{__('Meetings')}}
                    </a>
                </li> --}}
					{{-- @can('manage customer proposal') --}}
					@if ( Auth::user()->name == 'Admin')
						   {{-- <li class="nav-item">
                                <a href="{{url('video-meeting')}}" class="nav-link {{ (request()->segment(1) == 'video-meeting') ? 'active':''}}">
                                    <i class="fas fa-file"></i>{{__('Video Meeting')}}
                                </a>
                            </li> --}}

                            {{-- <li class="nav-item">
                                <a href="{{ route('join.video.session') }}" class="nav-link {{ (request()->segment(1) == 'join-video-session') ? 'active':''}}">
                                    <i class="fas fa-file"></i>{{__('Meetings')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('record.video') }}" class="nav-link {{ (request()->segment(1) == 'video') ? 'active':''}}">
                                    <i class="fas fa-file"></i>{{__('Startups Help')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('demo-video.index') }}" class="nav-link {{ (request()->segment(1) == 'demo-video') ? 'active':''}}">
                                    <i class="fas fa-file"></i>{{__('Demo Videos')}}
                                </a>
                            </li> --}}
                            
					@endif

                    

                    

                    {{-- 
                    @if(\Auth::guard('customer')->check())
                    <li class="nav-item">
                        <a href="{{ route('subscription.plans') }}" class="nav-link {{ (Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'plans.create' || Request::route()->getName() == 'plans.edit') ? ' active' : '' }}">
                            <i class="fas fa-file"></i>{{__('Account Plans') }}
                        </a>
                    </li>
                    @elseif(\Auth::guard('vender')->check())
                    <li class="nav-item">
                        <a href="{{ route('subscription.plans') }}" class="nav-link {{ (Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'plans.create' || Request::route()->getName() == 'plans.edit') ? ' active' : '' }}">
                            <i class="fas fa-file"></i>{{__('Account Plans') }}
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('plans.index') }}" class="nav-link {{ (Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'plans.create' || Request::route()->getName() == 'plans.edit') ? ' active' : '' }}">
                            <i class="fas fa-file"></i>{{__('Account Plans') }}
                        </a>
                    </li>
                    @endif

                    --}}

                {{-- @endcan --}}
                @can('manage customer invoice')
                    <li class="nav-item">
                        <a href="{{route('customer.invoice')}}" class="nav-link {{ (Request::route()->getName() == 'customer.invoice' || Request::route()->getName() == 'customer.invoice.show') ? ' active' : '' }} ">
                            <i class="fas fa-file"></i>{{__('Invoice')}}
                        </a>
                    </li>
                @endcan
                @can('manage customer payment')
                    <li class="nav-item">
                        <a href="{{route('customer.payment')}}" class="nav-link {{ (Request::route()->getName() == 'customer.payment') ? ' active' : '' }} ">
                            <i class="fas fa-money-bill-alt"></i>{{__('Payment')}}
                        </a>
                    </li>
                @endcan
                @can('manage customer transaction')
                    <li class="nav-item">
                        <a href="{{route('customer.transaction')}}" class="nav-link {{ (Request::route()->getName() == 'customer.transaction') ? ' active' : '' }}">
                            <i class="fas fa-history"></i>{{__('Transaction')}}
                        </a>
                    </li>
                @endcan
                @can('manage vender bill')
                    <li class="nav-item">
                        <a href="{{route('vender.bill')}}" class="nav-link {{ (Request::route()->getName() == 'vender.bill' || Request::route()->getName() == 'vender.bill.show') ? ' active' : '' }} ">
                            <i class="fas fa-file"></i>{{__('Bill')}}
                        </a>
                    </li>
                @endcan
                @can('manage vender payment')
                    <li class="nav-item">
                        <a href="{{route('vender.payment')}}" class="nav-link {{ (Request::route()->getName() == 'vender.payment') ? ' active' : '' }} ">
                            <i class="fas fa-money-bill-alt"></i>{{__('Payment')}}
                        </a>
                    </li>
                @endcan
                @can('manage vender transaction')
                    <li class="nav-item">
                        <a href="{{route('vender.transaction')}}" class="nav-link {{ (Request::route()->getName() == 'vender.transaction') ? ' active' : '' }}">
                            <i class="fas fa-history"></i>{{__('Transaction')}}
                        </a>
                    </li>
                @endcan
                @if(\Auth::user()->type=='super admin')
                    @can('manage user')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ (Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit') ? ' active' : '' }}">
                                <i class="fas fa-columns"></i>{{__('User') }}
                            </a>
                        </li>
                    @endcan
                    
                @else
                    
                    @if( Gate::check('manage user') || Gate::check('manage role'))
                    @if ( Auth::user()->name == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::segment(1) == 'users' || Request::segment(1) == 'permissions' )?' active':'collapsed'}}" href="#navbar-staff" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'users' || Request::segment(1) == 'permissions' )?'true':'false'}}" aria-controls="navbar-staff">
                                <i class="fas fa-users"></i>{{__('Team Management')}}
                               <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <div class="collapse {{ (Request::segment(1) == 'users' || Request::segment(1) == 'permissions')?'show':''}}" id="navbar-staff">
                                <ul class="nav flex-column submenu-ul">
                                    @can('manage user')
                                        <li class="nav-item {{ (Request::route()->getName() == 'users.index' || Request::route()->getName() == 'users.create' || Request::route()->getName() == 'users.edit') ? ' active' : '' }}">
                                            <a href="{{ route('users.index') }}" class="nav-link">{{ __('User') }}</a>
                                        </li>
                                    @endcan
                                   <!--  @can('manage role')
                                        <li class="nav-item {{ (Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : '' }}">
                                            <a href="{{route('roles.index')}}" class="nav-link">{{ __('Role') }}</a>
                                        </li>
                                    @endcan -->
                                </ul>
                            </div>
                        </li>
                    @endif
                    @endif
                @endif
                
                {{-- @if(Gate::check('manage referrals')) --}}
                @if(Gate::check('manage goal'))
                    <li class="nav-item">
                        <a href="{{ route('referral.index') }}" class="nav-link {{ (Request::segment(1) == 'referral')?'active':''}}">
                            <i class="fas fa-user-plus"></i>{{__('Referral')}}
                        </a>
                    </li>
                @endif
                @if(\Auth::guard('customer')->check())
                @elseif(\Auth::guard('vender')->check())
                @else
                    <li class="nav-item">
                        <a href="{{ route('booking.index') }}" class="nav-link {{ (Request::segment(1) == 'booking' || Request::segment(1) == 'booking-schedule')?'active':''}}">
                            <i class="fas fa-ticket-alt"></i>{{__('Scheduling')}}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'lead-sources' || Request::segment(1) == 'lead-status' || Request::segment(1) == 'leads'  )?' active':'collapsed'}}" href="#navbar-leads" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'lead-sources' || Request::segment(1) == 'lead-status'   || Request::segment(1) == 'leads'  )?'true':'false'}}" aria-controls="navbar-leads">
                            <i class="fas fa-money-bill-wave-alt"></i>{{__('Leads')}}
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'lead-sources' || Request::segment(1) == 'lead-status' || Request::segment(1) == 'leads'  )?'show':''}}" id="navbar-leads">
                            <ul class="nav flex-column submenu-ul">
                                <li class="nav-item {{ (Request::route()->getName() == 'leads.index' || Request::route()->getName() == 'leads.create' || Request::route()->getName() == 'leads.edit' || Request::route()->getName() == 'leads.show') ? ' active' : '' }}">
                                    <a href="{{ route('leads.index') }}" class="nav-link">{{ __('Leads') }}</a>
                                </li>
                                <li class="nav-item {{ (Request::route()->getName() == 'lead-status.index' || Request::route()->getName() == 'lead-status.create' || Request::route()->getName() == 'lead-status.edit' || Request::route()->getName() == 'lead-status.show') ? ' active' : '' }}">
                                    <a href="{{ route('lead-status.index') }}" class="nav-link">{{ __('Lead Status') }}</a>
                                </li>
                                <li class="nav-item {{ (Request::route()->getName() == 'lead-sources.index' || Request::route()->getName() == 'lead-sources.create' || Request::route()->getName() == 'lead-sources.edit' || Request::route()->getName() == 'lead-sources.show') ? ' active' : '' }}">
                                    <a href="{{ route('lead-sources.index') }}" class="nav-link">{{ __('Lead Sources') }}</a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'contract-types' || Request::segment(1) == 'contracts'  )?' active':'collapsed'}}" href="#navbar-contract" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'contract-types' || Request::segment(1) == 'contracts'  )?'true':'false'}}" aria-controls="navbar-contract">
                            <i class="fas fa-money-bill-wave-alt"></i>{{__('Contracts')}}
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'contract-types' || Request::segment(1) == 'contracts'  )?'show':''}}" id="navbar-contract">
                            <ul class="nav flex-column submenu-ul">
                                <li class="nav-item {{ (Request::route()->getName() == 'contracts.index' || Request::route()->getName() == 'contracts.create' || Request::route()->getName() == 'contracts.edit' || Request::route()->getName() == 'contracts.show') ? ' active' : '' }}">
                                    <a href="{{ route('contracts.index') }}" class="nav-link">{{ __('Contracts') }}</a>
                                </li>
                                <li class="nav-item {{ (Request::route()->getName() == 'contract-types.index' || Request::route()->getName() == 'contract-types.create' || Request::route()->getName() == 'contract-types.edit' || Request::route()->getName() == 'contract-types.show') ? ' active' : '' }}">
                                    <a href="{{ route('contract-types.index') }}" class="nav-link">{{ __('Contract Types') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                {{-- @endif --}}

                @if(Gate::check('manage product & service'))
                    
                    {{-- <li class="nav-item">
                        <a href="{{ route('productservice.index') }}" class="nav-link {{ (Request::segment(1) == 'productservice')?'active':''}}">
                            <i class="fas fa-shopping-cart"></i>{{__('Product & Service')}}
                        </a>
                    </li> --}}
                @endif
                @if(Gate::check('manage customer'))
                    {{-- <li class="nav-item">
                        <a href="{{ route('customer.index') }}" class="nav-link {{ (Request::segment(1) == 'customer')?'active':''}}">
                            <i class="fas fa-user-ninja"></i>{{__('Customer')}}
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'customer' || Request::segment(1) == 'roles' || Request::segment(1) == 'departments' || Request::segment(1) == 'designations' || Request::segment(1) == 'docments' )?' active':'collapsed'}}" href="#navbar-customer" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'customer' || Request::segment(1) == 'roles' || Request::segment(1) == 'departments' || Request::segment(1) == 'designations' || Request::segment(1) == 'docments' )?'true':'false'}}" aria-controls="navbar-customer">
                            <i class="fas fa-user-ninja"></i>{{__('Customer')}}
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'customer' || Request::segment(1) == 'roles' || Request::segment(1) == 'departments' || Request::segment(1) == 'designations' || Request::segment(1) == 'docments')?'show':''}}" id="navbar-customer">
                            <ul class="nav flex-column submenu-ul">
                                @can('manage customer')
                                   
                                    <li class="nav-item {{ (Request::route()->getName() == 'customer.index' || Request::route()->getName() == 'customer.create' || Request::route()->getName() == 'customer.edit') ? ' active' : '' }}">
                                        <a href="{{ route('customer.index') }}" class="nav-link">{{ __('Customer') }}</a>
                                    </li>
                                    {{--  
                                    @can('manage role')
                                    <li class="nav-item {{ (Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : '' }}">
                                        <a href="{{ route('roles.index') }}" class="nav-link">{{ __('Set Roles') }}</a>
                                    </li>
                                    @endcan
                                    <li class="nav-item {{ (Request::route()->getName() == 'departments.index' || Request::route()->getName() == 'departments.create' || Request::route()->getName() == 'departments.edit') ? ' active' : '' }}">
                                        <a href="{{ route('departments.index') }}" class="nav-link">{{ __('Departments') }}</a>
                                    </li>
                                    <li class="nav-item {{ (Request::route()->getName() == 'designations.index' || Request::route()->getName() == 'designations.create' || Request::route()->getName() == 'designations.edit') ? ' active' : '' }}">
                                        <a href="{{ route('designations.index') }}" class="nav-link">{{ __('Designations') }}</a>
                                    </li>
                                    --}}
                                    <li class="nav-item {{ (Request::route()->getName() == 'docments.index' || Request::route()->getName() == 'docments.create' || Request::route()->getName() == 'docments.edit') ? ' active' : '' }}">
                                        <a href="{{ route('docments.index') }}" class="nav-link">{{ __('Documents') }}</a>
                                    </li>
                                @endcan
                               <!--  @can('manage role')
                                    <li class="nav-item {{ (Request::route()->getName() == 'roles.index' || Request::route()->getName() == 'roles.create' || Request::route()->getName() == 'roles.edit') ? ' active' : '' }}">
                                        <a href="{{route('roles.index')}}" class="nav-link">{{ __('Role') }}</a>
                                    </li>
                                @endcan -->
                            </ul>
                        </div>
                    </li>
                @endif
                @if(Gate::check('manage vender'))
                    <li class="nav-item">
                        <a href="{{ route('vender.index') }}" class="nav-link {{ (Request::segment(1) == 'vender')?'active':''}}">
                            <i class="fas fa-sticky-note"></i>{{__('Vendor')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('chat') }}" class="nav-link {{ (Request::segment(1) == 'chat')?'active':''}}">
                            <i class="fa fa-comment"></i>{{__('Messages')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('emails.index') }}" class="nav-link {{ (Request::segment(1) == 'emails')?'active':''}}">
                            <i class="fa fa-mail-bulk"></i>{{__('E-mail Marketing')}}
                        </a>
                    </li>
                @endif
                @if ( Auth::user()->name == 'Admin')
                <li class="nav-item">
                        
                    <a href="{{route('intake.index')}}" class="nav-link {{ (Request::route()->getName() == 'intake.index') ? ' active' : '' }}">
                        <i class="fas fa-sliders-h"></i>Intake Form
                    </a>
                </li> 
                @else

                <li class="nav-item">
                        
                    <a href="{{route('intake')}}" class="nav-link {{ (Request::route()->getName() == 'intake') ? ' active' : '' }}">
                        <i class="fas fa-sliders-h"></i>Intake Form
                    </a>
                </li> 

                @endif
                <!-- @if(Gate::check('manage proposal'))
                    <li class="nav-item">
                        <a href="{{ route('proposal.index') }}" class="nav-link {{ (Request::segment(1) == 'proposal')?'active':''}}">
                            <i class="fas fa-receipt"></i>{{__('Proposal')}}
                        </a>
                    </li>
                @endif -->
                @if( Gate::check('manage bank account') ||  Gate::check('manage transfer'))
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer')?' active':'collapsed'}}" href="#navbar-banking" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer')?'true':'false'}}" aria-controls="navbar-banking">
                            <i class="fas fa-university"></i>{{__('Banking')}}
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'bank-account' || Request::segment(1) == 'transfer')?'show':''}}" id="navbar-banking">
                            <ul class="nav flex-column submenu-ul">
                                @can('manage bank account')
                                    <li class="nav-item {{ (Request::route()->getName() == 'bank-account.index' || Request::route()->getName() == 'bank-account.create' || Request::route()->getName() == 'bank-account.edit') ? ' active' : '' }}">
                                        <a href="{{ route('bank-account.index') }}" class="nav-link">{{ __('Account') }}</a>
                                    </li>
                                @endcan
                                {{-- @can('manage transfer')
                                    <li class="nav-item {{ (Request::route()->getName() == 'transfer.index' || Request::route()->getName() == 'transfer.create' || Request::route()->getName() == 'transfer.edit') ? ' active' : '' }}">
                                        <a href="{{route('transfer.index')}}" class="nav-link">{{ __('Transfer') }}</a>
                                    </li>
                                @endcan --}}
                            </ul>
                        </div>
                    </li>
                @endif

                @if( Gate::check('manage invoice') ||  Gate::check('manage revenue') ||  Gate::check('manage credit note'))
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note')?' active':'collapsed'}}" href="#navbar-income" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note')?'true':'false'}}" aria-controls="navbar-income">
                            <i class="fas fa-money-bill-alt"></i>{{__('Income')}}
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'invoice' || Request::segment(1) == 'revenue' || Request::segment(1) == 'credit-note')?'show':''}}" id="navbar-income">
                            <ul class="nav flex-column submenu-ul">
                                @can('manage invoice')
                                    <li class="nav-item {{ (Request::route()->getName() == 'invoice.index' || Request::route()->getName() == 'invoice.create' || Request::route()->getName() == 'invoice.edit' || Request::route()->getName() == 'invoice.show') ? ' active' : '' }}">
                                        <a href="{{ route('invoice.index') }}" class="nav-link">{{ __('Invoice') }}</a>
                                    </li>
                                @endcan
                                @can('manage revenue')
                                {{--  
                                    <li class="nav-item {{ (Request::route()->getName() == 'revenue.index' || Request::route()->getName() == 'revenue.create' || Request::route()->getName() == 'revenue.edit') ? ' active' : '' }}">
                                        <a href="{{route('revenue.index')}}" class="nav-link">{{ __('Revenue') }}</a>
                                    </li>
                                --}}
                                @endcan
                                <!-- @can('manage credit note')
                                    <li class="nav-item {{ (Request::route()->getName() == 'credit.note' ) ? ' active' : '' }}">
                                        <a href="{{route('credit.note')}}" class="nav-link">{{ __('Credit Note') }}</a>
                                    </li>
                                @endcan -->
                            </ul>
                        </div>
                    </li>
                @endif

                @if( Gate::check('manage bill')  ||  Gate::check('manage payment') ||  Gate::check('manage debit note'))
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'bill' || Request::segment(1) == 'payment' || Request::segment(1) == 'debit-note'  )?' active':'collapsed'}}" href="#navbar-expense" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'bill' || Request::segment(1) == 'payment' || Request::segment(1) == 'debit-note'  )?'true':'false'}}" aria-controls="navbar-expense">
                            <i class="fas fa-money-bill-wave-alt"></i>{{__('Expense')}}
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'bill' || Request::segment(1) == 'payment' || Request::segment(1) == 'debit-note'  )?'show':''}}" id="navbar-expense">
                            <ul class="nav flex-column submenu-ul">
                                @can('manage bill')
                                    <li class="nav-item {{ (Request::route()->getName() == 'bill.index' || Request::route()->getName() == 'bill.create' || Request::route()->getName() == 'bill.edit' || Request::route()->getName() == 'bill.show') ? ' active' : '' }}">
                                        <a href="{{ route('bill.index') }}" class="nav-link">{{ __('Bill') }}</a>
                                    </li>
                                @endcan
                                @can('manage payment')
                                    <li class="nav-item {{ (Request::route()->getName() == 'payment.index' || Request::route()->getName() == 'payment.create' || Request::route()->getName() == 'payment.edit') ? ' active' : '' }}">
                                        <a href="{{route('payment.index')}}" class="nav-link">{{ __('Payment') }}</a>
                                    </li>
                                @endcan
                               <!--  @can('manage debit note')
                                    <li class="nav-item {{ (Request::route()->getName() == 'debit.note' ) ? ' active' : '' }}">
                                        <a href="{{route('debit.note')}}" class="nav-link">{{ __('Debit Note') }}</a>
                                    </li>
                                @endcan -->
                            </ul>
                        </div>
                    </li>
                @endif
                 <!--
                @if( Gate::check('manage chart of account') ||  Gate::check('manage journal entry') ||   Gate::check('balance sheet report') ||  Gate::check('ledger report') ||  Gate::check('trial balance report'))
                    
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'chart-of-account' || Request::segment(1) == 'journal-entry' || Request::segment(2) == 'ledger' ||  Request::segment(2) == 'balance-sheet' ||  Request::segment(2) == 'trial-balance')?' active':'collapsed'}}" href="#navbar-double-entry" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'bill' )?'true':'false'}}" aria-controls="navbar-double-entry">
                            <i class="fas fa-balance-scale"></i>{{__('Double Entry')}}
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'chart-of-account'  || Request::segment(1) == 'journal-entry' || Request::segment(2) == 'ledger' ||  Request::segment(2) == 'balance-sheet' ||  Request::segment(2) == 'trial-balance')?'show':''}}" id="navbar-double-entry">
                            <ul class="nav flex-column submenu-ul">
                                @can('manage chart of account')
                                    <li class="nav-item {{ (Request::route()->getName() == 'chart-of-account.index') ? ' active' : '' }}">
                                        <a href="{{ route('chart-of-account.index') }}" class="nav-link">{{ __('Chart of Accounts') }}</a>
                                    </li>
                                @endcan
                                @can('manage journal entry')
                                    {{-- <li class="nav-item {{ (Request::route()->getName() == 'journal-entry.index' || Request::route()->getName() == 'journal-entry.show') ? ' active' : '' }}">
                                        <a href="{{ route('journal-entry.index') }}" class="nav-link">{{ __('Journal Account') }}</a>
                                    </li> --}}
                                @endcan
                                @can('ledger report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.ledger' ) ? ' active' : '' }}">
                                        <a href="{{route('report.ledger')}}" class="nav-link">{{ __('Ledger Summary') }}</a>
                                    </li>
                                @endcan
                                @can('balance sheet report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.balance.sheet' ) ? ' active' : '' }}">
                                        <a href="{{route('report.balance.sheet')}}" class="nav-link">{{ __('Balance Sheet') }}</a>
                                    </li>
                                @endcan

                                @can('trial balance report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'trial.balance' ) ? ' active' : '' }}">
                                        <a href="{{route('trial.balance')}}" class="nav-link">{{ __('Trial Balance') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endif
                    -->
                @if(Gate::check('manage goal'))
                    <li class="nav-item">
                        <a href="{{ route('projects.index') }}" class="nav-link {{ (Request::segment(1) == 'projects')?'active':''}}">
                            <i class="fas fa-layer-group"></i>{{__('Projects')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        @if(\Auth::guard('customer')->check())
                            {{-- <a href="{{route('customer.tasks')}}" class="nav-link {{ (Request::route()->getName() == 'customer.tasks') ? ' active' : '' }}">
                                <i class="fas fa-fire"></i>{{__('Tasks')}}
                            </a> --}}
                        @elseif(\Auth::guard('vender')->check())
                            {{-- <a href="{{route('vender.tasks')}}" class="nav-link {{ (Request::route()->getName() == 'vender.tasks') ? ' active' : '' }}">
                                <i class="fas fa-fire"></i>{{__('Tasks')}}
                            </a> --}}
                        @else
                            <a href="{{route('tasks.index')}}" class="nav-link {{ (Request::route()->getName() == 'tasks') ? ' active' : '' }}">
                                <i class="fas fa-fire"></i>{{__('Tasks')}}
                            </a>
                        @endif
                    </li>
                                      
                    <!--<li class="nav-item">-->
                    <!--    <a href="{{ route('goal.index') }}" class="nav-link {{ (Request::segment(1) == 'goal')?'active':''}}">-->
                    <!--        <i class="fas fa-bullseye"></i>{{__('Goal')}}-->
                    <!--    </a>-->
                    <!--</li>-->
                @endif
                <!-- @if(Gate::check('manage assets'))
                    <li class="nav-item">
                        <a href="{{ route('account-assets.index') }}" class="nav-link {{ (Request::segment(1) == 'account-assets')?'active':''}}">
                            <i class="fas fa-calculator"></i>{{__('Assets')}}
                        </a>
                    </li>
                @endif -->

                {{--  
                @if( Gate::check('income report') || Gate::check('expense report') || Gate::check('income vs expense report') || Gate::check('tax report')  || Gate::check('loss & profit report') || Gate::check('invoice report') || Gate::check('bill report') || Gate::check('invoice report') ||  Gate::check('manage transaction')||  Gate::check('statement report'))
                    <li class="nav-item">
                        <a class="nav-link {{ ((Request::segment(1) == 'report' || Request::segment(1) == 'transaction') &&  Request::segment(2) != 'ledger' &&  Request::segment(2) != 'balance-sheet' &&  Request::segment(2) != 'trial-balance')?' active':'collapsed'}}" href="#navbar-reports" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'report' || Request::segment(1) == 'transaction')?'true':'false'}}" aria-controls="navbar-reports">
                            <i class="fas fa-chart-area"></i>{{__('Report')}}
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ ((Request::segment(1) == 'report' || Request::segment(1) == 'transaction') &&  Request::segment(2) != 'ledger' &&  Request::segment(2) != 'balance-sheet' &&  Request::segment(2) != 'trial-balance')?'show':''}}" id="navbar-reports">
                            <ul class="nav flex-column submenu-ul">
                                @can('manage transaction')
                                    <li class="nav-item {{ (Request::route()->getName() == 'transaction.index' || Request::route()->getName() == 'transfer.create' || Request::route()->getName() == 'transaction.edit') ? ' active' : '' }}">
                                        <a href="{{ route('transaction.index') }}" class="nav-link">{{ __('Transaction') }}</a>
                                    </li>
                                @endcan
                                @can('statement report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.account.statement') ? ' active' : '' }}">
                                        <a href="{{route('report.account.statement')}}" class="nav-link">{{ __('Account Statement') }}</a>
                                    </li>
                                @endcan
                                @can('income report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.income.summary' ) ? ' active' : '' }}">
                                        <a href="{{route('report.income.summary')}}" class="nav-link">{{ __('Income Summary') }}</a>
                                    </li>
                                @endcan
                                @can('expense report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.expense.summary' ) ? ' active' : '' }}">
                                        <a href="{{route('report.expense.summary')}}" class="nav-link">{{ __('Expense Summary') }}</a>
                                    </li>
                                @endcan
                                @can('income vs expense report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.income.vs.expense.summary' ) ? ' active' : '' }}">
                                        <a href="{{route('report.income.vs.expense.summary')}}" class="nav-link">{{ __('Income VS Expense') }}</a>
                                    </li>
                                @endcan
                                <!-- @can('tax report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.tax.summary' ) ? ' active' : '' }}">
                                        <a href="{{route('report.tax.summary')}}" class="nav-link">{{ __('Tax Summary') }}</a>
                                    </li>
                                @endcan -->
                                @can('loss & profit report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.profit.loss.summary' ) ? ' active' : '' }}">
                                        <a href="{{route('report.profit.loss.summary')}}" class="nav-link">{{ __('Profit & Loss') }}</a>
                                    </li>
                                @endcan
                                @can('invoice report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.invoice.summary' ) ? ' active' : '' }}">
                                        <a href="{{route('report.invoice.summary')}}" class="nav-link">{{ __('Invoice Summary') }}</a>
                                    </li>
                                @endcan
                                @can('bill report')
                                    <li class="nav-item {{ (Request::route()->getName() == 'report.bill.summary' ) ? ' active' : '' }}">
                                        <a href="{{route('report.bill.summary')}}" class="nav-link">{{ __('Bill Summary') }}</a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endif
                --}}
                @if(Gate::check('manage constant tax') || Gate::check('manage constant category') ||Gate::check('manage constant unit') ||Gate::check('manage constant payment method') ||Gate::check('manage constant custom field') )
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type')?' active':'collapsed'}}" href="#navbar-constant" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) ==
                        'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type')?'true':'false'}}" aria-controls="navbar-constant">
                            <i class="fas fa-cog"></i>{{__('Constant')}}
                           <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'taxes' || Request::segment(1) == 'product-category' || Request::segment(1) == 'product-unit' || Request::segment(1) == 'payment-method' || Request::segment(1) == 'custom-field' || Request::segment(1) == 'chart-of-account-type')?'show':''}}" id="navbar-constant">
                            <ul class="nav flex-column submenu-ul">
                                @can('manage constant tax')
                                    <li class="nav-item {{ (Request::route()->getName() == 'taxes.index' ) ? ' active' : '' }}">
                                        <a href="{{ route('taxes.index') }}" class="nav-link">{{ __('Taxes') }}</a>
                                    </li>
                                @endcan
                                @can('manage constant category')
                                    <li class="nav-item {{ (Request::route()->getName() == 'product-category.index' ) ? 'active' : '' }}">
                                        <a href="{{route('product-category.index')}}" class="nav-link">{{ __('Category') }}</a>
                                    </li>
                                @endcan
                                @can('manage constant unit')
                                    <li class="nav-item {{ (Request::route()->getName() == 'product-unit.index' ) ? ' active' : '' }}">
                                        <a href="{{route('product-unit.index')}}" class="nav-link">{{ __('Unit') }}</a>
                                    </li>
                                @endcan
                                @can('manage constant custom field')
                                    {{-- <li class="nav-item {{ (Request::route()->getName() == 'custom-field.index' ) ? 'active' : '' }}">
                                        <a href="{{route('custom-field.index')}}" class="nav-link">{{ __('Custom Field') }}</a>
                                    </li> --}}
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endif
                @if(Gate::check('manage company settings'))
                    <!-- <li class="nav-item">
                        <a href="{{ route('company.setting') }}" class="nav-link {{ (Request::route()->getName() == 'systems.index') ? ' active' : '' }}">
                            <i class="fas fa-sliders-h"></i>{{__('Settings')}}
                        </a>
                    </li> -->
                @endif
                <!-- <li class="nav-item">
                        
                        <a href="{{route('staff.documents', ['staff_id' => auth()->user()->id, 'category' => 'document'])}}" class="nav-link {{ (Request::route()->getName() == 'staff.documents') ? ' active' : '' }}">
                            <i class="fas fa-sliders-h"></i>Documents
                        </a>
                </li> -->

               
                @if(Gate::check('manage goal'))
                <li class="nav-item">
                        
                    <a href="{{route('app-customization')}}" class="nav-link {{ (Request::route()->getName() == 'app-customization') ? ' active' : '' }}">
                        <i class="fas fa-cog"></i>Customization
                    </a>
                
                </li>
                
{{--                     
                    <li class="nav-item">
                        <a href="{{ route('tickets.index') }}" class="nav-link {{ (Request::segment(1) == 'tickets')?'active':''}}">
                            <i class="fas fa-headset"></i>{{__('Support')}}
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::segment(1) == 'departments' || Request::segment(1) == 'services' || Request::segment(2) == 'redefined-replies' ||  Request::segment(2) == 'ticketpriorities' ||  Request::segment(2) == 'ticketstatuses')?' active':'collapsed'}}" href="#navbar-support-setting" data-toggle="collapse" role="button" aria-expanded="{{ (Request::segment(1) == 'bill' )?'true':'false'}}" aria-controls="navbar-support-setting">
                            <i class="fas fa-cog"></i>{{__('Support Settings')}}
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <div class="collapse {{ (Request::segment(1) == 'departments'  || Request::segment(1) == 'services' || Request::segment(2) == 'redefined-replies' ||  Request::segment(2) == 'ticketpriorities' ||  Request::segment(2) == 'ticketstatuses')?'show':''}}" id="navbar-support-setting">
                            <ul class="nav flex-column submenu-ul">
                                <li class="nav-item {{ (Request::segment(1) == 'departments')?'active':''}}">
                                    <a href="{{ route('departments.index') }}" class="nav-link">
                                        {{__('Departments')}}
                                    </a>
                                </li>
                                <li class="nav-item {{ (Request::segment(1) == 'services')?'active':''}}">
                                    <a href="{{ route('services.index') }}" class="nav-link">
                                        {{__('Services')}}
                                    </a>
                                </li>
                                <li class="nav-item {{ (Request::segment(1) == 'predefined-replies')?'active':''}}">
                                    <a href="{{ route('predefined-replies.index') }}" class="nav-link">
                                        {{__('Predefined Replies')}}
                                    </a>
                                </li>
            
                                <li class="nav-item {{ (Request::segment(1) == 'ticketpriorities')?'active':''}}">
                                    <a href="{{ route('ticketpriorities.index') }}" class="nav-link">
                                        {{__('Ticket Priorities')}}
                                    </a>
                                </li>
                                <li class="nav-item {{ (Request::segment(1) == 'ticketstatuses')?'active':''}}">
                                    <a href="{{ route('ticketstatuses.index') }}" class="nav-link">
                                        {{__('Ticket Statuses')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                     --}}
                    @if ( Auth::user()->name == 'Admin')
                    <li class="nav-item">
                        <a href="{{ route('plans.index') }}" class="nav-link {{ (Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'plans.create' || Request::route()->getName() == 'plans.edit') ? ' active' : '' }}">
                            <i class="fas fa-file"></i>{{__('Account Plans') }}
                        </a>
                    </li>
                    {{--  
                    <li class="nav-item">
                        <a href="{{ route('blogs.index') }}" class="nav-link {{ (Request::route()->getName() == 'blogs.index' || Request::route()->getName() == 'blogs.create' || Request::route()->getName() == 'blogs.edit') ? ' active' : '' }}">
                            <i class="fas fa-file"></i>{{__('Blogs') }}
                        </a>
                    </li>
                    --}}

                    @else

                    <li class="nav-item">
                        <a href="{{ route('subscription.plans') }}" class="nav-link {{ (Request::route()->getName() == 'plans.index' || Request::route()->getName() == 'plans.create' || Request::route()->getName() == 'plans.edit') ? ' active' : '' }}">
                            <i class="fas fa-file"></i>{{__('Account Plans') }}
                        </a>
                    </li>

                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>

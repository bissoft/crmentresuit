<div class="card bg-none card-box">
    {{Form::open(array('url'=>'customer','method'=>'post', 'enctype' => 'multipart/form-data'))}}
    <h5 class="sub-title">{{__('Basic Info')}}</h5>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('name',__('Name'),array('class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('contact',__('Contact'),['class'=>'form-control-label'])}}
                <div class="form-icon-user">
                    <span><i class="fas fa-mobile-alt"></i></span>
                    {{Form::text('contact',null,array('class'=>'form-control','required'=>'required'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('gender',__('Gender'),['class'=>'form-control-label'])}}
                <select name="gender" class="form-control select2" id="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Fe Male</option>
                </select>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('email',__('Email'),['class'=>'form-control-label'])}}
                <div class="form-icon-user">
                    <span><i class="fas fa-envelope"></i></span>
                    {{Form::text('email',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('password',__('Password'),['class'=>'form-control-label'])}}
                <div class="form-icon-user">
                    <span><i class="fas fa-key"></i></span>
                    {{Form::password('password',array('class'=>'form-control','required'=>'required','minlength'=>"6"))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('office_shift',__('Office Shift'),['class'=>'form-control-label'])}}
                <select name="office_shift" class="form-control select2" id="office_shift" required>
                    <option value="morning-shift">Morning Shift</option>
                    <option value="evenng-shift">Evening Shift</option>
                    <option value="night-shift">Night Shift</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('role',__('Role'),['class'=>'form-control-label'])}}
                <select name="role" class="form-control select2" id="role" required>
                    @foreach ($roles as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('departments',__('Departments'),['class'=>'form-control-label'])}}
                <select name="departments" class="form-control select2" id="departments" required>
                    @foreach ($departments as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('designation',__('Designation'),['class'=>'form-control-label'])}}
                <select name="designation" class="form-control select2" id="designation" required>
                    @foreach ($designations as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                <div class="form-group" style="border:1px solid #ccc;height: 150px;padding:10px; text-align: center;">
                    <label style="display: block;">Profile Picture:</label>
                    <input name="profile_picture" type="file">
                </div>
            </div>
        </div>

        @if(!$customFields->isEmpty())
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="tab-pane fade show" id="tab-2" role="tabpanel">
                    @include('customFields.formBuilder')
                </div>
            </div>
        @endif
    </div>

    <h5 class="sub-title">{{__('Billing Address')}}</h5>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_name',__('Name'),array('class'=>'','class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{Form::text('billing_name',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_country',__('Country'),array('class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-flag"></i></span>
                    {{Form::text('billing_country',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_state',__('State'),array('class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-chess-pawn"></i></span>
                    {{Form::text('billing_state',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_city',__('City'),array('class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-city"></i></span>
                    {{Form::text('billing_city',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_phone',__('Phone'),array('class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-mobile-alt"></i></span>
                    {{Form::text('billing_phone',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('billing_zip',__('Zip Code'),array('class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-crosshairs"></i></span>
                    {{Form::text('billing_zip',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('billing_address',__('Address'),array('class'=>'form-control-label')) }}
                <div class="input-group">
                    {{Form::textarea('billing_address',null,array('class'=>'form-control','rows'=>3))}}
                </div>
            </div>
        </div>
    </div>

    @if(Utility::getValByName('shipping_display')=='on')
        <div class="col-md-12 text-right">
            <input type="button" id="billing_data" value="{{__('Shipping Same As Billing')}}" class="btn-create badge-blue">
        </div>
        <h4 class="sub-title">{{__('Shipping Address')}}</h4>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    {{Form::label('shipping_name',__('Name'),array('class'=>'form-control-label')) }}
                    <div class="form-icon-user">
                        <span><i class="fas fa-address-card"></i></span>
                        {{Form::text('shipping_name',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    {{Form::label('shipping_country',__('Country'),array('class'=>'form-control-label')) }}
                    <div class="form-icon-user">
                        <span><i class="fas fa-flag"></i></span>
                        {{Form::text('shipping_country',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    {{Form::label('shipping_state',__('State'),array('class'=>'form-control-label')) }}
                    <div class="form-icon-user">
                        <span><i class="fas fa-chess-pawn"></i></span>
                        {{Form::text('shipping_state',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    {{Form::label('shipping_city',__('City'),array('class'=>'form-control-label')) }}
                    <div class="form-icon-user">
                        <span><i class="fas fa-city"></i></span>
                        {{Form::text('shipping_city',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    {{Form::label('shipping_phone',__('Phone'),array('class'=>'form-control-label')) }}
                    <div class="form-icon-user">
                        <span><i class="fas fa-mobile-alt"></i></span>
                        {{Form::text('shipping_phone',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group">
                    {{Form::label('shipping_zip',__('Zip Code'),array('class'=>'form-control-label')) }}
                    <div class="form-icon-user">
                        <span><i class="fas fa-crosshairs"></i></span>
                        {{Form::text('shipping_zip',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::label('shipping_address',__('Address'),array('class'=>'form-control-label')) }}
                    <label class="form-control-label" for="example2cols1Input"></label>
                    <div class="input-group">
                        {{Form::textarea('shipping_address',null,array('class'=>'form-control','rows'=>3))}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="col-md-12 px-0">
        <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
        <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
    </div>

    {{Form::close()}}
</div>

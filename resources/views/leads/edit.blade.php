<div class="card bg-none card-box">
    {{ Form::model($lead, array('route' => array('leads.update', $lead->id), 'method' => 'PUT')) }}
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
                    <option value="male" @if($lead->gender == 'male') selected @endif>Male</option>
                    <option value="female" @if($lead->gender == 'female') selected @endif >Fe Male</option>
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
            {{ Form::label('lead_soucre', __('Lead Source'),['class'=>'form-control-label']) }}
            {{ Form::select('source_id', $sources, null, ['placeholder' => 'Pick a Lead Source...', 'class' => 'form-control select2']) }}
            @error('source_id')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('Status', __('Status'),['class'=>'form-control-label']) }}
            {{ Form::select('status_id', $statuses, null, ['placeholder' => 'Pick a Lead Status...', 'class' => 'form-control select2']) }}
            @error('status')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('Company Name', __('Company Name'),['class'=>'form-control-label']) }}
            {{ Form::text('company_name', null, array('class' => 'form-control','required'=>'required')) }}
            @error('company_name')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('Position', __('Position'),['class'=>'form-control-label']) }}
            {{ Form::text('position', null, array('class' => 'form-control','required'=>'required')) }}
            @error('position')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('phone', __('Mobile phone'),['class'=>'form-control-label']) }}
            {{ Form::text('phone', null, array('class' => 'form-control','required'=>'required')) }}
            @error('phone')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('land_line', __('Land Line'),['class'=>'form-control-label']) }}
            {{ Form::text('land_line', null, array('class' => 'form-control','required'=>'required')) }}
            @error('land_line')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
          

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('website', __('Website'),['class'=>'form-control-label']) }}
            {{ Form::text('website', null, array('class' => 'form-control','required'=>'required')) }}
            @error('website')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('country', __('country'),['class'=>'form-control-label']) }}
            {{ Form::text('country', null, array('class' => 'form-control','required'=>'required')) }}
            @error('country')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>


        <div class="form-group col-md-12">
            {{ Form::label('description', __('Memo'),['class'=>'form-control-label']) }}
            {{ Form::textarea('description', null, array('class' => 'form-control','required'=>'required')) }}
            @error('description')
            <small class="invalid-rate" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="col-md-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>

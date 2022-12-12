<div class="card bg-none card-box">
    {{ Form::open(array('url' => 'leads')) }}
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('name', __('Lead Name'),['class'=>'form-control-label']) }}
            {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
            @error('name')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('lead_soucre', __('Lead Source'),['class'=>'form-control-label']) }}
            {{ Form::select('source_id', $sources, null, ['placeholder' => 'Pick a Lead Source...', 'class' => 'form-control']) }}
            @error('source_id')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('Company Name', __('Company Name'),['class'=>'form-control-label']) }}
            {{ Form::text('company_name', '', array('class' => 'form-control','required'=>'required')) }}
            @error('company_name')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('Position', __('Position'),['class'=>'form-control-label']) }}
            {{ Form::text('position', '', array('class' => 'form-control','required'=>'required')) }}
            @error('position')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('Status', __('Status'),['class'=>'form-control-label']) }}
            {{ Form::select('status_id', $statuses, null, ['placeholder' => 'Pick a Lead Status...', 'class' => 'form-control']) }}
            @error('status')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('Estimate Budget', __('Estimate Budget'),['class'=>'form-control-label']) }}
            {{ Form::text('estimate_budget', '', array('class' => 'form-control','required'=>'required')) }}
            @error('estimate_budget')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('member', __('Member'),['class'=>'form-control-label']) }}
            {{ Form::select('member_id', $members, null, ['placeholder' => 'Pick a Lead Member...', 'class' => 'form-control']) }}
            @error('member')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('phone', __('Phone'),['class'=>'form-control-label']) }}
            {{ Form::text('phone', '', array('class' => 'form-control','required'=>'required')) }}
            @error('phone')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('website', __('Website'),['class'=>'form-control-label']) }}
            {{ Form::text('website', '', array('class' => 'form-control','required'=>'required')) }}
            @error('website')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            {{ Form::label('country', __('country'),['class'=>'form-control-label']) }}
            {{ Form::text('country', '', array('class' => 'form-control','required'=>'required')) }}
            @error('country')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>


        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'),['class'=>'form-control-label']) }}
            {{ Form::textarea('description', '', array('class' => 'form-control','required'=>'required')) }}
            @error('description')
            <small class="invalid-rate" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="col-md-12 ">
            <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>

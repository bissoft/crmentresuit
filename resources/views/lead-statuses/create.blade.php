<div class="card bg-none card-box">
    {{ Form::open(array('url' => 'lead-status')) }}
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('name', __('Lead Status Name'),['class'=>'form-control-label']) }}
            {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
            @error('name')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('color', __('Color'),['class'=>'form-control-label']) }}
            {{ Form::color('color', '', array('class' => 'form-control','required'=>'required')) }}
            @error('color')
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

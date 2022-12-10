<div class="card bg-none card-box">
    {{ Form::model($contractType, array('route' => array('contract-types.update', $contractType->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('name', __('Name'),['class'=>'form-control-label']) }}
            {{ Form::text('name', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'),['class'=>'form-control-label']) }}
            {{ Form::textarea('description', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
        <div class="col-md-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>

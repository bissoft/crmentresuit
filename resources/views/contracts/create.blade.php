<div class="card bg-none card-box">
    {{ Form::open(array('url' => 'contracts')) }}
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('name', __('Name'),['class'=>'form-control-label']) }}
            {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                {{ Form::label('contract_type', __('Contract Type'),['class'=>'form-control-label']) }}
                <Select name="contract_type" class="form-control select2" required>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </Select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="customer" class="form-control-label">Customer</label>
            <Select name="customer_id" class="form-control select2" required>
                @foreach ($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group col-md-6">
            <label for="contract_value" class="form-control-label">Contract Value</label>
            <input type="text" name="contract_value" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="start_date" class="form-control-label">Contract Value</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="end_date" class="form-control-label">Contract Value</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'),['class'=>'form-control-label']) }}
            {{ Form::textarea('description', '', array('class' => 'form-control','required'=>'required')) }}
        </div>
        <div class="col-md-12">
            <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>

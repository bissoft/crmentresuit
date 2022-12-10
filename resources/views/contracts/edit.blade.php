<div class="card bg-none card-box">
    {{ Form::model($contract, array('route' => array('contracts.update', $contract->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('name', __('Name'),['class'=>'form-control-label']) }}
            <input type="text" name="name" value="{{$contract->name}}" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                {{ Form::label('contract_type', __('Contract Type'),['class'=>'form-control-label']) }}
                <Select name="contract_type" class="form-control select2" required>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" @if($contract->contract_type == $type->id) selected @endif>{{$type->name}}</option>
                    @endforeach
                </Select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="customer" class="form-control-label">Customer</label>
            <Select name="customer_id" class="form-control select2" required>
                @foreach ($customers as $customer)
                <option value="{{$customer->id}}" @if($contract->customer_id == $customer->id) selected @endif>{{$customer->name}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group col-md-6">
            <label for="contract_value" class="form-control-label">Contract Value</label>
            <input type="text" name="contract_value" value="{{$contract->contract_value}}" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="start_date" class="form-control-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{$contract->start_date}}">
        </div>
        <div class="form-group col-md-6">
            <label for="end_date" class="form-control-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{$contract->end_date}}">
        </div>

        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'),['class'=>'form-control-label']) }}
            {{ Form::textarea('description', $contract->description, array('class' => 'form-control','required'=>'required')) }}
        </div>
        <div class="col-md-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>

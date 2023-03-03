<div class="card bg-none card-box">
    {{ Form::open(array('url' => 'contracts','enctype'=>'multipart/form-data')) }}
    <div class="row">
        <div class="form-group col-md-6">
            <label for="customer" class="form-control-label">Contract Name</label>
            <Select name="customer_id" class="form-control select2" id="customer_id" required>
                @foreach ($lead as $lead)
                    <option value="{{$lead->id}}">{{$lead->name}}</option>
                @endforeach
            </Select>
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('name', __('Company Name'),['class'=>'form-control-label']) }}
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
            {{ Form::label('email', __('Email Address'),['class'=>'form-control-label']) }}
            {{ Form::text('email', '', array('id'=>'email','class' => 'form-control','required'=>'required')) }}
        </div>
        
        <div class="form-group col-md-12">
            <label for="contract_docs" class="form-control-label">Upload Documents</label>
            <input type="file" name="contract_docs" class="uploade_docs form-control">
        </div>
        <div class="form-group col-md-12">
            <label for="contract_value" class="form-control-label">Subject Line</label>
            <textarea  name="contract_value" rows="3" class="form-control"> </textarea>
        </div>
        {{-- <div class="form-group col-md-6">
            <label for="contract_value" class="form-control-label">Contract Value</label>
            <input type="text" name="contract_value" class="form-control">
        </div> --}}
        {{-- <div class="form-group col-md-6">
            <label for="start_date" class="form-control-label">Start Date</label>
            <input type="date" name="start_date" id="from-date" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="end_date" class="form-control-label">End  Date</label>
            <input type="date" name="end_date" id="to-date" class="form-control">
        </div> --}}

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
<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
   
   $(document).on("change","#customer_id",function(){
            var _el = $(this);
            var id = _el.val();
            $.get('get-lead/' + id , function (data) {
                console.log(data);
                // $('#userShowModal').html("User Details");
                // $('#ajax-modal').modal('show');
                $('#user_id').val(data.id);
                $('#name').val(data.company_name);
                $('#email').val(data.email);
            })
   
        });
   
  });
    $(document).on('change', '#to-date', function () {
        var from = $("#from-date").val();
        var to = $("#to-date").val();

        if(Date.parse(from) > Date.parse(to)){
        alert("Invalid Date Range");
        }
    });

</script>

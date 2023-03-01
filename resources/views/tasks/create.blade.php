<div class="card bg-none card-box">
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name <span class="required">*</span> </label>
                    <input type="text" class="form-control" name="name" value="">
                    <div class="invalid-feedback"></div>
                </div>
               
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status <span class="required">*</span> </label>
                    <select class="form-select form-control select2" name="status" id="status">
                        <option value="In progress">In progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
               
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="customer_id">Project <span class="required">*</span></label>
                    <select name="project_id" class='form-control select2'>
                        <option value="">Select</option>
                        @foreach ($customers as $customer)
                        <option value="{{$customer->id}}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Start Date <span class="required">*</span> </label>
                    <input type="date" class="form-control" name="start_date" value="">
                    <div class="invalid-feedback"></div>
                </div>
               
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>End Date <span class="required">*</span> </label>
                    <input type="date" class="form-control" name="end_date" value="">
                    <div class="invalid-feedback"></div>
                </div>
               
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Description <span class="required">*</span> </label>
                    <textarea name="description" id="description" cols="30" class="form-control" rows="10"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
               
            </div>
            

            <div class="col-md-12">
                <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
                <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>


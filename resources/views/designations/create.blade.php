<div class="card bg-none card-box">
    <form action="{{route('designations.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Department<span class="required">*</span></label>
                    <select name="department_id" id="department_id" class="form-control select2">
                        @foreach ($departments as $item)
                        <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block email"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Designation Name <span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="name" autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description<span class="required">*</span></label>
                    <textarea name="description" id="" cols="30" rows="7" class="form-control"></textarea>
                    <div class="invalid-feedback d-block email"></div>
                </div>
            </div>

            <div class="col-md-12">
                <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
                <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>

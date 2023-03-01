<div class="card bg-none card-box">
    <form action="{{route('departments.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="name" autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                    </div>
                </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Department Head <span class="required">*</span></label>
                    <select name="head_id" id="head_id" class="form-control select2">
                        @foreach ($heads as $item)
                        <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block email"></div>
                </div>
            </div>
            <div class="col-md-12">
                 <div class="form-group">
                    <label>Department Email <span class="required">*</span></label>
                    <input type="email" class="form-control form-control-sm" name="email" autocomplete="off">
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

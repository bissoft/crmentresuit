<div class="card bg-none card-box">
    <form action="{{route('docments.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Customer Name<span class="required">*</span></label>
                    <select name="customer_id" id="customer_id" class="form-control select2">
                        @foreach ($customers as $item)
                        <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block email"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Document Type<span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="document_type" id="document_type" autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Expiry Date<span class="required">*</span></label>
                    <input type="date" name="expiry_date" id="expiry_date" class="form-control form-control-sm">
                    </select>
                    <div class="invalid-feedback d-block email"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Document #<span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="document_number" autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                </div>
            </div>
            
            <div class="col-md-12 choose-file">
                <div class="form-group">
                    <label>Attachemnt<span class="required">*</span></label>
                    <input type="file" name="file" id="file">
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

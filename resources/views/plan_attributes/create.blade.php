<div class="card bg-none card-box">
    <form action="{{route('plan_attributes.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <input type="hidden" name="plan_id" value="{{ $plan_id }}">
            <div class="form-group col-md-6 mt-4">
                <div class="form-check">
                    <input class="form-check-input" name="included" type="checkbox" value="1" id="included" checked>
                    <label class="form-check-label" for="included">
                        Included
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
                <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>

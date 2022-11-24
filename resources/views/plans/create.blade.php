<div class="card bg-none card-box">
    <form action="{{route('plans.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Type</label>
                    <select class="form-control" name="type">
                        @php
                        $_type = old('type');
                        $types = ['monthly', 'yearly'];
                        @endphp
                        @foreach($types as $type)
                        <option value="{{ $type }}" @if($_type==$type) selected @endif>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Stripe Plan ID</label>
                    <input type="text" class="form-control" name="stripe_plan_id" value="{{ old('stripe_plan_id') }}">
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
                <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>

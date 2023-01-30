<div class="card bg-none card-box">
    <form action="{{ route('ticketpriorities.update', $ticketPriority) }}" method="POST" class="">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" value="{{$ticketPriority->name}}" name="name" autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                 </div>
                 <div class="form-group">
                    <label>Descritpion </label>
                    <textarea name="description" class="form-control form-control-sm" id="" cols="30" rows="10">{{$ticketPriority->description}}</textarea>
                 </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
                <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>
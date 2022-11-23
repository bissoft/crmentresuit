<div class="card bg-none card-box">
    <form action="{{ route('predefined-replies.update', $predefinedreply) }}" method="POST" class="">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Question <span class="required">*</span></label>
                    <input type="text" class="form-control form-control-sm" value="{{$predefinedreply->question}}" name="question"
                        autocomplete="off">
                    <div class="invalid-feedback d-block name"></div>
                </div>

                <div class="form-group">
                    <label>Answer <span class="required">*</span></label>
                    <textarea name="answer" id="answer" class="form-control" cols="30" rows="10">{{$predefinedreply->answer}}</textarea>
                    <div class="invalid-feedback d-block name"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
                <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>

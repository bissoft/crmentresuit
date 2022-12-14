<div class="card bg-none card-box">
    <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Subject <span class="required">*</span> </label>
                    <input type="text" class="form-control" name="subject"
                        value="{{ $ticket->subject }}">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group contact">
                    <label>Contact <span class="required">*</span></label>
                    <select name="customer_contact_id" class='form-control form-control-lg'>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}" @if ($ticket->customer_contact_id == $user->id) selected @endif>{{$user->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback d-block"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Department <span class="required">*</span></label>
                        <select name="department_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" selected="">Select</option>
                            @foreach ($departments as $item)
                            <option value="2" @if($ticket->department_id == $item->id) selected @endif>{{$item->name}}</option>
                            @endforeach                            
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>CC </label>
                        <input type="email" class="form-control"
                            name="email_cc" value="{{ $ticket->email_cc }}">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="group_id">Tag</label>
                    <div class="select2-wrapper">
                        <select name="tag_id[]" class='form-control select2-multiple'
                            multiple='multiple'>
                            <option value="4">Gas boiler 200 L</option>
                            <option value="2">Important</option>
                            <option value="3">SWH</option>
                            <option value="1">Tomorrow</option>
                        </select>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Assign ticket (default is current user) <span
                                class="required">*</span></label>
                        <select name="assigned_to" class='form-control selectpicker'>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}" @if ($ticket->assigned_to == $user->id) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status <span class="required">*</span></label>
                        <select name="ticket_status_id"
                            class='form-control selectPickerWithoutSearch'>
                            @foreach ($ticket_status as $item)
                            <option value="1" @if($ticket->ticket_status_id == $item->id) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Priority <span class="required">*</span></label>
                        <select name="ticket_priority_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" ">Select</option>
                            @foreach ($ticket_priority as $item)
                            <option value="1" @if($ticket->ticket_priority_id == $item->id) selected @endif >{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Service</label>
                        <select name="ticket_service_id"
                            class='form-control selectPickerWithoutSearch'>
                            <option value="" selected="selected">Select</option>
                            @foreach ($services as $item)
                            <option value="3" @if($ticket->ticket_service_id ==  $item->id) selected @endif >{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback d-block"></div>
                    </div>
                </div>



                <div class="form-group project_selection">
                    <label>Project</label>
                    <select name="project_id" class='form-control  project_id'>
                        @foreach ($projects as $project)
                        <option value="{{$project->id}}" @if($ticket->project_id == $project->id) selected @endif >{{$project->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback"></div>
                </div>


            </div>

            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Insert predefined reply</label>
                        <select name="pre_defined_replies_id"
                            class='form-control'>
                            <option value="">Select</option>
                            @foreach ($predefinedreply as $item)
                            <option value="{{$item->id}}" @if($ticket->pre_defined_replies_id == $item->id) selected @endif>{{$item->question}}</option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="form-group">
                    <textarea name="details" rows="4" id="details"  class="form-control">{{ $ticket->details }}</textarea>
                    <div class="invalid-feedback d-block"></div>
                </div>
            </div>

            <div class="col-md-12">
                <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
                <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
        </div>
    </form>
</div>
<script>
    $(document).on('change', 'select[name=pre_defined_replies_id]', function () {
        if (this.value) {
            get_predefined_content(this.value);
        }

    });

    function get_predefined_content($id) {
        $.post("{{route('predefined-reply')}}", {
                "_token": "{{csrf_token()}}",
                id: $id
            })
            .done(function (response) {
                if (response.status == 1) {
                    var content = $('#details').val(response.answer);
                    $('select[name=pre_defined_replies_id]').val(null).trigger("change");
                }

            });
    }
</script>
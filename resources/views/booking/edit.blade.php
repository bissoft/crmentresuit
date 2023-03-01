<div class="card bg-none card-box">
    <form action="{{ route('booking.update', $booking) }}" method="POST" >
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required=""
                        value="{{ old('title') ?? $booking->title }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from-date">Meeting Link</label>
                    <input type="text" name="meeting_link" class="form-control" value="{{ old('meeting_link') ?? $booking->meeting_link }}" placeholder="Meeting Link">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from-date">Start Date</label>
                    <input type="date" class="form-control" id="from-date" name="from_date" required=""
                        value="{{ old('from_date') ?? $booking->from_date }}">
                </div>
            </div>
            
            <div class="col-md-6 ">
                <div class="mb-3">
                    <label for="to-date">End Date</label>
                    <input type="date" class="form-control" id="to-date" name="to_date" required=""
                        value="{{ old('to_date') ?? $booking->to_date }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from">Start Time</label>
                    <input type="time" class="form-control" id="from" name="from" required=""
                        value="{{ old('from') ?? $booking->from }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="to">End Time</label>
                    <input type="time" class="form-control" id="to" name="to" required=""
                        value="{{ old('to') ?? $booking->to }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="to">Invite Email Addresses (<small>Enter New Email Comma Seprated</small>)</label>
                    <textarea class="form-control" name="email_addresses" id="emails" cols="30" rows="8">{{ old('email_addresses') ?? $booking->email_addresses }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="to">Invite Email</label>
                    <textarea class="form-control" name="invite_email" id="invite_email" cols="30" rows="8">{{ old('invite_email') ?? $booking->invite_email }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn-create badge-blue">Update</button>
            <button type="submit" class="btn-create bg-gray" data-dismiss="modal">Cancel</button>
        </div>
        <br>
    </form>

</div>
<script>
    $(document).on('change', '#to-date', function () {
        var from = $("#from-date").val();
        var to = $("#to-date").val();

        if(Date.parse(from) > Date.parse(to)){
        alert("Invalid Date Range");
        }
    });

    $(document).on('change', '#to', function () {
        var from = $("#from").val();
        var to = $("#to").val();

        if(Date.parse(from) > Date.parse(to)){
        alert("Invalid Date Range");
        }
    });

</script>

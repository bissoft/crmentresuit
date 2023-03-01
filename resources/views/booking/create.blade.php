<div class="card bg-none card-box">
    <form action="{{ route('booking.store') }}" method="POST" class="">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required=""
                        value="{{ old('title') }}" placeholder="Enter Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from-date">Meeting Link</label>
                    <input type="text" name="meeting_link" class="form-control" placeholder="Meeting Link">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from-date">Start Date</label>
                    <input type="date" class="form-control" id="from-date" name="from_date" 
                        value="{{ old('from_date') ?? \Carbon\Carbon::now()->toDateString() }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="to-date">End Date</label>
                    <input type="date" class="form-control" id="to-date" name="to_date" 
                        value="{{ old('to_date') ?? \Carbon\Carbon::now()->toDateString() }}" required>
                </div>
            </div>
            
           
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from">Start Time</label>
                    <input type="time" class="form-control" id="from" name="from" required=""
                        value="{{ old('from') ?? '09:00' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="to">End Time</label>
                    <input type="time" class="form-control" id="to" name="to" required=""
                        value="{{ old('to') ?? '11:00' }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="to">Invite Email Addresses (<small>Enter New Email Comma Seprated</small>)</label>
                    <textarea class="form-control" name="email_addresses" id="emails" cols="30" rows="8"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="to">Invite Email</label>
                    <textarea class="form-control" name="invite_email" id="invite_email" cols="30" rows="8">Thank you for scheduling a session with me!
Please view the details of this session below:
[SESSION NAME]
[DATE]
[TIME]
[LOCATION]
[Meeting Link]
[INSTRUCTIONS]
                    </textarea>
                </div>
            </div>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn-create badge-blue">Save & Send</button>
            <button type="submit" class="btn-create bg-gray" data-dismiss="modal">Cancel</button>
            <br>
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
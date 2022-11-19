<div class="card bg-none card-box">
    <form action="{{ route('booking.update', $booking) }}" method="POST" >
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required=""
                        value="{{ old('title') ?? $booking->title }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from-date">From Date</label>
                    <input type="date" class="form-control" id="from-date" name="from_date" required=""
                        value="{{ old('from_date') ?? $booking->from_date }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="to-date">To Date</label>
                    <input type="date" class="form-control" id="to-date" name="to_date" required=""
                        value="{{ old('to_date') ?? $booking->to_date }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from">From</label>
                    <input type="time" class="form-control" id="from" name="from" required=""
                        value="{{ old('from') ?? $booking->from }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="to">To</label>
                    <input type="time" class="form-control" id="to" name="to" required=""
                        value="{{ old('to') ?? $booking->to }}">
                </div>
            </div>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn-create badge-blue">Save</button>
            <button type="submit" class="btn-create bg-gray" data-dismiss="modal">Cancel</button>
        </div>
        <br>
    </form>

</div>

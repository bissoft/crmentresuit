<div class="card bg-none card-box">
    <form action="{{ route('booking.store') }}" method="POST" class="">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required=""
                        value="{{ old('title') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from-date">From Date</label>
                    <input type="date" class="form-control" id="from-date" name="from_date" required=""
                        value="{{ old('from_date') ?? \Carbon\Carbon::now()->toDateString() }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="to-date">To Date</label>
                    <input type="date" class="form-control" id="to-date" name="to_date" required=""
                        value="{{ old('to_date') ?? \Carbon\Carbon::now()->toDateString() }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="from">From</label>
                    <input type="time" class="form-control" id="from" name="from" required=""
                        value="{{ old('from') ?? '09:00' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="to">To</label>
                    <input type="time" class="form-control" id="to" name="to" required=""
                        value="{{ old('to') ?? '11:00' }}">
                </div>
            </div>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn-create badge-blue">Save</button>
            <button type="submit" class="btn-create bg-gray" data-dismiss="modal">Cancel</button>
            <br>
        </div>
        <br>
    </form>
</div>

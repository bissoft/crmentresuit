@extends('layouts.dashboard')

@section('content')

<div class="page-content">
    <!--end row-->
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('booking.index') }}"> Back</a>
    </div>
    <div class="row mt-5">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center mb-5">
                        <h5 class="mb-0 text-primary">Edit Bookings and Schedules</h5>

                    </div>
                    <form action="{{ route('booking.update', $booking) }}" method="POST" class="row g-3">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required="" value="{{ old('title') ?? $booking->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="from-date">From Date</label>
                                    <input type="date" class="form-control" id="from-date" name="from_date" required="" value="{{ old('from_date') ?? $booking->from_date }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="to-date">To Date</label>
                                    <input type="date" class="form-control" id="to-date" name="to_date" required="" value="{{ old('to_date') ?? $booking->to_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="from">From</label>
                                    <input type="time" class="form-control" id="from" name="from" required="" value="{{ old('from') ?? $booking->from }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="to">To</label>
                                    <input type="time" class="form-control" id="to" name="to" required="" value="{{ old('to') ?? $booking->to }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn theme_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection

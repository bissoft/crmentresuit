@extends('layouts.admin')
@section('page-title')
{{__('Manage Intake')}}
@endsection
@section('content')

<div class="page-content">
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('bookingSchedule') }}"> Back</a>
    </div>
    <!--end row-->
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <h6 class="mb-0 font-weight-bold">Schedule Information</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th>
                            Title:
                        </th>
                        <td>
                            {{ $booking->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Start Time:
                        </th>
                        <td>
                            {{ $booking->from_date . ' ' . $booking->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            End Time:
                        </th>
                        <td>
                            {{ $booking->to_date . ' ' . $booking->to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Meeting Link:
                        </th>
                        <td>
                            {{ $booking->meeting_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email Addresses:
                        </th>
                        <td>
                            {{ $booking->email_addresses }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Invite Email:
                        </th>
                        <td>
                            {!! nl2br($booking->invite_email) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

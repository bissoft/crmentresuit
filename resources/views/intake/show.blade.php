@extends('layouts.admin')
@section('page-title')
    {{__('Manage Intake')}}
@endsection
@section('content')

<div class="page-content">
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('intake.index') }}"> Back</a>
    </div>
    <!--end row-->
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <h6 class="mb-0 font-weight-bold">Intake Information</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th>
                            Client Name:
                        </th>
                        <td>
                            {{ $intake->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client Address:
                        </th>
                        <td>
                            {{ $intake->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client Phone:
                        </th>
                        <td>
                            {{ $intake->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client Email:
                        </th>
                        <td>
                            {{ $intake->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client Date of Birth:
                        </th>
                        <td>
                            {{ $intake->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client Emergency Contact:
                        </th>
                        <td>
                            {{ $intake->emergency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client Mailing Address (if different):
                        </th>
                        <td>
                            {{ $intake->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Client help you Question:
                        </th>
                        <td>
                            {{ $intake->help }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

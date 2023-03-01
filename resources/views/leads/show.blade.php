@extends('layouts.admin')
@section('page-title')
    {{__('Manage Leads')}}
@endsection
@section('content')

<div class="page-content">
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('leads.index') }}"> Back</a>
        <a class="btn btn-primary" href="{{ route('leadCampaign', $lead->id) }}">Send As Email Campaign</a>
    </div>
    <!--end row-->
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <h6 class="mb-0 font-weight-bold">Lead Information</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th>
                            Name:
                        </th>
                        <td>
                            {{ $lead->name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Source:
                        </th>
                        <td>
                            {{ $lead->source->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Company Name:
                        </th>
                        <td>
                            {{ $lead->company_name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Position:
                        </th>
                        <td>
                            {{ $lead->position }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Status:
                        </th>
                        <td>
                            {{ $lead->status->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Status Color:
                        </th>
                        <td style="background-color: {{$lead->status->color??''}}">
                            {{ $lead->status->color ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Email:
                        </th>
                        <td>
                            {{ $lead->email }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Phone:
                        </th>
                        <td>
                            {{ $lead->phone }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Website:
                        </th>
                        <td>
                            {{ $lead->website }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Country:
                        </th>
                        <td>
                            {{ $lead->country }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Description:
                        </th>
                        <td>
                            {{ $lead->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')
@section('page-title')
    {{__('Manage Projects')}}
@endsection
@section('content')

<div class="page-content">
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
    </div>
    <!--end row-->
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <h6 class="mb-0 font-weight-bold">Project Information</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th>
                            Name:
                        </th>
                        <td>
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Project Customer Name:
                        </th>
                        <td>
                            {{ $project->customer->name?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Project Start Date:
                        </th>
                        <td>
                            {{ $project->start_date ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Project Deadline Date:
                        </th>
                        <td>
                            {{ $project->dead_line ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Project Billing Type:
                        </th>
                        <td>
                            @if ($project->billing_type_id == 1)
                            Fixed Rate
                            @elseif($project->billing_type_id == 2)
                            Project Hours
                            @elseif($project->billing_type_id == 3)
                            Task Hours
                            @else
                                
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Project Status:
                        </th>
                        <td>
                            @if ($project->status_id == 1)
                            Not Started
                            @elseif($project->status_id == 2)
                            In Progress
                            @elseif($project->status_id == 3)
                            On Hold
                            @elseif($project->status_id == 4)
                            Cancelled
                            @elseif($project->status_id == 5)
                            Finished
                            @else
                                
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

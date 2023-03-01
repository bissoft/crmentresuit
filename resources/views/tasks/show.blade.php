@extends('layouts.admin')
@section('page-title')
{{__('Manage Task')}}
@endsection
@section('content')

<div class="page-content">
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
    </div>
    <!--end row-->
    <div class="card radius-10 mt-5">
        <div class="card-header bg-transparent">
            <h6 class="mb-0 font-weight-bold">Task Information</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <tbody>
                    <tr>
                        <th>
                            Name:
                        </th>
                        <td>
                            {{ $task->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Start Date:
                        </th>
                        <td>
                            {{ $task->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            End Date:
                        </th>
                        <td>
                            {{ $task->end_date  }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Task Status:
                        </th>
                        <td>
                            {{ $task->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Task Description:
                        </th>
                        <td>
                            {{ $task->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard')

@section('content')
<div class="page-content">
    <div class="card radius-10 mt-5">
        @if (Session::has('msg'))
        <div class="alert alert-{{Session('type')}} alert-dismissible fade show" role="alert">
            <strong>{!! Session('msg') !!}</strong>
        </div>
        @endif
        <div class="card-header bg-transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>Proposals</h5>
                </div>
                <div>
                    <a class="btn btn-dark pull-right" href="{{ route('proposals.create') }}">Add New</a>
                </div>
            </div>
        </div>
        <div class="table-responsive p-3">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Proposal #</th>
                        <th>Title</th>
                        <th>To</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Open Till</th>
                        <th>Tags</th>
                        <th>Date Created</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if($proposals->count())
                    @foreach($proposals as $proposal)
                    <tr>
                        <td>{{ $proposal->title }}</td>
                        <td>{{ $proposal->from_date }}</td>
                        <td>{{ $proposal->to_date }}</td>
                        <td>{{ $proposal->from }}</td>
                        <td>{{ $proposal->to }}</td>
                        <td>
                            <a href="{{ route('proposals.edit', $proposal) }}" class="" data-toggle="tooltip" title="Edit"><i
                                    class="bx bx-check"></i></a>
                            <a href="javascript:void(0)"
                                onclick="event.preventDefault();$(this).siblings('form').submit();" class="text-inverse"
                                title="Delete" data-toggle="tooltip"><i class="bx bx-trash"></i></a>
                            <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <td colspan="9" class="fw-bold text-center bg-primary text-wrap">No Proposals Found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection

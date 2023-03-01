@extends('layouts.admin')
@section('page-title')
{{__('View Contract')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('create goal')
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                <a href="{{route('staff.documents', ['staff_id' => auth()->user()->id, 'category' => 'document'])}}" class="btn btn-xs btn-white btn-icon-only width-auto">Documents</a>
                
            </div>
        @endcan
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="{{ route('contracts.index') }}" data-url="#" data-ajax-popup="false" data-title="{{__('Create New Contract')}}" class="btn btn-xs btn-white btn-icon-only width-auto">
            {{__('Back')}}
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(count($errors) > 0 )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('msg'))
        <div class="alert alert-{{Session('type')}} alert-dismissible fade show" role="alert">
            <strong>{!! Session('msg') !!}</strong>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row invoice-title mt-2">
                            <div class="col-xs-12 col-sm-12 col-nd-6 col-lg-6 col-12">
                                <h2>Contract</h2>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="font-w600 mb-2 d-flex justify-content-between"">
                                    <span class="custom-label-2">Contract Name: </span>
                                    <span class="font-w400">{{ $contract->name }}</span>
                                </p>
                                <p class="font-w600 mb-2 d-flex justify-content-between"">
                                    <span class="custom-label-2">Contract  Type: </span>
                                    <span class="font-w400">{{$contract->contractType->name ?? ""}}</span>
                                </p>
                                <p class="font-w600 mb-2 d-flex justify-content-between"">
                                    <span class="custom-label-2">Customer: </span>
                                    <span class="font-w400">{{$contract->customer->name ?? ""}}</span>
                                </p>
                                <p class="font-w600 mb-2 d-flex justify-content-between"">
                                    <span class="custom-label-2">Contract Value: </span>
                                    <span class="font-w400">{{$contract->contract_value}}</span>
                                </p>

                                <p class="font-w600 mb-2 d-flex justify-content-between"">
                                    <span class="custom-label-2">Contract Start Date: </span>
                                    <span class="font-w400">{{$contract->start_date}}</span>
                                </p>
                                <p class="font-w600 mb-2 d-flex justify-content-between"">
                                    <span class="custom-label-2">Contract End Date: </span>
                                    <span class="font-w400">{{$contract->end_date}}</span>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

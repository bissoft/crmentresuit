@extends('layouts.admin')
@section('page-title')
    {{__('Manage plan_attributes')}}
@endsection

@section('action-button')
    <div class="row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
            <div class="all-button-box">
                <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto" data-url="{{ route('plan_attributes.create') }}?plan_id={{$plan_id}}" data-ajax-popup="true" data-title="{{__('Create New plan')}}">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (Session::has('msg'))
                <div class="alert alert-{{Session('type')}} alert-dismissible fade show" role="alert">
                    <strong>{!! Session('msg') !!}</strong>
                </div>
                @endif
                <div class="card-body py-0">
                    
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr role="row">
                                <th>{{__('Name')}}</th>
                                <th>{{__('Plan')}}</th>
                                <th>{{__('Included')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($attributes as $attribute)
                                    <tr>
                                        <td>{{ $attribute->name }}</td>
                                        <td>{{ $attribute->plan->name }}</td>
                                        <td>{{ $attribute->included ? 'Yes' : 'No' }}</td>
                                        <td>
                                            
                                            <a href="#" class="edit-icon" data-size="2xl" data-url="{{ route('plan_attributes.edit', $attribute) . '?plan_id='.$plan_id }}" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                
                                            <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$attribute->id}}').submit();">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['plan_attributes.destroy',
                                                $attribute->id],'id'=>'delete-form-'.$attribute->id]) !!}
                                                {!! Form::close() !!}
                
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

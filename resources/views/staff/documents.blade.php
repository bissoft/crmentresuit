@extends('layouts.admin')
@section('content')

<div class="main_content_iner overly_inner ">
    <div class="container p-0 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_body pt-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <a href="{{ route('document.upload', $staff_id) }}" class="status_btn btn-primary">Upload Document</a>
                                <div class="table-responsive ">
                                    @if($documents->count())
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                   <th>Type</th>
                                                   <th>Sign</th>
                                                   <th>Download</th>
                                                   <th>Pages</th>
                                                   <th>Data Size</th>
                                                   <th>Upload Date</th>
                                                   <th>Expiry Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($documents as $document)
                                                    <tr>
                                                        <td><i class="fas fa-file-alt fa-2x"></i></td>
                                                        <td>
                                                            @if(!$document->signature)
                                                                <a href="{{route('document.modify',$document->id)}}"
                                                                   target="_blank">
                                                                    Sign<i class="fa fa-pencil"></i>
                                                                </a>
                                                            @else
                                                                <span class="text-success">Signed</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(!$document->signature)
                                                                <a href="{{asset('assets/files/documents/'.$document->file)}}"
                                                                   target="_blank" style="font-size: 15px">
                                                                    {{$document->name.'.'.$document->extension}}
                                                                </a>
                                                            @else
                                                                <a href="{{route('download.document.file',[$document->id,$document->user->id,$document->created_by])}}"
                                                                   target="_blank" style="font-size: 15px">
                                                                    {{$document->name.'.'.$document->extension}}
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td>{{$document->pages}}</td>
                                                        <td>{{App\Helpers\HumanReadable::bytesToHuman($document->size)}}</td>
                                                        <td>{{date('d/m/Y',strtotime($document->created_at))}}</td>
                                                        <td>{{date('d/m/Y',strtotime($document->expiry))}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="text-center text-dark">No documents</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

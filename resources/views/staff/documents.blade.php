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
                                <a href="/upload/document/{{$staff_id}}" class="btn btn-sm mb-3 btn-primary">Upload Document</a>
                                <a href="{{ route('contracts.index') }}" class="btn btn-sm mb-3 btn-primary">Contracts</a>
                                
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
                                                   <th>Share</th>
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

                                                        @if(!$document->signature)
                                                               
                                                                <td><div class="input-group">
                                                                    <input type="text" class="form-control" demoId="{{$document->id}}"
                                                                           value="{{asset('assets/files/documents/'.$document->file)}}"
                                                                           id="copyLink{{$document->id}}" readonly>
                                                                    <span class="input-group-append">
                                                                        <button type="button" class="btn btn-outline-primary btn-flat"
                                                                                onclick="copyLink({{$document->id}})"
                                                                                title="Copy the Link">
                                                                            <i class="fa fa-copy"></i>
                                                                        </button>
                                                                    </span>
                                                                </div></td>
                                                        @else
                                                        <td><div class="input-group">
                                                            <input type="text" class="form-control" demoId="{{$document->id}}"
                                                                   value="{{route('download.document.file',[$document->id,$document->user->id,$document->created_by])}}"
                                                                   id="copyLink{{$document->id}}" readonly>
                                                            <span class="input-group-append">
                                                                <button type="button" class="btn btn-outline-primary btn-flat"
                                                                        onclick="copyLink({{$document->id}})"
                                                                        title="Copy the Link">
                                                                    <i class="fa fa-copy"></i>
                                                                </button>
                                                            </span>
                                                        </div></td>
                                                            
                                                        @endif
                                                       
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
@section('scripts')
<script>
    function copyLink(id) {
        /* Get the text field */
        var copyText = document.getElementById("copyLink"+ id);

        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        // alert("Copied the text: " + copyText.value);
        alert("Copied the Link");
    }

    function confirmDelete(id) {
        let choice = confirm('Are you sure, You want to delete ?');
        if (choice) {
            document.getElementById('delete-team-' + id).submit();
        }
    }
</script>
@endsection

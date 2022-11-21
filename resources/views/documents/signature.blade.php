<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.943/build/pdf.min.js"></script>

    <style>
        #sig-canvas {
        border: 2px dotted #CCCCCC;
        border-radius: 15px;
        cursor: crosshair;
        }
        .resizeSignatureBox {
            background: #f5f5f5a8;
            padding: 5px 10px;
            position: absolute;
            z-index: 150;
            top: 17%;
            left: 40%;
            /*padding: 0.5em;*/
        }

        .resizeSignatureDiv {
            /*background: #6cb2eb;*/
            border-bottom: 1px solid #6cb2eb;
            width: 300px;
            /*height: 30px;*/
        }

        #resizeTextBox {

            position: absolute;
            z-index: 150;
            top: 15%;
            left: 40%;
            /*padding: 0.5em;*/
        }

        #resizeTextDiv {
            background: #6cb2eb;
            border: 1px solid grey;
            width: 300px;
            height: 50px;
        }

        .activeUser {
            border-color: #03a9f4;
            border-radius: 2px;
        }

        @media screen and (max-width: 600px) {
            .resizeSignatureBox {
                left: unset !important;
            }
        }
    </style>
    <style>
        .overlay1 {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 99999999;
            background: rgba(255, 255, 255, 0.8) url({{asset('images/spin.gif')}}) center no-repeat;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay1 {
            display: block;
        }
    </style>
</head>
<body>
<div class="overlay1"></div>
<div class=" m-0 row">
    <div class="col-12 col-md-3" style="height: 100%">
        <div class="card ">
            <div class="Signer-card">
                <div class="card-header bg-header text-white">
                    <h5>Create Packet</h5>

                </div>
                <div class="card-body" style="height:85vh;overflow:auto;">
                    <div class="d-flex justify-content-between">
                        <h5>Signers</h5>
                        <!--<button class="btn text-center bg-white btn-outline-primary text-primary" data-toggle="modal"-->
                        <!--        data-target="#addDocumentUserModal">-->
                        <!--    <i class="icon-add"></i>Add Signers-->
                        <!--</button>-->
                    </div>
                    <span id="signature_form_result"></span>
                    @if (session()->has('message'))
                        <div class="alert alert-success  mt-2">
                            {{session('message')}}
                        </div>
                    @endif
                    <div id="usersDiv">
                        @foreach($users as $user)
                            <div class="usersDiv card bg-gray my-3">
                                <p class="m-0 pos-label">Description</p>
                                <div class="my-3">
                                    <h5 class="px-2">{{$user->name}}</h5>
                                    <p class="m-0 px-2">{{$user->email}}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center bg-light px-2 py-1">
                                    <h5>Field</h5>
                                    <div class="d-flex my-1">
                                        <!--<button class="btn  bg-transparent px-2 "-->
                                        <!--        onclick="getDocumentUserDetail('{{$user->id}}')"-->
                                        <!--        data-toggle="modal" data-target="#editDocumentUserModal">-->
                                        <!--    <i class=" icon-edit text-primary fa-lg"></i>-->
                                        <!--</button>-->
                                        <button class="btn px-2 bg-transparent"
                                                onclick="setUserId('{{$user->id}}',this)" title="Sign">
                                            <i class="icon-add text-primary fa-lg"></i>
                                        </button>
                                        <!--<button class="btn bg-transparent px-2"-->
                                        <!--        onclick="deleteDocumentUser('{{$user->id}}')">-->
                                        <!--    <i class="icon-delete text-primary fa-lg"></i>-->
                                        <!--</button>-->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <hr class="m-0">
            <div class="row mt-3 mx-0">
                <div class="col-8 pr-md-0  mt-2">

                    {{--<input type="text" class="form-control" id="" name="">--}}
                </div>
                <!--<div class="col-3 px-0">-->
                <!--    <a href="{{route('send.document.to.users',$id)}}"-->
                <!--       class="btn btn-primary m-2 mt-2 btn-block">Send</a>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <div class="col-12 col-md-9 align-self-center text-center">
        <div id="body" style="z-index:140;"></div>
        <div id="resizeSignatureBox" class="resizeSignatureBox" style="display:none;">
            <div class="text-right">
                <button type="button" class="btn btn-sm transparent" onclick="hideSignature()"
                        title="Delete">
                    <i class="icon-delete text-primary fa-lg "></i>
                </button>
                <button type="button" class="btn btn-sm transparent" id="addSignatureSubmitBtn"
                        title="Save">
                    <i class="icon-upload text-primary fa-lg"></i>
                </button>
            </div>
            <h5 class="text-left">Example Signature</h5>
            <div id="resizeSignatureDiv" class="resizeSignatureDiv"></div>
        </div>
        <div>
            <button id="prev">Previous</button>
            <button id="next">Next</button>
            &nbsp; &nbsp;
            <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
        </div>
        <canvas id="my_canvas" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px;"></canvas>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addDocumentUserModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addDocumentUserModalTitle">Signer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addDocumentUserForm">
                <div class="modal-body">
                    <span id="addUserFormResult"></span>
                    @csrf
                    <input type="hidden" name="document_id" value="{{$id}}">
                    <div class="form-group mb-4">
                        <label class="pos-label" for="name">Name </label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Enter Name">
                    </div>
                    <div class="form-group mb-4">
                        <label class="pos-label" for="email">Email </label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Enter email">
                    </div>
                    <div class="form-group mb-4">
                        <label class="pos-label" for="cc">CC (optional) </label>
                        <input type="text" class="form-control" id="cc" name="cc"
                               placeholder="">
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn border-primary text-primary bg-transparent" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editDocumentUserModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addDocumentUserModalTitle">Update Signer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editDocumentUserForm">
                <div class="modal-body">
                    <span id="editUserFormResult"></span>
                    @csrf
                    <input type="hidden" name="document_user_id" id="document_user_id" value="">
                    <div class="form-group mb-4">
                        <label class="pos-label" for="name">Name </label>
                        <input type="text" class="form-control" id="editName" name="name"
                               placeholder="Enter Name">
                    </div>
                    <div class="form-group mb-4">
                        <label class="pos-label" for="email">Email </label>
                        <input type="email" class="form-control" id="editEmail" name="email"
                               placeholder="Enter email">
                    </div>
                    <div class="form-group mb-4">
                        <label class="pos-label" for="cc">CC (optional) </label>
                        <input type="text" class="form-control" id="editCC" name="cc"
                               placeholder="">
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn border-primary text-primary bg-transparent" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="addSignature" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="#" id="add_signature" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add Info For Signer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="signature_form_result"></span>
                    @csrf
                    <input type="hidden" name="document_id" value="{{$id}}">
                    <input type="hidden" id="user_id" value="" name="user_id">
                    <input type="hidden" name="signatureHeight" id="signatureHeight" value="50">
                    <input type="hidden" name="signatureWidth" id="signatureWidth" value="300">
                    <input type="hidden" name="signatureTop" id="signatureTop" value="">
                    <input type="hidden" name="signatureLeft" id="signatureLeft" value="">
                    <input type="hidden" name="signaturePage" id="signaturePage" value="1">
                    <input type="hidden" name="signatureTotalPages" id="signatureTotalPages" value="1">
                    <input type="hidden" name="type" value="signature">
                    <div class="form-group">
                        <label for="name" class="control-label pos-label">
                            Add some brief information for the signer
                        </label>
                        <input type="text" name="description" id="description" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-box"></i> SAVE</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="guided-modal">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-1 modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h4 class="modal-title">Add User Guide</h4>
                </div>
                <div class="modal-body">
                    <p>By Clicking this “+” Button you can add users Sign to this Documents, and Drag their Locataion where You want to print 
                    your signature.</p>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalCenter"
                            data-dismiss="modal">Close
                    </button>--}}
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                            onclick="gotItHowToAddUser()">
                        Got It
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-2 modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Signature Guide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Click the “+” Button  to add a signature to the Document </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                            onclick="gotItHowToAddUserSignature()">
                        Got It
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="guided-modal">
        <div class="modal fade" id="exampleModa9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe9"
             aria-hidden="true">
            <div class="modal-3 modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Signature Box Guide</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You can drag and drop this signature box anywhere on the document,
                            Click <i class="fa fa-upload"></i> button to save the signature position.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                onclick="gotItHowToAddSignatureBox()">
                            Got It
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
 <!-- Modal New for pic -->
 <div class="modal fade" id="PictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Signature Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-text-width mr-2"></i>Type</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true"><i class="fas fa-drafting-compass mr-2"></i>Draw</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-image mr-2"></i> Images</a>
                            </li> -->
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Enter Text</label>
                                    <textarea class="form-control textsign" rows="5"></textarea>
                                    <input class="form-control" type="hidden" id="typeone" value="text"  rows="5" />
                                    <input class="form-control" type="hidden" id="sign_id" value=""  rows="5" />
                                    
                               </div>
                               <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="saveText()" id="saveText">Save changes</button>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <label for="exampleFormControlTextarea1">Draw Signature</label>    
                            <!-- Content -->
                            <div class="container">
                                    <input class="form-control" type="hidden" id="typetwo" value="sign"  rows="5" />
                                    <input class="form-control" type="hidden" id="sign_id2" value=""  rows="5" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>E-Signature</h1>
                                        <p>Sign in the canvas below and save your signature as an image!</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <canvas id="sig-canvas" width="620" height="160">
                                            Get a better browser, bro.
                                        </canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" id="sig-clearBtn">Close</button>
                                        <button class="btn btn-default" id="sig-submitBtn">Save Changes</button>
                                    </div>
                                </div>
                                <br/>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img id="sig-image" src="" alt="Your signature will go here!"/>
                                    </div>
                                </div> -->
                            </div>
<!--  -->
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <form id="header_image_frm" enctype="multipart/form-data">   
                               @csrf
                            <div class="sahdow border" style="min-height:130px">
                                <label for="exampleFormControlTextarea1">Image Upload</label> 
                                <input type="file" name="file" class="form-control" id="file"/> 
                                    <input class="form-control" name="typethree" type="hidden" id="typethree" value="image"  rows="5" />
                                    <input class="form-control" name="sign_id3" type="hidden" id="sign_id3" value=""  rows="5" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- onclick="saveImage()" -->
                                    <button type="submit" class="btn btn-primary" id="imagesave">Save changes</button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>

<script src="{{asset('admin/assets/js/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery-1.12.4.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery-ui.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        {{--        @if(Auth::user()->add_document == 0)--}}
        $("#myModal").modal('show');
        {{--        @endif--}}
        {{--        @if(Auth::user()->add_document_user == 0 && Auth::user()->add_document == 1)--}}
        // $("#exampleModalCenter").modal('show');
        {{--        @endif--}}
    });

</script>
<script>
    var pageNum = 1, pageRendering = false, pdfDoc = null, pdfDocFile = null, pageNumPending = null;
    document.getElementById('page_num').textContent = pageNum;
    pdfjsLib.getDocument('{{asset("/assets/files/documents/".$document->file)}}').then(doc => {
        pdfDocFile = doc;
        pdfDoc = doc._pdfInfo;
        $("#signatureTotalPages").val(doc._pdfInfo.numPages);
        // $("#textTotalPages").val(doc._pdfInfo.numPages);
        document.getElementById('page_count').textContent = doc._pdfInfo.numPages;
        // console.log("This file has " + doc._pdfInfo.numPages + " pages.");
        // console.log(doc._pdfInfo);
        renderPage(pageNum);
    });

    function renderPage(pageNum) {
        pageRendering = true;
        pdfDocFile.getPage(pageNum).then(page => {
             
            var myCanvas = document.getElementById("my_canvas");
            var context = myCanvas.getContext("2d");

            var viewport = page.getViewport(1.5);
            myCanvas.width = viewport.width;
            myCanvas.height = viewport.height;

            page.render({
                canvasContext: context,
                viewport: viewport
            });
            pageRendering = false;
            if (pageNumPending !== null) {
                // New page rendering is pending
                renderPage(pageNumPending);
                pageNumPending = null;
            }
        });
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        $("#signaturePage").val(pageNum);
        // $("#textPage").val(pageNum);
        document.getElementById('page_num').textContent = pageNum;
        queueRenderPage(pageNum);
        getElements(pageNum);
    }

    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        $("#signaturePage").val(pageNum);
        // $("#textPage").val(pageNum);

        document.getElementById('page_num').textContent = pageNum;
        queueRenderPage(pageNum);
        getElements(pageNum);
    }

    document.getElementById('next').addEventListener('click', onNextPage);

</script>
<script>
    var base_url = $('meta[name="base-url"]').attr('content');

    $(document).ready(function () {
        $("#addSignatureSubmitBtn").click(function () {
            $("#add_signature").submit();
            hideSignature();
        });
        $('#add_signature').on('submit', function (event) {
            event.preventDefault();
            $('#signature_form_result').html('');
            $.ajax({
                url: "{{route('document-user-element.store')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#add_signature')[0].reset();
                        getElements(pageNum);
                    }
                    if (data.fail) {
                        html = '<div class="alert alert-danger">' + data.fail + '</div>';
                    }
                    $('#signature_form_result').html(html);
                }
            })
        });

        window.setTimeout(function () {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                $(this).remove();
            });
        }, 5000);

        $('#addDocumentUserForm').on('submit', function (event) {
            event.preventDefault();
            $('#addUserFormResult').html('');
            $.ajax({
                url: "{{route('document-user.store')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#addDocumentUserForm')[0].reset();
                    }
                    if (data.fail) {
                        html = '<div class="alert alert-danger">' + data.fail + '</div>';
                    }
                    $('#addUserFormResult').html(html);
                    getDocumentUsers();
                    {{--                    @if(Auth::user()->add_document_user == 0)--}}
                    $("#addDocumentUserModal").modal('hide');
                    $("#exampleModalCenter").modal('show');
                    {{--                    @endif--}}
                }
            })
        });

        $('#editDocumentUserForm').on('submit', function (event) {
            event.preventDefault();
            $('#editUserFormResult').html('');
            $.ajax({
                url: "{{route('document-user.update')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        // $('#editDocumentUserForm')[0].reset();
                    }
                    if (data.fail) {
                        html = '<div class="alert alert-danger">' + data.fail + '</div>';
                    }
                    $('#editUserFormResult').html(html);
                    getDocumentUsers();
                }
            })
        });

        getElements(pageNum);
    });

    // show signature box
    $(".budget-signature").click(function () {
        // $("#female").prop("checked", true);
        $('#resizeSignatureBox').show();
        // $('#resizeTextBox').hide();
    });

    $('#resizeSignatureBox').draggable({
        drag: function (event, ui) {
            // console.log(ui)
            // console.log("top = " + ui.position.top);
            // console.log("left = " + ui.position.left);
            $("#signatureTop").val(ui.position.top);
            $("#signatureLeft").val(ui.position.left);
        }
    });

    $('#resizeSignatureDiv').resizable({
        create: function (event, ui) {
            // $("#resizable-15").text ("I'm Created!!");
        },
        resize: function (event, ui) {
            // console.log("width = " + ui.size.width);
            // console.log("height = " + ui.size.height);
            $("#signatureHeight").val(ui.size.height);
            $("#signatureWidth").val(ui.size.width);
        }
    });

    function hideSignature() {
        $('#resizeSignatureBox').hide();
    }

    function getDocumentUsers() {
        $.ajax({
            type: 'GET',
            url: "{{route('get.document.users',$id)}}",
            success: function (response) {
                // console.log(response);
                var html = '';
                $('#usersDiv').html('');
                for (var count = 0; count < response.length; count++) {
                    html += '<div class="card bg-gray my-3">\n' +
                        '       <p class="m-0 pos-label">Description</p>' +
                        '       <div class="my-3">' +
                        '       <h5 class="px-2">' + response[count].name + '</h5>\n' +
                        '       <p class="m-0 px-2">' + response[count].email + '</p>\n' +
                        '       </div>' +
                        '       <div class="d-flex justify-content-between align-items-center bg-light px-2 py-1">\n' +
                        '           <h5>Field</h5>\n' +
                        '           <div class="d-flex my-1">\n' +
                        '               <button class="btn bg-transparent px-2" onclick="getDocumentUserDetail(' + response[count].id + ')" data-toggle="modal" data-target="#editDocumentUserModal">' +
                        '                   <i class=" icon-edit text-primary fa-lg"></i>' +
                        '               </button>\n' +
                        '               <button class="btn bg-transparent px-2" onclick="setUserId(' + response[count].id + ',this)">\n' +
                        '                     <i class="icon-add text-primary fa-lg"></i>\n' +
                        '               </button>' +
                        '               <button class="btn bg-transparent px-2"  onclick="deleteDocumentUser(' + response[count].id + ')"><i class="icon-delete text-primary fa-lg"></i></button>\n' +
                        '           </div>\n' +
                        '       </div>\n' +
                        '    </div>';
                    // console.log(response[count].id);
                }
                $('#usersDiv').html(html);
                // $('.convo-body').append(response);
            }
        });
    }

    function getDocumentUserDetail(id) {
        $.ajax({
            type: 'GET',
            url: base_url + '/get-document-user-details/' + id,
            success: function (response) {
                // console.log(response);
                $('#editName').val(response.name);
                $('#editEmail').val(response.email);
                $('#editCC').val(response.cc);
                $('#document_user_id').val(response.id);
            }
        });
    }

    function deleteDocumentUser(id) {
        // console.log(base_url)
        if (confirm('Are you sure! you want to delete this user?')) {
            $.ajax({
                type: 'GET',
                url: base_url + '/delete-document-user/' + id,
                success: function (response) {
                    // console.log(response);
                    if (response.success) {
                        getDocumentUsers();
                    } else {
                        alert(response.fail);
                    }
                }
            });
        }
    }

    function setUserId(id, e) {
        // debugger
        $('#user_id').val(id)
        getElements(pageNum);
        var qty = $(e).parents('#usersDiv').find('.usersDiv').removeClass('activeUser');
        // $(e).parents('.bg-gray').addClass('.activeUser');
        var qty = $(e).parents('.usersDiv').addClass('activeUser');
        $('#resizeSignatureBox').show();
        {{--        @if(Auth::user()->add_signature_box == 0)--}}
        $("#exampleModa9").modal('show');
        {{--        @endif--}}
    }

    function getElements(pageNum) {
        var user_id = $('#user_id').val();
        if (user_id != '') {
            var url = "{{route('get.document.element',[$id,':id',':user_id'])}}";
            url = url.replace(':id', pageNum);
            url = url.replace(':user_id', user_id);
            // console.log(url);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                  //console.log(response[0].signature);
                    
                    var html = '';
                    // $('#usersDiv').html('');
                    for (var count = 0; count < response.length; count++) {
                        if(response[count].signature !== null) {
                            if(response[count].signature.type== "sign"){
                            var Webseite = '<img src="'+response[count].signature.sign+'" style="width:200px; height:50px;" alt="Your signature will go here!">';
                            }else if(response[count].signature.type== "image"){
                                var Webseite = '<img src="/assets/img/'+response[count].signature.sign+'" style="width:2oopx; height:50px;" alt="Your signature will go here!">';
                            }else{
                                var Webseite = '<p>'+response[count].signature.sign+'</p>';
                            }
                        }else{
                            // 
                            var Webseite = '<div class="resizeSignatureDiv" onclick="Openbox(' + response[count].id + ')" id="resizeSignatureDiv' + response[count].id + '" style="height: ' + response[count].height + 'px;width:' + response[count].width + 'px ;color: grey;cursor: pointer"> Click Here</div>';
                        } 

                        html += '<div class="resizeSignatureBox" id="resizeSignatureBox' + response[count].id + '" style="position: absolute;z-index: 150;top: ' + response[count].top + 'px;left:' + response[count].left_distance + 'px;">\n' +
                            '                    <div class="text-right">\n' +
                            '                        <button type="button" class="btn btn-sm transparent" title="Delete" onclick="deleteSignature(' + response[count].id + ')">\n' +
                            '                            <i class="icon-delete text-primary fa-lg"></i>\n' +
                            '                        </button>\n' +
                            '                    </div>\n' +
                            '                   ' + Webseite +'\n' +
                            '                </div>';
                        // console.log('#resizeSignatureBox'+response[count].id);
                        $('#resizeSignatureBox' + response[count].id).draggable({
                            drag: function (event, ui) {
                                // console.log(ui)
                                // console.log("top = " + ui.position.top);
                                // console.log("left = " + ui.position.left);
                                $("#signatureTop").val(ui.position.top);
                                $("#signatureLeft").val(ui.position.left);
                            }
                        });
                        $('#resizeSignatureDiv' + response[count].id).resizable({
                            create: function (event, ui) {
                                // $("#resizable-15").text ("I'm Created!!");
                            },
                            resize: function (event, ui) {
                                // console.log("width = " + ui.size.width);
                                // console.log("height = " + ui.size.height);
                                $("#signatureHeight").val(ui.size.height);
                                $("#signatureWidth").val(ui.size.width);
                            }
                        });
                        $('#resizeSignatureDiv' + response[count].id).on('click', function() {
                                alert('123');
                            });
                    }
                    $('#body').html(html);
                    // $('.convo-body').append(response);
                }
            });
        }
    }

    function deleteSignature(id) {
        // console.log(base_url)
        $.ajax({
            type: 'GET',
            url: base_url + '/delete-document-elements/' + id,
            success: function (response) {
                // console.log(response);
                if (response.success) {
                    getElements(pageNum);
                } else {
                    alert(response.fail);
                }
            }
        });
    }
    
    function Openbox(id) {
       // console.log(id);
        $("#PictureModal").modal('show');
        $("#sign_id").val(id);
        $("#sign_id2").val(id);
        $("#sign_id3").val(id);
    }

    function saveText() {
      
       
      var id = $("#sign_id").val();
      var type=  $("#typeone").val();
      var text= $(".textsign").val();

      $.ajax({
                url: "{{route('document-text.store')}}",
                method: "POST",
                dataType: "json",
                data:{
                    "_token"         : "{{ csrf_token() }}",
                    "id"             : id,
                    "dataUrl"        : text,
                    "type"          : type,
                },
                
                
                success: function (data) {       
                    $("#PictureModal").modal('hide'); 
                    $("#sign_id").val('');
                    $("#typeone").val('');
                    $(".textsign").val('');
                   // $("#PictureModal").html(" ");
                    $('#resizeSignatureDiv'+id).replaceWith('<p>'+data.sign+'</p>');
                    
                }
            })
    }
    
    // function saveImage() {
    //     alert('123');
    //   var id = $("#sign_id3").val();
    //   var type=  $("#typethree").val();
    //   var text= $("#file").val();
    //   console.log(id);
    //   console.log(type);
    //   console.log(text);
    //   $.ajax({
    //             url: "{{route('document-image.store')}}",
    //             method: "POST",
    //             dataType: "json",
    //             data: {
    //                 "_token"         : "{{ csrf_token() }}",
    //                 "id":id,
    //                 "text":text,
    //                 "type":type,
    //             },
    //             enctype: 'multipart/form-data',
                
    //             success: function (data) {       
    //                 $("#PictureModal").modal('hide'); 
    //                 $('#resizeSignatureDiv'+id).replaceWith('<img src="/assets/img/'+data.sign+'" alt="Your signature will go here!">');
                    
    //             }
    //         })
    // }
     
    $('#header_image_frm').on('submit', function (event) {
            event.preventDefault();
            var id = $("#sign_id3").val();
            //$('#addUserFormResult').html('');
            $.ajax({
                url: "{{route('document-image.store')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {       
                   $("#PictureModal").modal('hide'); 
                    $("#sign_id3").val('');
                    $("#typethree").val('');
                    $("#file").val('');
                   $('#resizeSignatureDiv'+id).replaceWith('<img src="/assets/img/'+data.sign+'" style="width:2oopx; height:50px;" alt="Your signature will go here!">');
                    
                 }
            })
        });


    function gotItHowToAddUser() {
        // $.ajax({
        //     type: 'GET',
        //     url: base_url + '/got-it-how-to-add-user',
        //     success: function (response) {
        //         // console.log(response);
        //     }
        // });
    }

    function gotItHowToAddUserSignature() {
        // $.ajax({
        //     type: 'GET',
        //     url: base_url + '/got-it-how-to-add-user-signature',
        //     success: function (response) {
        //         // console.log(response);
        //     }
        // });
    }

    function gotItHowToAddSignatureBox() {
        // $.ajax({
        //     type: 'GET',
        //     url: base_url + '/got-it-how-to-add-signature-box',
        //     success: function (response) {
        //         // console.log(response);
        //     }
        // });
    }

</script>
<script>
(function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sigText = document.getElementById("sig-dataUrl");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {

    canvas.toBlob(function(blob) {
        var dataUrl = canvas.toDataURL();
        var signImg;
        var id= $('#sign_id2').val();
        var type= $('#typetwo').val();

        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('id', id);
        formData.append('dataUrl', dataUrl);
        formData.append('type', type);
        formData.append('signImg', blob);

        // sigText.innerHTML = dataUrl;
        // sigImage.setAttribute("src", dataUrl);
        $.ajax({
            url: "{{route('document-signature.store')}}",
            method: "POST",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            // data:{
            //     "_token"         : "{{ csrf_token() }}",
            //     "id"             : id,
            //     "dataUrl"        : dataUrl,
            //     "signImg"        : signImg,
            //     "type"          : type,
            // },
            
            
            success: function (data) {       
                $("#PictureModal").modal('hide'); 
                 $('#my_canvas').val('');
                 $('#sign_id2').val('');
                 $('#typetwo').val('');
               // $("#PictureModal").reset();
                $('#resizeSignatureDiv'+id).replaceWith('<img src="'+data.sign+'" style="width:2oopx; height:50px;" alt="Your signature will go here!">');
                
            }
        });

    }, 'image/jpeg', 1);

  }, false);

})();
</script>
</body>
</html>

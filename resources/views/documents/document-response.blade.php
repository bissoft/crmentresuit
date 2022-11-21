@extends('layouts.app2')
@section('style')
    <style>
        /*#regForm {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 10px 40px;
            width: 85%;
            min-width: 300px;
            border-radius: 10px;
        }*/

        h1 {
            text-align: center;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        .custom_button {
            background-color: #0a58af;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        .button {
            background-color: #0a58af;
            color: #ffffff;
            border: none;
            padding: 5px 20px;
            font-size: 13px;
            cursor: pointer;
        }

        .custom_button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #0a58af;
        }

        .jay-signature-pad {
            font-family: 'Nunito', sans-serif;
            position: relative !important;
            display: -ms-flexbox !important;
            -ms-flex-direction: column !important;
            width: 100% !important;
            height: 100% !important;
            /*max-width: 540px;*/
            max-height: 300px !important;
            border: 1px solid #e8e8e8 !important;
            background-color: #fff !important;
            /*box-shadow: 0 3px 20px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;*/
            border-radius: 15px !important;
            /*padding: 10px !important;*/
        }

        .txt-center {
            text-align: -webkit-center;
        }

        /*#jay-signature-pad {
            width: 841px !important;
            height: 251px !important;
            border-bottom: 1px solid gray !important;
        }*/
        @media only screen and (min-width: 300px) {
            #jay-signature-pad {
                width: 200px !important;
                height: 190px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        @media only screen and (min-width: 400px) {
            #jay-signature-pad {
                width: 230px !important;
                height: 190px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        @media only screen and (min-width: 500px) {
            #jay-signature-pad {
                width: 300px !important;
                height: 190px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        @media only screen and (min-width: 550px) {
            #jay-signature-pad {
                width: 330px !important;
                height: 190px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }


        @media only screen and (min-width: 600px) {
            #jay-signature-pad {
                width: 330px !important;
                height: 190px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        @media only screen and (min-width: 700px) {
            #jay-signature-pad {
                width: 400px !important;
                height: 180px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        @media only screen and (min-width: 768px) {
            #jay-signature-pad {
                width: 440px !important;
                height: 180px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        @media only screen and (min-width: 992px) {
            #jay-signature-pad {
                width: 680px !important;
                height: 200px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        @media only screen and (min-width: 1200px) {
            #jay-signature-pad {
                width: 740px !important;
                height: 200px !important;
                /*border-bottom: 1px solid gray !important;*/
            }
        }

        .pos-label {
            position: absolute;
            top: -12px;
            left: 27px;
            padding: 0 6px;
            background: white;
            z-index: 9;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">A new document from {{ config('app.name') }},
                                LLC is available for yor to sign.</h5>
                        </div>
                        <div class="modal-body mt-4">
                            <form id="regForm" action="#" method="post">
                            @csrf
                            <!-- One "tab" for each step in the form: -->
                                @if($signature || $text)
                                    <div class="tabs">
                                        <div class="row mb-3">
                                            @if($signature)
                                                <input type="hidden" name="document_id" id="document_id"
                                                       value="{{$id}}">
                                                <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
                                                <input type="hidden" name="send_id" id="send_id" value="{{$send_id}}">
                                                <div class="col-md-12">
                                                    <p class="m-0 pos-label">Signature Blow</p>
                                                    <div id="signature-pad" class="jay-signature-pad">
                                                        <div class="jay-signature-pad--body">
                                                            <canvas id="jay-signature-pad" width="841" height="250"
                                                                    style="padding-left: 10px;"></canvas>
                                                        </div>
                                                        <div class="signature-pad--footer text-left"
                                                             style="background: #e8e8e8;padding: 10px 20px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px">
                                                            <div class="signature-pad--actions row">
                                                                <div class="text-left col-6 pt-2">
                                                                    <strong> SIGN ABOVE </strong>
                                                                </div>
                                                                <div class="text-right col-6">
                                                                    <button type="button"
                                                                            class="clear btn btn-outline-primary pl-4 pr-4"
                                                                            data-action="clear">
                                                                        Clear
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($text)
                                                <div class="col-md-12 mt-1">
                                                    <p>
                                                        <input placeholder="Name" class="form-control" id="name"
                                                               oninput="this.className = ''" name="name"
                                                               style="width: 100%;"/>
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <div class="tabs"><span id="documentComplete"></span>
                                    <div class="downloadAlert" style="background: #79e49c;padding: 10px 30px;margin-bottom: 20px">
                                        <p style="margin-bottom: 0px !important;">
                                            You have finished signing this document.
                                        </p>
                                    </div>
                                    <p>
                                        <a type="button"
                                           href="{{route('download.document.file',[$id,$user_id,$send_id])}}"
                                           class="custom_button pr-4 pl-4" id="downloadButton"
                                           style="color: white;text-decoration: none;border-radius: 5px">
                                            <i class="fa fa-print"></i> Download
                                        </a>
                                    </p>
                                </div>
                                <div id="finish" style="display: none;">
                                    <div style="background: #79e49c;padding: 10px 30px;margin-bottom: 20px">
                                        <p style="margin-bottom: 0px !important;">
                                            Thanks for you Cooperation.
                                        </p>
                                    </div>
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button type="button" class="custom_button pl-4 pr-4" id="prevBtn"
                                                onclick="nextPrev(-1)"
                                                style="border-radius: 5px">
                                            Previous
                                        </button>
                                        <button type="button" class="custom_button pl-4 pr-4" id="nextBtn"
                                                onclick="nextPrev(1)"
                                                style="border-radius: 5px">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:0px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/signature_pad.min.js')}}"></script>
    <script src="{{asset('js/signature_pad2.min.js')}}"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var wrapper = document.getElementById("signature-pad");
        var clearButton = wrapper.querySelector("[data-action=clear]");
        var canvas = wrapper.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)'
        });
        // Adjust canvas coordinate space taking into account pixel ratio,
        // to make it look crisp on mobile devices.
        // This also causes canvas to be cleared.
        function resizeCanvas() {
            // When zoomed out to less than 100%, for some very strange reason,
            // some browsers report devicePixelRatio as less than 1
            // and only part of the canvas is cleared then.
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            // This part causes the canvas to be cleared
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            // This library does not listen for canvas changes, so after the canvas is automatically
            // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
            // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
            // that the state of this library is consistent with visual state of the canvas, you
            // have to clear it manually.
            signaturePad.clear();
        }

        // On mobile devices it might make more sense to listen to orientation change,
        // rather than window resize events.
        window.onresize = resizeCanvas;
        resizeCanvas();

        function download(dataURL, filename) {
            var blob = dataURLToBlob(dataURL);
            var url = window.URL.createObjectURL(blob);
            var a = document.createElement("a");
            a.style = "display: none";
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        }

        // One could simply use Canvas#toBlob method instead, but it's just to show
        // that it can be done using result of SignaturePad#toDataURL.
        function dataURLToBlob(dataURL) {
            var parts = dataURL.split(';base64,');
            var contentType = parts[0].split(":")[1];
            var raw = window.atob(parts[1]);
            var rawLength = raw.length;
            var uInt8Array = new Uint8Array(rawLength);
            for (var i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }
            return new Blob([uInt8Array], {type: contentType});
        }

        clearButton.addEventListener("click", function (event) {
            signaturePad.clear();
        });

        var tabs = document.getElementsByClassName("tabs");
        tabs[1].style.display = "none";
        // tabs[2].style.display = "none";
        // tabs[3].style.display = "none";

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        // function setCheckBoxValue() {
        //     if ($("#exampleCheck1").is(":checked")) {
        //         $("#exampleCheck1").val('1');
        //     } else {
        //         $("#exampleCheck1").val('');
        //     }
        // }

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tabs");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("nextBtn").innerHTML = "Finish";
            } else if (n == (x.length - 2)) {
                document.getElementById("nextBtn").innerHTML = "Apply";
            } else {
                document.getElementById("nextBtn").innerHTML = "Continuous";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tabs");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                // document.getElementById("regForm").submit();
                // return false;
                document.getElementById("finish").style.display = "block";
                document.getElementById("nextBtn").style.display = "none";
            }

            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tabs");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:

            if (x[currentTab] == x[0] && "<?= $signature ?>") {
                if (signaturePad.isEmpty()) {
                    alert("Please provide a signature first.");
                    return false;
                }
            }

            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // if (y[i].type == 'checkbox') {
                    //     alert('Please accept the polices first.')
                    // }
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                if (x[currentTab] == x[0]) {
                    event.preventDefault();
                    $('.downloadAlert').hide();
                    $('#documentComplete').html("Please Wait for document to complete")
                        .css("color", "red");
                    $('#downloadButton').hide();
                    $('#nextBtn').attr("disabled", true);
                    var dataURL = signaturePad.toDataURL("image/jpeg");
                    var sign_data = dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
                    var document_id = $('#document_id').val();
                    var user_id = $('#user_id').val();
                    var send_id = $('#send_id').val();
                    var name = $('#name').val();
                    // alert(user_id);
                    // return false;
                    var formData = new FormData();
                    formData.append("sign_data", sign_data);
                    formData.append("document_id", document_id);
                    formData.append("user_id", user_id);
                    formData.append("send_id", send_id);
                    formData.append("name", name);
                    formData.append("_token", "{{ csrf_token() }}");
                    $.ajax({
                        url: "{{route('document-user-response.store')}}",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            $('#documentComplete').html("")
                                .css("color", "black");
                            $('.downloadAlert').show();
                            $('#downloadButton').show();
                            $('#nextBtn').attr("disabled", false);
                            // console.log(data)
                        }
                    })
                }
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        $('#regForm').on('submit', function (event) {
            event.preventDefault();
            $('#documentComplete').html("Please Wait for document to complete")
                .css("color", "red");
            $('#downloadButton').hide();
            $('#nextBtn').attr("disabled", true);
            var dataURL = signaturePad.toDataURL("image/jpeg");
            var sign_data = dataURL.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
            var document_id = $('#document_id').val();
            var user_id = $('#user_id').val();
            var send_id = $('#send_id').val();
            var name = $('#name').val();
            $.ajax({
                url: "{{route('document-user-response.store')}}",
                method: "POST",
                data: {
                    sign_data: sign_data,
                    document_id: document_id,
                    user_id: user_id,
                    send_id: send_id,
                    name: name
                },
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    $('#documentComplete').html("Document has been completed")
                        .css("color", "black");
                    $('#downloadButton').show();
                    $('#nextBtn').attr("disabled", false);
                    // console.log(data)
                }
            })
        });

    </script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>--}}

@endsection
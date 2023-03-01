@extends('layouts.admin')
@section('style')
    <style type="text/css">
        video {
            width: 30%;
            border-radius: 5px;
            border: 1px solid black;
        }
    </style>
@endsection
@section('content')
    <div class="col-12 col-md-11 py-4 px-md-5 video-record-sec">
        <div class="d-flex flex-wrap justify-content-between">
            <h5 class="dashbord-title position-relative">Screen Recorder</h5>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                @if (session()->has('danger'))
                    <div class="alert alert-danger">
                        {{session('danger')}}
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card p-4">
                    <div id="controls" style="text-align: center">
                        <button id="btn-capture-recording" class="btn btn-sm btn-outline-info">Video Recording</button>
                        <button id="btn-start-recording" class="btn btn-sm btn-outline-success">Screen Recording</button>
                        <button id="btn-stop-recording" class="btn btn-sm btn-outline-danger" disabled>Stop Recording</button>
                        <button id="btn-save-recording" class="btn btn-sm btn-outline-info" disabled>Save to Server</button>
                        <button id="btn-save-to-disk" class="btn btn-sm btn-outline-primary" disabled>Save to Drive</button>
                        <button id="btn-reset-recording" class="btn btn-sm btn-outline-danger">Reset</button>
                        <hr>
                        <video controls autoplay playsinline></video>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
@endsection
@section('scripts')
    <script src="{{ url('public/RecordRTC-master/RecordRTC.js')}}"></script>
    <script>
        var video = document.querySelector('video');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var base_url = $('meta[name="base-url"]').attr('content');

        if (!navigator.getDisplayMedia && !navigator.mediaDevices.getDisplayMedia) {
            var error = 'Your browser does NOT support the getDisplayMedia API.';
            document.querySelector('h1').innerHTML = error;
            document.querySelector('video').style.display = 'none';
            document.getElementById('btn-start-recording').style.display = 'none';
            document.getElementById('btn-stop-recording').style.display = 'none';
            document.getElementById('btn-save-recording').style.display = 'none';
            throw new Error(error);
        }

        function invokeGetDisplayMedia(success, error) {
            var displaymediastreamconstraints = {
                video: {
                    displaySurface: 'monitor', // monitor, window, application, browser
                    logicalSurface: true,
                    cursor: 'always' // never, always, motion
                }
            };
            // above constraints are NOT supported YET
            // that's why overridnig them
            displaymediastreamconstraints = {
                video: true
            };
            if (navigator.mediaDevices.getDisplayMedia) {
                navigator.mediaDevices.getDisplayMedia(displaymediastreamconstraints).then(success).catch(error);
            } else {
                navigator.getDisplayMedia(displaymediastreamconstraints).then(success).catch(error);
            }
        }

        function captureScreen(callback) {
            invokeGetDisplayMedia(function (screen) {
                addStreamStopListener(screen, function () {
                    document.getElementById('btn-stop-recording').click();
                });
                callback(screen);
            }, function (error) {
                console.error(error);
                alert('Unable to capture your screen. Please check console logs.\n' + error);
            });
        }

        function stopRecordingCallback() {
            video.src = video.srcObject = null;
            // console.log(recorder.getBlob());
            blob = recorder.getBlob();
            video.src = URL.createObjectURL(recorder.getBlob());

            recorder.screen.stop();
            recorder.destroy();
            recorder = null;
            document.getElementById('btn-start-recording').disabled = false;
        }

        var recorder; // globally accessible
        // var fileExtension = 'webm';
        var fileExtension = 'mp4';
        document.getElementById('btn-start-recording').onclick = function () {
            this.disabled = true;
            captureScreen(function (screen) {
                video.srcObject = screen;
                recorder = RecordRTC(screen, {
                    type: 'video'
                });
                recorder.startRecording();
                // release screen on stopRecording
                recorder.screen = screen;

                document.getElementById('btn-stop-recording').disabled = false;
                document.getElementById('btn-save-recording').disabled = true;
                document.getElementById('btn-save-to-disk').disabled = true;
            });
        };
        document.getElementById('btn-stop-recording').onclick = function () {
            document.getElementById('btn-save-recording').disabled = false;
            document.getElementById('btn-save-to-disk').disabled = false;
            this.disabled = true;
            // console.log(video);
            recorder.stopRecording(stopRecordingCallback);
        };

        function addStreamStopListener(stream, callback) {
            stream.addEventListener('ended', function () {
                callback();
                callback = function () {
                };
            }, false);
            stream.addEventListener('inactive', function () {
                callback();
                callback = function () {
                };
            }, false);
            stream.getTracks().forEach(function (track) {
                track.addEventListener('ended', function () {
                    callback();
                    callback = function () {
                    };
                }, false);
                track.addEventListener('inactive', function () {
                    callback();
                    callback = function () {
                    };
                }, false);
            });
        }

        document.getElementById('btn-save-recording').onclick = function () {
            // document.getElementById('btn-save-recording').disabled = false;
            this.disabled = true;
            var filename = getFileName(fileExtension);
            // console.log(blob);
            // upload to the server
            var file = new File([blob], filename, {
                type: 'video'
            });

            var formData = new FormData();
            formData.append('file', file); // upload "File" object rather than a "Blob"
            formData.append('_token', CSRF_TOKEN);
            // console.log(file);
            $.ajax({
                url: base_url + '/save/video',
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function (data) {
                    // console.log(data);
                    if (data.status === true) {
                        alert(data.msg);
                        location.reload(true);
                    }
                    if (data.status === false) {
                        alert(data.msg);
                    }
                }
            });
        };

        document.getElementById('btn-save-to-disk').onclick = function () {
            // document.getElementById('btn-save-recording').disabled = false;
            this.disabled = true;
            var filename = getFileName(fileExtension);
            // console.log(blob);
            //save to the disk
            invokeSaveAsDialog(blob, filename);

        };

        function getFileName(fileExtension) {
            var d = new Date();
            var year = d.getUTCFullYear();
            var month = d.getUTCMonth();
            var date = d.getUTCDate();
            return 'Recording-' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
        }

        function getRandomString() {
            if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
                var a = window.crypto.getRandomValues(new Uint32Array(3)),
                    token = '';
                for (var i = 0, l = a.length; i < l; i++) {
                    token += a[i].toString(36);
                }
                return token;
            } else {
                return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
            }
        }

        function captureCamera(callback) {
            navigator.mediaDevices.getUserMedia({audio: true, video: true}).then(function (camera) {
                callback(camera);
            }).catch(function (error) {
                alert('Unable to capture your camera. Please check console logs.');
                console.error(error);
            });
        }

        document.getElementById('btn-capture-recording').onclick = function () {
            this.disabled = true;
            captureCamera(function (camera) {
                video.muted = true;
                video.volume = 0;
                video.srcObject = camera;

                recorder = RecordRTC(camera, {
                    type: 'video'
                });

                recorder.startRecording();

                // release camera on stopRecording
                recorder.camera = camera;

                document.getElementById('btn-stop-recording').disabled = false;
            });
        };

        document.getElementById('btn-reset-recording').onclick = function () {
            // document.getElementById('btn-stop-recording').disabled = true;
            // document.getElementById('btn-capture-recording').disabled = false;
            // document.getElementById('btn-start-recording').disabled = false;
            // document.getElementById('btn-save-recording').disabled = true;
            // document.getElementById('btn-save-to-disk').disabled = true;
            location.reload(true);
        };

    </script>
    <script src="{{ url('public/RecordRTC-master/common.js')}}"></script>
@endsection
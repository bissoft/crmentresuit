@extends('layouts.admin')
@section('styles')
    {{-- <script src="{{url('public/twilio/twilio-video.min.js')}}"></script> --}}
    {{-- <script src="https://sdk.twilio.com/js/video/releases/2.22.1/twilio-video.min.js"></script> --}}
    {{-- <script>
        
        Twilio.Video.createLocalTracks({
            audio: true,
            video: {width: 300}
        }).then(function (localTracks) {
            return Twilio.Video.connect('{{ $accessToken }}', {
                name: '{{ $roomName }}',
                tracks: localTracks,
                video: {width: 900}
            });
        }).then(function (room) {
            console.log('Successfully joined a Room: ', room.name);

            room.participants.forEach(participantConnected);

            var previewContainer = document.getElementById(room.localParticipant.sid);
            if (!previewContainer || !previewContainer.querySelector('video')) {
                participantConnected(room.localParticipant);
            }

            room.on('participantConnected', function (participant) {
                console.log("Joining: '" + participant.identity + "'");
                participantConnected(participant);
            });

            room.on('participantDisconnected', function (participant) {
                console.log("Disconnected: '" + participant.identity + "'");
                participantDisconnected(participant);
            });
        });
        // additional functions will be added after this point
    </script> --}}

    <script src='https://8x8.vc/vpaas-magic-cookie-fedc5ba61ccf47429b12b2e6b580e8c6/external_api.js' async></script>
    <style>html, body, #jaas-container { height: 620px; }</style>
    <script type="text/javascript">
    window.onload = () => {
        const api = new JitsiMeetExternalAPI("8x8.vc", {
        roomName: "vpaas-magic-cookie-fedc5ba61ccf47429b12b2e6b580e8c6/{{$roomName}}",
        userInfo: {
            email: "{{ auth()->user()->email }}",
            displayName: "{{ auth()->user()->name }}"
        },
        parentNode: document.querySelector('#jaas-container')
        });
    }
</script>
@endsection

@section('content')
    <div class="col-10 col-md-11 py-4 px-md-5">
        <div class="d-flex flex-wrap justify-content-between">
            <h5 class="dashbord-title position-relative">Video Session</h5>
        </div>
        <div class="row">
            <div class="col-md-12 text-right mb-1">
                {{--<button type="button" class="btn btn-info btn-block mb-1" data-toggle="modal"
                        data-target="#sendInvitation" title="send invitation">
                    <i class="fa fa-paper-plane"></i>
                </button>--}}
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ url('/room/join/'.$roomName) }}"
                           id="copyLink" readonly>
                    <span class="input-group-append">
                    <button type="button" class="btn btn-secondary btn-flat" onclick="copyLink()"
                            title="Copy the Link">
                        <i class="fa fa-copy"></i>
                    </button>
                  </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right mb-1">
                <div class="card">
                    <div id="jaas-container"></div>
                    {{-- <div id="media-div"> 
                        
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="sendInvitation" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="#" id="send_invitation" class="form-horizontal" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Send Invitation</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <span id="send_invitation_result"></span>
                            @csrf
                            <input type="hidden" name="roomName" value="{{$roomName}}">
                            <div class="form-group">
                                <label for="name" class="control-label text-left">Select User</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function copyLink() {
            /* Get the text field */
            var copyText = document.getElementById("copyLink");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            // alert("Copied the text: " + copyText.value);
            alert("Copied the Link");
        }

        // function participantConnected(participant) {
        //     console.log('Participant "%s" connected', participant.identity);

        //     const div = document.createElement('div');
        //     div.id = participant.sid;
        //     div.setAttribute("style", "float: left; margin: 5px;");
        //     // div.innerHTML = "<div style='clear:both'>" + participant.identity + "</div>";

        //     participant.tracks.forEach(function (track) {
        //         trackAdded(div, track)
        //     });

        //     participant.on('trackAdded', function (track) {
        //         trackAdded(div, track)
        //     });
        //     participant.on('trackRemoved', trackRemoved);

        //     document.getElementById('media-div').appendChild(div);
        // }

        // function participantDisconnected(participant) {
        //     console.log('Participant "%s" disconnected', participant.identity);

        //     participant.tracks.forEach(trackRemoved);
        //     document.getElementById(participant.sid).remove();
        // }

        // function trackAdded(div, track) {
        //     div.appendChild(track.attach());
        //     var video = div.getElementsByTagName("video")[0];
        //     if (video) {
        //         video.setAttribute("style", "max-width:500px;width:480px");
        //     }
        // }

        // function trackRemoved(track) {
        //     track.detach().forEach(function (element) {
        //         element.remove()
        //     });
        // }

        // $('#send_invitation').on('submit', function (event) {
        //     event.preventDefault();
        //     $.ajax({
        //         url: "",
        //         method: "POST",
        //         data: new FormData(this),
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         dataType: "json",
        //         success: function (data) {
        //             var html = '';
        //             if (data.errors) {
        //                 html = '<div class="alert alert-danger">';
        //                 for (var count = 0; count < data.errors.length; count++) {
        //                     html += '<p>' + data.errors[count] + '</p>';
        //                 }
        //                 html += '</div>';
        //             }
        //             if (data.success) {
        //                 html = '<div class="alert alert-success">' + data.success + '</div>';
        //                 $('#send_invitation')[0].reset();
        //             }
        //             if (data.fail) {
        //                 html = '<div class="alert alert-danger">' + data.fail + '</div>';
        //             }
        //             $('#send_invitation_result').html(html);
        //         }
        //     })
        // });
    </script>
@endsection
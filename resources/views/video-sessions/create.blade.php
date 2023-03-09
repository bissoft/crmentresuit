@extends('layouts.admin')
@section('styles')
    <script src='https://8x8.vc/vpaas-magic-cookie-fedc5ba61ccf47429b12b2e6b580e8c6/external_api.js' async></script>
    <style>html, body, #jaas-container { height: 620px; }</style>
    <script type="text/javascript">
    window.onload = () => {
        const options = {
            disableInviteFunctions: true,
            roomName: "vpaas-magic-cookie-fedc5ba61ccf47429b12b2e6b580e8c6/{{$roomName}}",
            userInfo: {
                email: "{{ auth()->user()->email }}",
                displayName: "{{ auth()->user()->name }}"
            },
            parentNode: document.querySelector('#jaas-container'),
            interfaceConfigOverwrite: {
                TOOLBAR_BUTTONS: [
                    'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                    'fodeviceselection', 'hangup', 'profile', 'chat',
                    'etherpad',  'settings', 'raisehand',
                    'videoquality', 'filmstrip','shortcuts',
                    'tileview', 'videobackgroundblur', 'download', 'help', 'mute-everyone'
                ]
            }
            
        }
        const api = new JitsiMeetExternalAPI("8x8.vc", options);
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
    </script>
@endsection
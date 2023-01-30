@extends('layouts.admin')
@section('scripts')
<script src="{{ url('js/app.js') }}"></script>
<script src='https://8x8.vc/vpaas-magic-cookie-fedc5ba61ccf47429b12b2e6b580e8c6/external_api.js' async></script>
<style>html, body, #jaas-container { height: 620px; }</style>
<script type="text/javascript">
  window.onload = () => {
    const api = new JitsiMeetExternalAPI("8x8.vc", {
      roomName: "vpaas-magic-cookie-fedc5ba61ccf47429b12b2e6b580e8c6/SampleAppLittleLacksTransportAround",
      parentNode: document.querySelector('#jaas-container')
    });
  }
</script>
@endsection
@section('content')
<div id="jaas-container"></div>
{{-- <div id="app">
<video-chat class="w-100" :user="{{ $user }}" :others="{{ $others }}" pusher-key="{{ config('broadcasting.connections.pusher.key') }}" pusher-cluster="{{ config('broadcasting.connections.pusher.options.cluster') }}"></video-chat>
</div> --}}
@endsection
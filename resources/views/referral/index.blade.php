@extends('layouts.admin')
@section('page-title')
    {{__('Settings')}}
@endsection
@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_favicon=Utility::getValByName('company_favicon');
 $lang=\App\Utility::getValByName('default_language');
@endphp
@push('script-page')
    <script>
        function myFunction() {
      // Get the text field
      var copyText = document.getElementById("myInput");
    
      // Select the text field
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices
    
      // Copy the text inside the text field
      navigator.clipboard.writeText(copyText.value);
      
      // Alert the copied text
      alert("Copied the text: " + copyText.value);
    }
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="nav-tabs">
                <div class="col-lg-12 our-system">
                    <div class="row">
                        <ul class="nav nav-tabs my-4">
                            <li>
                                <a data-toggle="tab" href="#business-setting" class="active">{{__('Referrals')}}</a>
                            </li>
                            <li class="annual-billing">
                                <a data-toggle="tab" href="#system-setting" class="">{{__('Referrer')}} </a>
                            </li>
                            <li class="annual-billing">
                                <a data-toggle="tab" href="#company-setting" class="">{{__('My Referral Link')}} </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="tab-content">


                    <div id="business-setting" class="tab-pane in active">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2">{{__('Referrals')}}</h4>
                                </div>
                            </div>
                            <div class="card bg-none">
                                <div class="table-responsive p-3">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Account Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($referrals) and $referrals->count())
                                            @foreach ($referrals as $referral)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$referral->name}}</td>
                                                <td>{{$referral->email}}</td>
                                                <td>{{date('d M, Y H:i',strtotime($referral->created_at))}}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="4" class="fw-bold text-center bg-primary text-wrap">No
                                                    Referrals Found</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        

                    </div>

                    <div id="system-setting" class="tab-pane">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2">{{__('Referrer')}}</h4>
                                </div>
                            </div>
                            <div class="card bg-none">
                                <div class="table-responsive p-3">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Account Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @if (isset($referrer))
                                            <tr>
                                                <td>1</td>
                                                <td>{{$referrer->name ?? ''}}</td>
                                                <td>{{$referrer->email}}</td>
                                                <td>{{date('d M, Y H:i',strtotime($referrer->created_at))}}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td colspan="4" class="fw-bold text-center bg-primary text-wrap">No Referrer
                                                    Found</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="company-setting" class="tab-pane">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2">{{__('My Referral Link')}}</h4>
                                </div>
                            </div>
                            <div class="card bg-none">
                                <div class="input-group mb-3">
                                    <input type="text" value="{{$link}}" class="form-control"
                                        placeholder="Share this referral link" aria-label="Share this referral link"
                                        aria-describedby="button-addon2" id="myInput">
                                    <button class="btn btn-labeled btn-success" type="button" id="button-addon2" onclick="myFunction()">
                                        <span class="btn-label"><i class="fa fa-copy"></i></span>
                                        Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection

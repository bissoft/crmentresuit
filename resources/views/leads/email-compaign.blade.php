@extends('layouts.admin')
@php
$profile=asset(Storage::url('uploads/avatar/'));
@endphp
@section('page-title')
{{__('Manage Emails')}}
@endsection

@section('content')

<div class="page-content">
    <!--end row-->
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('leads.index') }}">Back</a>
    </div>
    <div class="row mt-5">


        <div class="col">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary">Send Lead Email Campaigns</h5>

                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="" class="row g-3" method="post">
                        @csrf
                        <div class="col-md-6">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}"
                                placeholder="Enter Subject">
                        </div>

                        @php
                            $leadName = $lead->name ?? '';
                            $leadSource = $lead->source->name ?? '';
                            $companyName = $lead->company_name ?? '';
                            $companyPosition = $lead->position ?? '';
                            $leadStatus = $lead->status->name ?? '';
                            $leadBudget = $lead->estimate_budget ?? '';
                            $leadMember = $lead->member->name ?? '';
                            $leadPhone = $lead->phone ?? '';
                            $leadWebsite = $lead->website ?? '';
                            $leadCountry = $lead->country ?? '';
                            $leadDescription = $lead->description ?? '';
                            $created_at = $lead->created_at ?? '';
                            $leadsText = "Dear Customer Here is New Lead!
Please view the details of this Lead below:
[LEAD NAME] : $leadName
[LEAD Source] : $leadSource
[Company Name] : $companyName
[Company Position] : $companyPosition
[Status] : $leadStatus
[Member] : $leadMember
[phone] : $leadPhone
[DATE] : $created_at
[LOCATION] : $leadCountry
[Website Link] : $leadWebsite
[INSTRUCTIONS]"; $leadDescription
                        @endphp
                        <div class="col-md-12">
                            <label for="subject" class="form-label">Email Content</label>
                            <textarea name="email_content" id="oneditor" class="form-control" cols="30"
                                rows="20">{!! old('email_content')?? $leadsText !!}</textarea>
                        </div>


                        <div class="col-12 text-end">
                            <button type="submit" class="btn-submit">Send Campaign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection

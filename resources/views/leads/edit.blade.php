<style>
    body{
margin: 100px 50%;
}

.onoff {
margin-left: -27px;
display: -moz-inline-stack;
display: inline-block;
vertical-align: middle;
*vertical-align: auto;
zoom: 1;
*display: inline;
position: relative;
cursor: pointer;
width: 55px;
height: 30px;
line-height: 30px;
font-size: 14px;
font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.onoff label {
position: absolute;
top: 0px;
left: 0px;
width: 100%;
height: 100%;
cursor: pointer;
background: #cd3c3c;
border-radius: 5px;
font-weight: bold;
color: #FFF;
-webkit-transition: background 0.3s, text-indent 0.3s;
-moz-transition: background 0.3s, text-indent 0.3s;
-o-transition: background 0.3s, text-indent 0.3s;
transition: background 0.3s, text-indent 0.3s;
text-indent: 27px;
-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4) inset;
-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4) inset;
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4) inset;
}
.onoff label:after {
content: 'NO';
display: block;
position: absolute;
top: 0px;
left: 0px;
width: 100%;
font-size: 12px;
color: #591717;
text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.35);
z-index: 1;
}
.onoff label:before {
content: '';
width: 15px;
height: 24px;
border-radius: 3px;
background: #FFF;
position: absolute;
z-index: 2;
top: 3px;
left: 3px;
display: block;
-webkit-transition: left 0.3s;
-moz-transition: left 0.3s;
-o-transition: left 0.3s;
transition: left 0.3s;
-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
}
.onoff input:checked + label {
background: #378b2c;
text-indent: 8px;
}
.onoff input:checked + label:after {
content: 'YES';
color: #091707;
}
.onoff input:checked + label:before {
left: 37px;
}
</style>
<div class="card bg-none card-box">
    {{ Form::model($lead, array('route' => array('leads.update', $lead->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('name',__('Leads Name'),array('class'=>'form-control-label')) }}
                <div class="form-icon-user">
                    <span><i class="fas fa-address-card"></i></span>
                    {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('contact',__('Contact'),['class'=>'form-control-label'])}}
                <div class="form-icon-user">
                    <span><i class="fas fa-mobile-alt"></i></span>
                    {{Form::text('contact',null,array('class'=>'form-control','required'=>'required'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('gender',__('Gender'),['class'=>'form-control-label'])}}
                <select name="gender" class="form-control select2" id="gender" required>
                    <option value="male" @if($lead->gender == 'male') selected @endif>Male</option>
                    <option value="female" @if($lead->gender == 'female') selected @endif >Fe Male</option>
                </select>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="form-group">
                {{Form::label('email',__('Email Address'),['class'=>'form-control-label'])}}
                <div class="form-icon-user">
                    <span><i class="fas fa-envelope"></i></span>
                    {{Form::text('email',null,array('class'=>'form-control'))}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('lead_soucre', __('Lead Source'),['class'=>'form-control-label']) }}
            {{ Form::select('source_id', $sources, null, ['placeholder' => 'Pick a Lead Source...', 'class' => 'form-control select2']) }}
            @error('source_id')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('Status', __('Leads Status'),['class'=>'form-control-label']) }}
            {{ Form::select('status_id', $statuses, null, ['placeholder' => 'Pick a Lead Status...', 'class' => 'form-control select2']) }}
            @error('status')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('Company Name', __('Company Name'),['class'=>'form-control-label']) }}
            {{ Form::text('company_name', null, array('class' => 'form-control','required'=>'required')) }}
            @error('company_name')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('Position', __('Position'),['class'=>'form-control-label']) }}
            {{ Form::text('position', null, array('class' => 'form-control','required'=>'required')) }}
            @error('position')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('phone', __('Mobile phone'),['class'=>'form-control-label']) }}
            {{ Form::text('phone', null, array('class' => 'form-control','required'=>'required')) }}
            @error('phone')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('land_line', __('Land Line'),['class'=>'form-control-label']) }}
            {{ Form::text('land_line', null, array('class' => 'form-control','required'=>'required')) }}
            @error('land_line')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
          

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('website', __('Website'),['class'=>'form-control-label']) }}
            {{ Form::text('website', null, array('class' => 'form-control','required'=>'required')) }}
            @error('website')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            {{ Form::label('country', __('country'),['class'=>'form-control-label']) }}
            {{ Form::text('country', null, array('class' => 'form-control','required'=>'required')) }}
            @error('country')
            <small class="invalid-name" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="row">
             <p class=" ml-2 mr-5 text-dark">SMS</p>
             <p class="onoff">
                 <input type="checkbox" name="sms" value="1" id="checkboxID">
                 <label for="checkboxID"></label>
             </p>
            </div>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('description', __('Memo'),['class'=>'form-control-label']) }}
            {{ Form::textarea('description', null, array('class' => 'form-control','required'=>'required')) }}
            @error('description')
            <small class="invalid-rate" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="col-md-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{ Form::close() }}
</div>

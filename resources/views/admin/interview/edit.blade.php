@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Interview
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.interview.update',$interview->id) }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label class="required" for="topic">Topic <small style="color:red;">*</small></label>
                    <input class="form-control" type="text" name="topic" id="topic" placeholder="Enter Topic" value="{{ $interview->topic??old('topic') }}">
                    {!! $errors->first('topic', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="start_time">Start Time  <small style="color:red;">*</small></label>
                    <input class="form-control" type="datetime-local" placeholder="Enter Start Time" name="start_time" id="start_time"
                        value="{{ $interview->start_time??old('start_time') }}">
                    {!! $errors->first('start_time', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="duration">Duration <small style="color:red;">*</small></label>
                    <input class="form-control" type="number" placeholder="Enter Duration" name="duration" id="duration"
                        value="{{ $interview->duration??old('duration') }}">
                    {!! $errors->first('duration', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required">User <small style="color:red;">*</small></label>
                    <select name="user" class="form-control" id="">
                        @foreach ($user as $item)
                                    <option value="{{ $item->id }}" @if($interview->user_id == $item->id) selected @endif>{{ $item->name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


@extends('layouts.auth')
@php
    $logo=asset(Storage::url('uploads/logo/'));
@endphp
@section('page-title')
    {{__('Login')}}
@endsection
@section('content')
    <div class="login-contain">
        <div class="login-inner-contain">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('app/assets/img/logov2.png') }}" class="navbar-brand-img big-logo" alt="logo">
            </a>
            <div class="login-form">
                
                <div class="page-title"><h5><span>{{__('User')}}</span>Sign Up</h5></div>
                {{Form::open(array('route'=>'register','method'=>'post','id'=>'loginForm' ))}}
                @csrf
                <div class="form-group">
                    <label for="email" class="form-control-label">Full Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="email" type="text" name="name" value="{{ old('name') }}" required autocomplete="Name" autofocus>
                    @error('name')
                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-control-label">{{__('Email')}}</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-control-label">{{__('Password')}}</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="custom-control custom-checkbox remember-me-text">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">{{__('Remember Me')}}</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs text-primary">{{ __('Forgot Your Password?') }}</a>
                @endif

                <button type="submit" class="btn-login">Register</button>
                {{Form::close()}}
            </div>

            <!--<h5 class="copyright-text">-->
            <!--    {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright AccountGo') }} {{ date('Y') }}-->
            <!--</h5>-->
            {{-- <!-- <div class="all-select">
                <a href="#" class="monthly-btn">
                    <span class="monthly-text py-0">{{__('Change Language')}}</span>
                    <select class="select-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" id="language">
                        @foreach(Utility::languages() as $language)
                            <option @if($lang == $language) selected @endif value="{{ route('login',$language) }}">{{Str::upper($language)}}</option>
                        @endforeach
                    </select>
                </a>
            </div> --> --}}
        </div>
    </div>
@endsection

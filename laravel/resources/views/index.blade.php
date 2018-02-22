@extends('layouts.app')
@section('title') @lang('cabinet2.text_1') @endsection
@section('description') @endsection
@section('keywords')
@endsection
@section('content')

    @if(!Auth::check())
    <div id="gtco-started">
        <div class="gtco-container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                    <h2>Get Started</h2>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-12">
                    <form class="form-inline" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" name="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-default btn-block">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="gtco-register">
        <div class="gtco-container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                    <h2>Register</h2>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-12">
                    <form class="form-inline" role="form" method="POST" action="{{ route('register') }}">
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email2" placeholder="Email" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="password2" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label for="password" class="sr-only">Repeat Password</label>
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <button type="submit" class="btn btn-default btn-block">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection
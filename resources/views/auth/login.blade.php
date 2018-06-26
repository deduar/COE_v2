@extends('layouts.master')

@section('title', 'Coesperiences: Login')

@section('content')

<style type="text/css">
    .container{
        padding-bottom: 0px !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="row login_box" style="height: 620px;">
    <div class="col-md-5 col-md-offset-6" style="background: #FFF; opacity: .75; padding-top: 30px; padding-bottom: 30px;">
    {!! Form::open(['route' => 'login', 'files' => true]) !!}
        {!! Form::token(); !!}
        <h4>Express Login</h4>
        <div class="btn btn-primary" style="font-weight: bold; background: #074587;"><i class="fa fa-facebook-f" style="font-size: 20px; margin-right: 8px;"></i>  Login with Facebbok</div>
        <hr>
        <h4>Standard Logoin</h4>
        <h5>Please enter your email address and password to log in.</h5> 
        <h6><a href="{{route('ŕegister')}}">No COEXPERIENCES Account Yet?</a></h6>
        <div class="form-group">
            {!! Form::label('email', trans('login.email')) !!}
        </div>
        <div class="form-group">
            {!! Form::email('email') !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', trans('login.password')) !!}
        </div>
        <div class="form-group">
            {!! Form::password('password') !!}
        </div>
        <div class="form-group">
            {!! Form::label('remember', trans('login.remember')) !!}
            {!! Form::radio('remember') !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Lang::get('login.login'), ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('getemail') }}">    Forgot password ?</a>
        </div>
    {!! Form::close() !!}
    </div>
</div>
@endsection


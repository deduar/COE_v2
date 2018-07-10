@extends('layouts.master')

@section('title', 'Coexperienes: Register')

@section('content')

<style type="text/css">
    .container{
        padding-bottom: 0px !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="row login_box" style="height: 650px;">
    <div class="col-md-5 col-md-offset-6" style="background: #FFF; opacity: .75; padding-top: 30px; padding-bottom: 30px;">
    {!! Form::open(['route' => 'register', 'files' => true]) !!}
        {!! Form::token(); !!}
    <h4>Facebook SingUp</h4>
    <div class="btn btn-primary" style="font-weight: bold; background: #074587;"><i class="fa fa-facebook-f" style="font-size: 20px; margin-right: 8px;"></i>  Login with Facebbok</div>
    <hr>
    <h4>Standard SingUp</h4>

    <div class="form-group">
        {!! Form::label('name', trans('login.name')) !!}
    </div>
    <div class="form-group">
        {!! Form::text('name') !!}
    </div>

    <div class="form-group">
        {!! Form::label('last_name', trans('login.last_name')) !!}
    </div>
    <div class="form-group">
        {!! Form::text('last_name') !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', trans('login.email')) !!}
        <p>This email is used to receive booking request. Make sure it is your most frequently checked email address</p>
    </div>
    <div class="form-group">
        {!! Form::email('email') !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', trans('login.password')) !!}
        {!! Form::password('password') !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', trans('login.password_confirmation')) !!}
        {!! Form::password('password_confirmation') !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit(Lang::get('login.register'), ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
</div>
@endsection
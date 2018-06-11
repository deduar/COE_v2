@extends('layouts.master')

@section('title', 'Coexperienes: Register')

@section('content')
<div class="row register_box">
<div class="col-md-5 col-md-offset-7">    
<form method="POST" action="{{ route('register') }}">
    {!! csrf_field() !!}

    <div class="row">
        <div class="col-md-3" style="text-align: right;">First Name</div>
        <div class="col-md-6">
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="text-align: right;">Last Name</div>
        <div class="col-md-6">
            <input type="text" name="lastName" value="{{ old('lastName') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="text-align: right;">Email</div>
        <div class="col-md-6">
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="text-align: right;">Password</div>
        <div class="col-md-6">
            <input type="password" name="password">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3" style="text-align: right;">Confirm Password</div>
        <div class="col-md-6">
            <input type="password" name="password_confirmation">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-3">
            <button type="submit">Register</button>
        </div>
    </div>
</form>
</div>
</div>
@endsection
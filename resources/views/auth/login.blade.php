@extends('layouts.master')

@section('title', 'Coesperiences: Login')

@section('content')

<div class="row login_box">
    <div class="col-md-6 col-md-offset-6">
    <form method="POST" action="{{ route('login') }}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-3" style="text-align: right;">Email</div>
            <div class="col-md-6">
                <input type="email" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="text-align: right;">Password</div>
            <div class="col-md-6">
                <input type="password" name="password" id="password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <input type="checkbox" name="remember"> Remember Me
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-2 col-md-offset-3">
                <button type="submit">Login</button>
            </div>
            <div class="col-md-6">
                <button type="submit">
                    <a href="{{ route('getemail') }}">Forgot password ?</a>
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection


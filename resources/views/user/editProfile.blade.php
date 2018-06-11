@extends('layouts.master')

@section('title', 'Coesperiences: ChangePassword')

@section('sidebar')
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 20px;">
	{!! Form::open(['route' => 'update_profile', 'files' => true]) !!}
		{!! Form::token(); !!}
        <div class="col-md-2">
		{!! Form::label('name', 'First Name') !!}
        </div>
        <div class="col-md-4">
    	{!! Form::text('name', $user['name']) !!}
        </div>
        <div class="col-md-2">
    	{!! Form::label('lastName', 'Last Name') !!}
        </div>
        <div class="col-md-4">
    	{!! Form::text('lastName', $user['lastName']) !!}
        </div>
        <div class="col-md-2">
    	{!! Form::label('address', 'Address') !!}
        </div>
        <div class="col-md-4">
    	{!! Form::text('address', $user['address']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('age', 'Age') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('age', $user['age']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('phone', 'Phone') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('phone', $user['phone']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('nationality', 'Nationality') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('nationality', $user['nationality']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('job', 'Job') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('job', $user['job']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('postalCode', 'Postal Code') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('postalCode', $user['postalCode']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('city', 'City') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('city', $user['city']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('country', 'Country') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('country', $user['country']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('language', 'Language') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('language', $user['language']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('biography', 'Biography') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('biography', $user['biography']) !!}
        </div>
        <div class="col-md-4">
    	{!! Form::submit(Lang::get('profile.change_profile')) !!}
        <a class="btn btn-default btn-close" href="{{ route('home') }}">{{ trans('profile.cancel') }}</a>
        <a class="btn btn-default btn-close" href="{{ route('user_profile') }}">{{ trans('profile.upload_avatar') }}</a>

	{!! Form::close() !!}
    </div>
    

@endsection
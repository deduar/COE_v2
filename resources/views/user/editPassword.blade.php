@extends('layouts.master')

@section('title', 'Coesperiences: ChangePassword')

@section('sidebar')
@endsection

@section('content')
	<h1>Change Password</h1>
	{!! Form::open(['route' => 'update_password', 'files' => true]) !!}
		
		{!! Form::token(); !!}
		{!! Form::label('password', 'Current Password') !!}
		{!! Form::password('password', ['class' => 'awesome']) !!}

		{!! Form::label('newPassword', 'New Password') !!}
		{!! Form::password('newPassword', ['class' => 'awesome']) !!}

		{!! Form::label('retipeNewPassword', 'Retipe New Password') !!}
		{!! Form::password('retipeNewPassword', ['class' => 'awesome']) !!}

		{!! Form::submit('Click Me!') !!}
	{!! Form::close() !!}
@endsection
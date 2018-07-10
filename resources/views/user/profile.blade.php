@extends('layouts.master')

@section('title', 'Coesperiences: Login')

@section('content')

	<h1>{{ trans('profile.profile_Of') }} {{ $user->name }} {{ $user->last_name }} </h1>
	<img src="../uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">

	<form enctype="multipart/form-data" action={{ route('upload_avatar') }} method="POST">
		<label>{{ trans('profile.upload_avatar') }}</label>
		<input type="file" name="avatar" required = 'required' style="display: none" id="imageUpload" accept="image/*">
		<label for="imageUpload" style="margin-left: 15%; width: 230px;" class="btn btn-primary btn-block btn-outlined">{{ trans('profile.select_img') }}</label>
		<input type="hidden" name="_token" value="{{ csrf_token() }}" >
		<br>
		<input type="submit" value="{{ trans('profile.change_avatar') }}" class="btn btn-sm btn-primary">
	</form>

	
	<!--a class="btn btn-success" href="{{ route('experience_create') }}" style="float: right;"><span class="glyphicon glyphicon-plus-sign"></span>  {{ trans('profile.create_experience') }}</a-->

@endsection
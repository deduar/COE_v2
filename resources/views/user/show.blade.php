@extends('layouts.master')

@section('title', 'Coesperiences: ChangePassword')

@section('sidebar')
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="col-md-2">
		{!! Form::label('name', 'First Name') !!}
        </div>
        <div class="col-md-4">
    	{!! Form::text('name', $us_prof['name']) !!}
        </div>
        <div class="col-md-2">
    	{!! Form::label('lastName', 'Last Name') !!}
        </div>
        <div class="col-md-4">
    	{!! Form::text('lastName', $us_prof['lastName']) !!}
        </div>
        <div class="col-md-2">
    	{!! Form::label('address', 'Address') !!}
        </div>
        <div class="col-md-4">
    	{!! Form::text('address', $us_prof['address']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('age', 'Age') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('age', $us_prof['age']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('phone', 'Phone') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('phone', $us_prof['phone']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('nationality', 'Nationality') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('nationality', $us_prof['nationality']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('job', 'Job') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('job', $us_prof['job']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('postalCode', 'Postal Code') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('postalCode', $us_prof['postalCode']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('city', 'City') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('city', $us_prof['city']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('country', 'Country') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('country', $us_prof['country']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('language', 'Language') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('language', $us_prof['language']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('biography', 'Biography') !!}
        </div>
        <div class="col-md-4">
        {!! Form::text('biography', $us_prof['biography']) !!}
        </div>
        <div class="col-md-4">
    </div>
    

@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')

  <h1>Create Experience</h1>

  <div class="container-fluid" style="margin-top: 20px;">
  {!! Form::open(['route' => 'experience_store', 'files' => true]) !!}
		{!! Form::token(); !!}
        <div class="col-md-2">
		{!! Form::label('exp_name', 'Experience Name') !!}
        </div>
        <div class="col-md-4">
    	{!! Form::text('exp_name') !!}
    	{!! Form::submit(Lang::get('experience.save')) !!}
        </div>
  {!! Form::close() !!}
  </div>

@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')

<hr>

<style type="text/css">
  .container{
    background: #fff !important;
  }
  .form-group{
    padding-bottom: 40px;
  }
</style>

<div class="row">
  <div class="col-md-offset-2 col-md-8" style="padding-left: 0px; padding-right: 0px;">
  <ul class="nav nav-tabs">
    <li role="basic" class="disabled"><a href="{{route('experience_create')}}">The Basic</a></li>
    <li role="photos" class="active"><a href="#">Photos</a></li>
    <li role="scheduler" class="disabled"><a href="#">Scheduler</a></li>
    <li role="profile" class="disabled"><a href="#">Profile</a></li>
    <li role="payment" class="disabled"><a href="#">Payment</a></li>
    <li role="publish" class="disabled"><a href="#">Publish</a></li>
  </ul>
  <br>
  <hr style="margin-bottom: 0px;">
  <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">The Basic</h1>
  {!! Form::open(['route' => 'experience_store', 'files' => true]) !!}
		{!! Form::token(); !!}
    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>
    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
		    {!! Form::label('exp_name', trans('experience.exp_name')) !!}
      </div>
      <div class="col-md-8">
    	 {!! Form::text('exp_name', null, array('class'=>'form-control','required' => 'required')) !!}
      </div>
    </div>

    <!--div class="form-group">
      {!! Form::label('exp_photo', trans('experience.exp_photo')) !!}
      {!! Form::file('exp_photo', null) !!}
    </div-->

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_location', trans('experience.exp_location')) !!}
      </div>
      <div class="col-md-8">
        {!! Form::text('exp_location', null, array('class'=>'form-control','required' => 'required')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_summary', trans('experience.exp_summary')) !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_summary', null, array('class'=>'form-control','required' => 'required')) !!}
      </div>
    </div>

    <div class="row"></div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_people', trans('experience.exp_people')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_min_people', null, array('class'=>'form-control','required' => 'required')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_min_people', trans('experience.exp_min_people')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_max_people', null, array('class'=>'form-control','required' => 'required')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_max_people', trans('experience.exp_max_people')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_duration', trans('experience.exp_duration')) !!}
      </div>
      <div class="col-md-4">
        {!! Form::number('exp_duration', null, array('class'=>'form-control','required' => 'required')) !!}
      </div>
      <div class="col-md-4">
      {!! Form::select('exp_duration_h', 
          array(
            'Days' => trans('experience.exp_days'),
            'Hours' => trans('experience.exp_hours'),
            'Minutes' => trans('experience.exp_minutes'))
            ,null, array('class'=>'form-control'))
      !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_price', trans('experience.exp_price')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_price', null, array('class'=>'form-control','step' => '0.01','required' => 'required')) !!}
      </div>
      <div class="col-md-4">
        {!! Form::select('exp_currency', $cur, null, array('class'=>'form-control','required' => 'required')) !!}
      </div>

    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_category', trans('experience.exp_category')) !!}
      </div>
      <div class="col-md-8">
        {!! Form::number('exp_category', null, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_private_notes', trans('experience.exp_private_notes')) !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_private_notes', null, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="row"></div>

    <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; margin-left: -15px; margin-right: -15px; height: 90px; padding-top: 30px;">
      {!! Form::submit(Lang::get('experience.save'), array('class' => 'btn btn-success','style'=>'width: 180px;')) !!}
    </div>

    </div>

  {!! Form::close() !!}
  </div>
</div>

@endsection
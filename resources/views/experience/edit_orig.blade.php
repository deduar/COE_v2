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
  <div class="col-md-offset-2 col-md-8" style="border: 1px solid #000; padding-left: 0px; padding-right: 0px;">
  <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">The Basic</h1>
  {!! Form::open(['route' => 'experience_update', 'files' => true]) !!}
		{!! Form::token(); !!}
    {!! Form::hidden('id', $exp->id) !!}
    <div class="container-fluid" style="margin-top: 20px;">

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
		    {!! Form::label('exp_name', trans('experience.exp_name')) !!}
      </div>
      <div class="col-md-8">
    	 {!! Form::text('exp_name', $exp->exp_name, array('class'=>'form-control')) !!}
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
        {!! Form::text('exp_location', $exp->exp_location, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_summary', trans('experience.exp_summary')) !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_summary', $exp->exp_summary, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="row"></div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_people', trans('experience.exp_people')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_min_people', $exp->exp_min_people, array('class'=>'form-control')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_min_people', trans('experience.exp_min_people')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_max_people', $exp->exp_max_people, array('class'=>'form-control')) !!}
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
        {!! Form::number('exp_duration', $exp->exp_duration, array('class'=>'form-control')) !!}
      </div>
      <div class="col-md-4">
      {!! Form::select('exp_duration_h', 
          array(
            'Days' => trans('experience.exp_days'),
            'Hours' => trans('experience.exp_hours'),
            'Minutes' => trans('experience.exp_minutes'))
            ,$exp->exp_duration_h, array('class'=>'form-control'))
      !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_price', trans('experience.exp_price')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_price', $exp->exp_price, array('class'=>'form-control','step' => '0.01')) !!}
      </div>
      <div class="col-md-4">
        {!! Form::select('exp_currency', $cur, $exp->exp_currency, ['class'=>'form-control']) !!}
      </div>

    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_category', trans('experience.exp_category')) !!}
      </div>
      <div class="col-md-8">
        {!! Form::number('exp_category', $exp->exp_category, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_private_notes', trans('experience.exp_private_notes')) !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_private_notes', $exp->exp_private_notes, array('class'=>'form-control')) !!}
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
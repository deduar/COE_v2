@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')


@if(count($errors))
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <br/>
    <h3> {{ trans('experience.form_error') }}</h3>
  </div>
@endif


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
    <li class="active"><a  href="#basic" data-toggle="tab">Basic</a></li>
    <li><a href="#photos" data-toggle="tab">Photos</a></li>
    <li><a href="#scheduler" data-toggle="tab">Scheduler</a></li>
    <li><a href="#profile" data-toggle="tab">Profile</a></li>
    <li><a href="#payment" data-toggle="tab">Payment</a></li>
    <li><a href="#publis" data-toggle="tab">Publish</a></li>
  </ul>
  <hr style="margin-bottom: 0px;">

{!! Form::open(['route' => 'experience_store', 'files' => true]) !!}
    {!! Form::token(); !!}

  <div class="tab-content clearfix">
  <div class="tab-pane active" id="basic">

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">The Basic</h1>

    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>
    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
		    {!! Form::label('exp_name', trans('experience.exp_name' )) !!}
      </div>
      <div class="col-md-8">
    	 {!! Form::text('exp_name', null, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_location', trans('experience.exp_location')) !!}
      </div>
      <div class="col-md-8">
        {!! Form::text('exp_location', null , array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_summary', trans('experience.exp_summary')) !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_summary', null, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="row"></div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_people', trans('experience.exp_people')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_min_people', null, array('class'=>'form-control')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_min_people', trans('experience.exp_min_people')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_max_people', null, array('class'=>'form-control')) !!}
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
        {!! Form::number('exp_duration', null, array('class'=>'form-control')) !!}
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
        {!! Form::number('exp_price', null, array('class'=>'form-control','step' => '0.01')) !!}
      </div>
      <div class="col-md-4">
        {!! Form::select('exp_currency', $cur, null, array('class'=>'form-control')) !!}
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

    </div>    
  
  </div>

  <div id="photos" class="tab-pane">
    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Photos</h1>
    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <div class="form-group">
      {!! Form::label('exp_photo', trans('experience.exp_photo')) !!}
      {!! Form::file('exp_photo', null) !!}
    </div>  
    </div>
  </div>

  <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">
      {!! Form::submit(Lang::get('experience.save'), array('class' => 'btn btn-success','style'=>'width: 180px;')) !!}
    </div>

</div>

{!! Form::close() !!}

  </div>
</div>

@endsection
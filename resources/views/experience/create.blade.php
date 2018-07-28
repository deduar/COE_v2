@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')

@if(count($errors))
  <div class="alert alert-danger">
    <h4> {{ trans('experience.form_error') }}</h4>
    <ul>
      @if ($errors->has('exp_name'))
        <h5><strong>{{trans('experience.error_exp_name')}}</strong></h5>
      @endif
      @if ($errors->has('exp_location'))
        <h5><strong>{{trans('experience.error_exp_location')}}</strong></h5>
      @endif
      @if ($errors->has('exp_summary'))
        <h5><strong>{{trans('experience.error_exp_summary')}}</strong></h5>
      @endif
      @if ($errors->has('exp_min_people'))
        <h5><strong>{{trans('experience.error_exp_min_people')}}</strong></h5>
      @endif
      @if ($errors->has('exp_max_people'))
        <h5><strong>{{trans('experience.error_exp_max_people')}}</strong></h5>
      @endif
      @if ($errors->has('exp_duration'))
        <h5><strong>{{trans('experience.error_exp_duration')}}</strong></h5>
      @endif
      @if ($errors->has('exp_price'))
        <h5><strong>{{trans('experience.error_exp_price')}}</strong></h5>
      @endif
      @if ($errors->has('exp_max_people'))
        <h5><strong>{{trans('experience.error_max_people_minus')}}</strong></h5>
      @endif
    </ul>
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
    <li class="disabled"><a href="{{route('experience_create')}}">Photos</a></li>
    <li class="disabled"><a href="#scheduler" data-toggle="tab">Scheduler</a></li>
    <li class="disabled"><a href="#payment" data-toggle="tab">Payment</a></li>
    <li class="disabled"><a href="#publis" data-toggle="tab">Publish</a></li>
  </ul>
  <hr style="margin-bottom: 0px;">

{!! Form::open(['route' => 'experience_store', 'files' => true]) !!}
    {!! Form::token(); !!}

  <div class="tab-content clearfix">
  <div class="tab-pane active" id="basic">

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">The Basic <span class="btn btn-success" style="height: 40PX; float: right; font-weight: bold;">{!! Form::submit('NEXT', array('class'=>'btn btn-success')) !!} <span class="glyphicon glyphicon-chevron-right"></span></span></h1>

    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>
    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
		    {!! Form::label('exp_name', trans('experience.exp_name' )).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-8">
       {!! Form::text('exp_name', Input::old('exp_name'), array('placeholder'=>trans('experience.exp_name_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_location', trans('experience.exp_location')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-8">
        {!! Form::text('exp_location', Input::old('exp_location'), array('placeholder'=>trans('experience.exp_location_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_summary', trans('experience.exp_summary')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_summary', Input::old('exp_summary'), array('placeholder'=>trans('experience.exp_summary_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>

    <div class="row"></div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_people', trans('experience.exp_people')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_min_people', Input::old('exp_min_people'), array('placeholder'=>trans('experience.exp_min_people_placeHolder'), 'class'=>'form-control','step'=>1,'min'=>1)) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_min_people', trans('experience.exp_min_people')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_max_people', Input::old('exp_max_people'), array('placeholder'=>trans('experience.exp_max_people_placeHolder'), 'class'=>'form-control','step'=>1,'min'=>1)) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_max_people', trans('experience.exp_max_people')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_duration', trans('experience.exp_duration')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-4">
        {!! Form::number('exp_duration', Input::old('exp_duration'), array('placeholder'=>trans('experience.exp_duration_placeHolder'), 'class'=>'form-control')) !!}
      </div>
      <div class="col-md-3">
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
        {!! Form::label('exp_price', trans('experience.exp_price')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_price', Input::old('exp_price'), array('placeholder'=>trans('experience.exp_price_placeHolder'), 'class'=>'form-control','step' => '0.01','min'=>'0')) !!}
      </div>
      <div class="col-md-4">
        {!! Form::select('exp_currency', $cur, null, array('class'=>'form-control')) !!}
      </div>
      <div class="col-md-2">
        <div class="col-md-12">
          <div class="row">
          <div class="col-md-6">
            {!! Form::label('exp_flat', 'Flat', array('style'=>'float: left;')) !!}
          </div>
          <div class="col-md-6">
            {!! Form::label('exp_flat', 'ByPerson') !!}
          </div>
          <div class="col-md-6">
            {!! Form::radio('exp_flat', 1, 0, array('id'=>'exp_flat')) !!}
          </div>
          <div class="col-md-6">
            {!! Form::radio('exp_flat', 0, 1, array('id'=>'exp_flat')) !!}
          </div>
        </div>
      </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_category', trans('experience.exp_category')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-8">
        {!! Form::select('exp_category', $cat, null, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_private_notes', trans('experience.exp_private_notes')) !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_private_notes', Input::old('exp_private_notes'), array('placeholder'=>trans('experience.exp_private_notes_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>

    <div class="row"></div>

    </div>    
  
  </div>


  <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">
    <span class="btn btn-success" style="height: 40PX; font-weight: bold;">{!! Form::submit('NEXT', array('class'=>'btn btn-success')) !!} <span class="glyphicon glyphicon-chevron-right"></span></span>
  </div>

  

</div>

{!! Form::close() !!}

  </div>
</div>

@endsection
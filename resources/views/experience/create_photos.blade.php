@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')


@if(count($errors))
  <div class="alert alert-danger">
    <h4> {{ trans('experience.form_error') }}</h4>
    <ul>
      @if ($errors->has('exp_photo'))
        <h5><strong>{{trans('experience.error_exp_photo')}}</strong></h5>
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
    <li class="disabled"><a  href="#basic" data-toggle="tab">Basic</a></li>
    <li class="active"><a href="#photos">Photos</a></li>
    <li class="disabled"><a href="#scheduler" data-toggle="tab">Scheduler</a></li>
    <li class="disabled"><a href="#payment" data-toggle="tab">Payment</a></li>
    <li class="disabled"><a href="#publis" data-toggle="tab">Publish</a></li>
  </ul>
  <hr style="margin-bottom: 0px;">

{!! Form::open(['route' => 'experience_store_photos', 'files' => true]) !!}
    {!! Form::token(); !!}

  <div class="tab-content clearfix">
  <div class="tab-pane active" id="photos">

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Photos <span class="btn btn-success" style="height: 40PX; float: right; font-weight: bold;">{!! Form::submit('NEXT', array('class'=>'btn btn-success')) !!} <span class="glyphicon glyphicon-chevron-right"></span></span></h1>

    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>

    <div class="form-group" style="padding-bottom: 0px; margin-bottom: 0px;">
      {!! Form::hidden('id',$id) !!}
    </div>

    <div class="form-group">
      {!! Form::label('exp_photo', trans('experience.exp_photo')).' <span class="glyphicon glyphicon-asterisk" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      {!! Form::file('exp_photo', null, array('class'=>'form-control')) !!}
    </div>
     <div class="form-group">
      {!! Form::label('exp_photo', trans('experience.exp_video')) !!}
      {!! Form::text('exp_video', Input::old('exp_video'), array('placeholder'=>trans('experience.exp_video_placeHolder'), 'class'=>'form-control')) !!}
    </div>

    {!! Form::label('exp_more_photo_label', trans('experience.exp_more_photos_label')) !!}
    <div class="form-group">  
      <div class="col-md-4">
        {!! Form::label('exp_more_photo', trans('experience.exp_more_potos')) !!}
      </div>
      <div class="col-md-3">
        <input type="file" name="file[]" multiple>
      </div>
    </div>


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
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
    <li><a  href="{{route('experience_edit_basic',array('id'=>$id))}}" >Basic</a></li>
    <li><a  href="{{route('experience_create_photos',array('id'=>$id))}}" >Photos</a></li>
    <li><a  href="{{route('experience_create_schedule',array('id'=>$id))}}" >Scheduler</a></li>
    <li><a  href="{{route('experience_create_payment',array('id'=>$id))}}" >Payment</a></li>
    <li class="active"><a href="#publish">Publish</a></li>
  </ul>
  <hr style="margin-bottom: 0px;">

{!! Form::open(['route' => 'experience_store_publish', 'files' => true]) !!}
    {!! Form::token(); !!}

  <div class="tab-content clearfix">
  <div class="tab-pane active" id="publish">

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">The Basic </h1>

    <div class="container-fluid" style="margin-top: 0px;padding-bottom: 20px; border:1px solid #ddd;">
    <br><br>

    <div class="form-group" style="padding-bottom: 0px; margin-bottom: 0px;">
      {!! Form::hidden('id',$id) !!}
    </div>

    <div class="form-group">
      <p>Ipsen Lorem PUBLISH</p>
      <div class="col-md-6">
          {!! Form::submit('PUBLISH', array('class'=>'btn btn-success', 'style'=>'height: 80px; font-size: 30px;')) !!}
      </div>
      <div class="col-md-6">
        {!! Form::submit('PREVIEW', array('class'=>'btn btn-pimary', 'style'=>'height: 80px; font-size: 30px; background: #fff; color: #000; border: 1px solid #000')) !!}
      </div>
    </div>

    </div>
  </div>


  <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">
  </div>

</div>

{!! Form::close() !!}

  </div>
</div>

@endsection
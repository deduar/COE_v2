@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')


@if(count($errors))
  <div class="alert alert-danger">
    <h4> {{ trans('experience.form_error') }}</h4>
    <ul>
      @if ($errors->has('exp_paypal'))
        <h5><strong>{{trans('experience.error_exp_paypal')}}</strong></h5>
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
    <li class="disabled"><a href="#photos">Photos</a></li>
    <li class="active"><a href="#scheduler" data-toggle="tab">Scheduler</a></li>
    <li class="disabled"><a href="#payment" data-toggle="tab">Payment</a></li>
    <li class="disabled"><a href="#publis" data-toggle="tab">Publish</a></li>
  </ul>
  <hr style="margin-bottom: 0px;">

{!! Form::open(['route' => 'experience_store_schedule', 'files' => true]) !!}
    {!! Form::token(); !!}

  <div class="tab-content clearfix">
  <div class="tab-pane active" id="schedule">

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Shceduler <span class="btn btn-success" style="height: 40PX; float: right; font-weight: bold;">{!! Form::submit('NEXT', array('class'=>'btn btn-success')) !!} <span class="glyphicon glyphicon-chevron-right"></span></span></h1>

    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>

    <div class="form-group" style="padding-bottom: 0px; margin-bottom: 0px;">
      {!! Form::hidden('id',$id) !!}
    </div>

    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_schedule_type', trans('experience.schedule_type')) !!}
      </div>
      <div class="col-md-8">
        {!! Form::select('exp_schedule_type',
              array(
                'Unavaible' => trans('experience.unavaible'),
                'InstanBook' => trans('experience.instan_book')),
              null, array('class'=>'form-control')
            )
        !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_begin_date', trans('experience.schedule_begin' )) !!}
      </div>
      <div class="col-md-8">
       {!! Form::datetime('exp_begin_date', \Carbon\Carbon::now()->format('d/m/Y H:i'), Input::old('exp_begin_date'), array('placeholder'=>trans('experience.exp_begin_schedule_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_end_date', trans('experience.schedule_end' )) !!}
      </div>
      <div class="col-md-8">
       {!! Form::datetime('exp_end_date', \Carbon\Carbon::now()->format('d/m/Y H:i'), Input::old('exp_end_date'), array('placeholder'=>trans('experience.exp_end_schedule_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="btn btn-success glyphicon glyphicon-plus-sign" style="float: right;">
        <a style="text-decoration: none; color:#fff;" ref="#">
          {{trans('experience.add_schedule')}}
        </a>
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
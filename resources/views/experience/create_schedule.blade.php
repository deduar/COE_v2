@extends('layouts.master_datepicker')

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
    <li><a  href="{{route('experience_edit_basic',array('id'=>$id))}}" >Basic</a></li>
    <li><a  href="{{route('experience_create_photos',array('id'=>$id))}}" >Photos</a></li>
    <li class="active"><a href="#scheduler" data-toggle="tab">Scheduler</a></li>
    <li class="disabled"><a href="">Payment</a></li>
    <li class="disabled"><a href="">Publish</a></li>
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
    
    <div class="row">
      <div class="col-md-3">
        {!! Form::select('exp_schedule_type',
              array(
                'Unavaible' => trans('experience.unavaible'),
                'InstanBook' => trans('experience.instan_book')),
              null, array('class'=>'form-control')
            )
        !!}
      </div>
        <div class='col-md-6'>
            <div class="form-group">
              {!! Form::text('datetimes', Input::old('exp_private_notes'), array('placeholder'=>trans('experience.exp_scheduler'), 'class'=>'form-control')) !!}
              <!--input type="text" name="datetimes" /-->
            </div>
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
  </div>

  <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">
    <span class="btn btn-success" style="height: 40PX; font-weight: bold;">{!! Form::submit('NEXT', array('class'=>'btn btn-success')) !!} <span class="glyphicon glyphicon-chevron-right"></span></span>
  </div>

</div>

{!! Form::close() !!}

  </div>
</div>

<script type="text/javascript">
  $(function() {
      $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(36, 'hour'),
        locale: {
          format: 'YYYY-MM-DD HH:mm '
        }
      });
    });
</script>

@endsection
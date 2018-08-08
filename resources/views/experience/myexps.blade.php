@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<div class="row">

  <div class="row" style="border-bottom: 1px solid #afafaf; margin-bottom: 10px;";>
  <div class="col-md-9 col-xs-6">
    <h2>My Experiences</h2>
  </div>
  <div class="col-md-3 col-xs-6">
    <a class="btn btn-primary" href="{{ route('experience_create') }}" style="margin: 20px 0px; background: #47bbcc; border: 0px; font-size: 16px; font-weight: bold;"><span class="glyphicon glyphicon-plus-sign"></span> {{ trans('profile.create_experience') }}</a>
  </div>
  </div>
  
  @foreach ($myexps as $exp)
  <div class="row" style="margin-bottom: 10px;">
    <div class="col-md-2 col-xs-4" style="height: 120px;">
      <img style="float: center; height: 120px; width: 160px; margin-left: 10px;" src={{asset('uploads/exp/'.$exp->exp_photo)}} >
    </div>
    <div class="col-md-6 col-xs-7" style="height: 120px;">

        <div class="col-md-12">
          <h3 style="color: #000;">{{strtoupper($exp->exp_name)}}</h3>    
        </div>
        <div class="col-md-5" style="color: #000;">
          {{$exp->exp_location}}
        </div>
        <div class="col-md-7">
          {{number_format($exp->exp_price,2,',','.')}} {{$exp->cur_name}} [{{$exp->cur_simbol}}] / @if($exp->exp_flat) {{trans('experience.flat')}} @else {{trans('experience.byperson')}} @endif
        </div>

    </div>
    <div class="col-md-4 col-xs-12" style="height: 120px; margin-top: 10px;">
        <div class="col-md-6 col-xs-4">
          <div class="btn btn-info" style="width: 90%;"><a href="{{route('experience_show',array('id'=>$exp->id))}}"><span class="glyphicon glyphicon-eye-open"> View</span></a></div>
        </div>
        <div class="col-md-6 col-xs-4">
          <div class="btn btn-info" style="width: 90%;"><a href="{{route('experience_edit_basic',array('id'=>$exp->id))}}"><span class="glyphicon glyphicon-pencil"> Edit</span></a></div>
        </div>
        
        <div class="col-md-6 col-xs-4">
          <div class="btn btn-info" style="width: 90%;"><a href="{{route('experience_create_schedule',array('id'=>$exp->id))}}"><span class="glyphicon glyphicon-calendar"> Schedule</span></a></div>
        </div>
        <div class="col-md-6 col-xs-4">
          <div class="btn btn-info" style="width: 90%;"><span class="glyphicon glyphicon-list-alt"> Publish</span></div>
        </div>

        <div class="col-md-6 col-xs-4">
          @if($exp->exp_status == 'Active')
            <div class="btn btn-primary" style="width: 90%;">
              <a style="text-decoration: none; color: #fff;" href="{{route('change_status_experience',array('id'=>$exp->id))}}">Active</a>
            </div>
          @else
            <div class="btn btn-danger" style="width: 90%;">
              <a style="text-decoration: none; color: #fff;" href="{{route('change_status_experience',array('id'=>$exp->id))}}">Inactive</a>
            </div>
          @endif
        </div>
        <div class="col-md-6 col-xs-4">
          @if($exp->exp_published == 'Active')
            <div class="btn btn-primary" style="width: 90%;">Published</div>
          @else
            <div class="btn btn-Danger" style="width: 90%;" >Pending</div>
          @endif
        </div>
    </div>
  </div>
  <hr>
  @endforeach

{!! $myexps->render() !!}
</div>

@endsection
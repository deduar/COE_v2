@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<style type="text/css">
  .carousel-content {
    position: absolute;
    bottom: -10%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    color: #fff;
    text-shadow: 0 1px 2px rgba(0,0,0,.6);
  }
</style>

<style type="text/css">
  .datetimepicker table {
    color: #000;
  }
</style>


<div clas="row">
  @if(count($exp_galleries) > 0)
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <ol class="carousel-indicators">
    @foreach ($exp_galleries as $key=>$exp_gal)
    <li data-target="#myCarousel" data-slide-to="{{$key}}" @if($key==0)class="active"@endif></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach ($exp_galleries as $key=>$exp_gal)
    <div class="item @if($key==0) active @endif" >
      <img src="{{asset('uploads/exp/'.$exp_gal->exp_photo)}}" style="width: 100%; height: 450px;">
      <div class="carousel-content">
        <h3 style="text-align: center;">{{ $exp->exp_location }}</h3>
        <h2 style="text-align: center;">{{ $exp->exp_name }}</h2>
        <h2 style="text-align: center;"> <a style="text-decoration: none; color: #fff;" href="{{route('user_profile')}}">{{trans('experience.with')}} {{$user->name}} {{$user->last_name}}</a></h2>
        <h3 style="text-align: center;"> 00 {{trans('experience.reviews')}}</h3>
        <a style="text-decoration: none; color: #fff;" href="{{route('user_profile')}}"><img style="margin-left: 40%; border: 4px solid #fff; height: 80px; border-radius: 50px; " src="{{asset('uploads/avatars/'.$user->avatar)}}"></a>
      </div>
    </div>
    @endforeach
  </div>

  </div>
  @else
    <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="400px;" style="display: block; margin-left: auto; margin-right: auto;">
    <div class="carousel-content">
        <h3 style="text-align: center;">{{ $exp->exp_location }}</h3>
        <h2 style="text-align: center;">{{ $exp->exp_name }}</h2>
        <h2 style="text-align: center;"> <a style="text-decoration: none; color: #fff;" href="{{route('user_profile')}}">{{trans('experience.with')}} {{$user->name}} {{$user->last_name}}</a></h2>
        <h3 style="text-align: center;"> 00 {{trans('experience.reviews')}}</h3>
        <a style="text-decoration: none; color: #fff;" href="{{route('user_profile')}}"><img style="margin-left: 40%; border: 4px solid #fff; height: 80px; border-radius: 50px; " src="{{asset('uploads/avatars/'.$user->avatar)}}"></a>
      </div>
  @endif

  <div style="margin-top: 30px;" class="content-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="col-md-8">
        {{ $exp->exp_summary }}
      </div>
      <div style="border: 1px solid #efefef; color: #000;" class="col-md-4">
        <h3>{{trans('experience.make_reseravtion')}}</h3>
        <h4>{{$exp->exp_price}} {{$exp->cur_simbol}} [{{$exp->cur_name}}]</h4>
        <h4>
          @if($exp->exp_flat)
            {{trans('experience.flat')}}
          @else
            {{trans('experiemce.by_person')}}
          @endif
        </h4>
        <h4>{{$exp->exp_duration}} {{$exp->exp_duration_h}}</h4>
        <div class="row">
        <div class="col-md-12"><input class="form-control datepick" type="text" placeholder="Date & Time" name="datepick"></div>

        <div class="col-md-12" style="margin-bottom: 30px;">
        <select style="float: right;" class="form-control" >
          <option value="0" selected>{{trans('experience.num_people')}}</option>
          @for($i=$exp->exp_min_people; $i <= $exp->exp_max_people; $i++)
            <option value="{{$i}}">{{$i}}</option>
          @endfor
        </select>
        </div>

        </div>
      </div>
    </div>
  </div>

   <br>
  {{ $exp->email }}
  <hr>
  Summary: {{ $exp->exp_summary }}
  <br><span> Price: {{ number_format($exp->exp_price, 2, '.', ',') }} {{ $exp->cur_simbol }} ({{ $exp->cur_name }})</span>
  <span><br>{{ number_format($exp->exp_price/$exp->cur_exchange, 2, '.', ',') }} US$ (American Dollar)</span>
  <hr>
  @if ($user == null)
        <div>
          <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
        </div>
      @else
        @if($exp->exp_guide_id != $user->id)
          <div>
            <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
          </div>
        @endif
      @endif
  <hr>
  <h2> Reviews here ....</h2>
</div>

<?php 
  $exp_s = null;
  foreach ($exp_schedule as $key => $exp_sch) {
    $exp_s = explode(' ','"'.$exp_sch->exp_begin_date)[0].'",'.$exp_s;
  }
?>

{!! Html::script('assets/js/jquery-1.11.1.min.js') !!}
<script>
  $(document).ready(function() {
    var todayDate = new Date().getDate();
    var datesForDisable = [<?php echo $exp_s; ?>];
    $('.datepick').datetimepicker({
      showSecond: true,
      dateFormat: 'dd/mm/YYYY hh:mm',
      timeFormat: 'hh:mm',
      stepHour: 1,
      stepMinute: 10,
      stepSecond: 10,
      pickTime: false,
      startDate : new Date(new Date().setDate(todayDate)),
      datesDisabled: datesForDisable,
    });
  });
</script>

@endsection
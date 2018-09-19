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
        <h2 style="text-align: center;"> <a style="text-decoration: none; color: #fff;" href="{{route('user_profile_guide',$exp->exp_guide_id)}}">{{trans('experience.with')}} {{strtoupper($exp->user_name)}} {{strtoupper($exp->user_last_name)}}</a></h2>
        <h3 style="text-align: center;"> 00 {{trans('experience.reviews')}}</h3>
        <a style="text-decoration: none; color: #fff;" href="{{route('user_profile_guide',$exp->exp_guide_id)}}"><img style="margin-left: 40%; border: 4px solid #fff; height: 80px; border-radius: 50px; " src="{{asset('uploads/avatars/'.$exp->user_avatar)}}"></a>
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
        <h2 style="text-align: center;"> <a style="text-decoration: none; color: #fff;" href="{{route('user_profile')}}">{{trans('experience.with')}} {{strtoupper($exp->user_name)}} {{strtoupper($exp->user_last_name)}}</a></h2>
        <h3 style="text-align: center;"> 00 {{trans('experience.reviews')}}</h3>
        <a style="text-decoration: none; color: #fff;" href="{{route('user_profile')}}"><img style="margin-left: 40%; border: 4px solid #fff; height: 80px; border-radius: 50px; " src="{{asset('uploads/avatars/'.$user->avatar)}}"></a>
      </div>
  @endif

  <div style="margin-top: 30px;" class="content-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="col-md-8">
        {{ $exp->exp_summary }}
      </div>
      @if ($exp->exp_guide_id != $user->id)
      <div style="border: 1px solid #efefef; color: #000;" class="col-md-4">
        {!! Form::open(['route' => 'reservation_confirm', 'files' => true]) !!}
        <input type="hidden" name="exp_id" value="{{$exp->exp_id}}">
        <h3 style="text-align: center;">{{trans('experience.make_reservation')}}</h3><hr style="border: 1px solid #000;">
        <div class="col-md-4"><h4>{{trans('experience.price')}}</h4></div>
        <div class="col-md-8"><h4 style="float: right;">{{number_format($exp->exp_price,2,',','.')}} {{$exp->cur_simbol}} </h4></div>
        <div class="col-md-4">[{{$exp->cur_name}}]</div>
        <div class="col-md-8">
          <h4 style="float: right;">
          @if($exp->exp_flat)
            {{trans('experience.flat')}}
          @else
            {{trans('experience.by_person')}}
          @endif          
          </h4>
        </div>
        <div class="col-md-4"><h4>{{trans('experience.duration')}}</h4></div>
        <div class="col-md-8"><h4 style="float: right;">{{$exp->exp_duration}} {{$exp->exp_duration_h}}</h4></div>
        <div class="row">
        <div class="col-md-12"><input style="margin-top: 10px; margin-bottom: 10px;" class="form-control datepick" type="text" placeholder="Date & Time" name="datepick" required></div>

        <div class="col-md-12" style="margin-bottom: 30px;">
        <select style="float: right;" class="form-control" name="pax" required >
          <option value="" selected>{{trans('experience.num_people')}}</option>
          @for($i=$exp->exp_min_people; $i <= $exp->exp_max_people; $i++)
            <option value="{{$i}}">{{$i}}
              @if($i==1){{trans('experience.person')}}@else{{trans('experience.people')}}@endif
            </option>
          @endfor
        </select>
        </div>
        </div>
        <div class="col-md-12">
            <button style="margin-bottom: 10px; width: 100%;" type="submit" class="btn btn-primary">{{trans('experience.reservar')}}</button>
        </div>
        {!! Form::close() !!}
      </div>
      @endif
    </div>
  </div>

   <br>
  {{ $exp->email }}
  <hr>
  Summary: {{ $exp->exp_summary }}
  <br><span> Price: {{ number_format($exp->exp_price, 2, '.', ',') }} {{ $exp->cur_simbol }} ({{ $exp->cur_name }})</span>
  <span><br>{{ number_format($exp->exp_price/$exp->cur_exchange, 2, '.', ',') }} US$ (American Dollar)</span>
  
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
      autoclose: true,
      todayBtn: true,
      minuteStep: 30,
      format: "mm/dd/yyyy hh:ii",
      startDate : new Date(new Date().setDate(todayDate)),
      datesDisabled: datesForDisable,
    });
  });
</script>

@endsection
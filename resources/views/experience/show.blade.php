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
  @endif

  <hr>
  <a href="{{ route('user_show',array('id'=>$exp->exp_guide_id)) }}">
    <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="float: right; border-radius: 50%;">
  </a>
  {{ $exp->name }} {{ $exp->last_name }} <br>
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

@endsection
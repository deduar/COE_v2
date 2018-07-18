@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>Experience Detail</h1>

<div clas="row">

  <!--img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="400px;" style="display: block; margin-left: auto; margin-right: auto;"-->
  <br>
  <span style="padding-left: 30px; font-size: 28px; color: #000;">{{ strtoupper($exp->exp_name) }}</span>
  <hr>

  @if(count($exp_galleries) > 0))
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
      <img src="{{asset('uploads/exp/'.$exp_gal->exp_photo)}}" style="width: 100%; height: 350px;">
    </div>
    @endforeach
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
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
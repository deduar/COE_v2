@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<style type="text/css">
  .container{
    width: 100%;
    padding-right: 0px;
    padding-left: 0px;
    background: #eaeaea;
    padding-top: 20px;
  }
  .glyphicon-star{
    color: #e67e22;
    font-size: 11px;
  }
  .half {
    position:relative;
  }
  .half:after {
    content:'';
    position:absolute;
    z-index:1;
    background:#fff;
    width: 50%;
    height: 100%;
    left: 47%;
  }
</style>

<div class="container-fluid">

  <div class="activity container-fluid" style="color: #000; font-weight: normal;">
    <div class="col-md-12" style="margin-bottom: 30px; margin-top: 10px;">
      <div class="col-md-7 col-md-offset-2"><input class="form-control" type="text" name="seacr"></div>
      <div class="col-md-2"><div class="btn btn-primary" style="height: 35px; width: 160px; font-size: 18px; font-style: bold;"> {{trans('experience.search')}} </div></div>
    </div>      
      <div style="width: 90%; margin-left: 60px;">
      @foreach($experiences as $exp)
      <div class="col-md-4" style="margin-bottom: 30px; height: 460px;">
        <div class="row" style="margin-right: 30px; margin-left: 30px;">
          <div class="col-md-12" style="padding: 0px;">
            <a href="{{route('experience_show',array('id'=>$exp->exp_id))}}">
              <img width="100%" height="300px;" src={{asset('uploads/exp/'.$exp->exp_photo)}} >
            </a>
          </div>
          <div class="col-md-12" style="background: #fff; height: 50px;">
            <h4 style="font-weight: bold;">{{ strtoupper($exp->exp_name) }}</h4>
          </div>

          <div class="col-md-12" style="background: #fff; padding-top: 10px; height: 50px;">
            with {{ $exp->name }} {{ $exp->last_name }} in {{ $exp->exp_location }}
          </div>
          <div class="col-md-12" style="background: #fff; padding-top: 10px; height: 40px;">
            <div class="col-md-8" style="padding: 0px;">
            <span style="background: #ccc; padding: 3px; color: #000;">00 {{trans('user.reviews')}}</span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star half"></span>
            </div>
            @if(Auth::guest())
            <div class="col-md-4" style="padding: 0px;"><div class="btn btn-success" style="padding: 0px; height: 25px; width: 80px;"><a href="{{route('experience_show',array('id'=>$exp->exp_id))}}" style="text-decoration: none; color: #fff;">{{trans('experience.reservation')}}</a></div></div>
            @else
              @if ($exp->exp_guide_id != $user->id)
            <div class="col-md-4" style="padding: 0px;"><div class="btn btn-success" style="padding: 0px; height: 25px; width: 80px;"><a href="{{route('experience_show',array('id'=>$exp->exp_id))}}" style="text-decoration: none; color: #fff;">{{trans('experience.reservation')}}</a></div></div>
              @endif
            @endif
          </div>
          <div class="col-md-12" style="background: #fff; height: 40px;">
            <h4>{{str_limit($exp->exp_summary, $limit="25", $end=" ...")}}</h4>
          </div>
        </div>
      </div>
      @endforeach

      </div>
      <div class="col-md-12">
        <div class="btn btn-primary center-block" style="margin-top: 30px; margin-bottom: 30px; height: 40px; width: 40%; font-size: 16px; font-weight: bold;">{{trans('experience.load_more')}}</div>
      </div>
  </div>

{!! $experiences->render() !!}
</div>
@endsection
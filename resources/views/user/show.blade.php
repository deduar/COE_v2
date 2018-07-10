@extends('layouts.master')

@section('title', 'Coesperiences: ChangePassword')

@section('sidebar')
@endsection

@section('content')

<style type="text/css">
  .container{
    background: #fff !important;
  }
  .form-group{
    padding-bottom: 40px;
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


<div class="row" style="margin-bottom: 30px;">
  <div class="col-md-offset-2 col-md-8" style="padding-left: 0px; padding-right: 0px;">

    <div class="container-fluid" style="margin-top: 20px;">
        <div class="col-md-3 col-md-offset-1" style="border: 1px solid #000; padding-top: 10px; padding-bottom: 10px;">
        <img src={{ asset('uploads/avatars/'.$user->avatar)}} height="170px;">
        <hr>
        <h4 style="color: #000; font-weight: bold;">{{ $user->name }} {{ $user->last_name }}</h4>
        <h5>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty half"></span>
        </h5>
        <div class="btn btn-primary" style="width: 100%">{{trans('user.mycollection')}}</div>
        </div>
        <div class="col-md-6">
            <div class="btn btn-default" style="float:right;"><a style="text-decoration: none;" href="{{route('edit_profile')}}">{{trans('exp.edit')}}</a></div>
            <div class="col-md-12">
                <h4>{{trans('user.biography')}}</h4>
                <span style="height: 90%; width: 90%;">{{$user->biography}}</span>
                <hr>
            </div>
            <div class="col-md-12">
                <h4>{{trans('user.review')}}</h4>
                <hr>
            </div>

        </div>
    </div>

    <div class="container-fluid" style="margin-top: 20px;">
        @foreach ($myexps as $exp)
        <div class="col-md-12" style="border: 1px solid #ccc; width: 90%;height: 120px; margin-top: 10px; padding-top: 10px; margin-left: 10px;">
            <div class="col-md-3">
                <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="85px;">
            </div>
            <div class="col-md-9">
                <div class="col-md-6"><h4>{{$exp->exp_name}}</h4></div>
                <div class="col-md-6"><h5>{{$exp->cur_simbol}} {{$exp->exp_price}} {{$exp->cur_name}}</h5></div>
                <div class="btn btn-default" style="float:right;">{{trans('exp.detail')}}</div>
            </div>
            <h5>
                <span style="background: #ccc; padding: 3px; color: #000;">{{trans('user.reviews')}}</span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty half"></span>
            </h5>
        </div>
        @endforeach
    </div>

  </div>
</div>
{!! $myexps->render() !!}
@endsection
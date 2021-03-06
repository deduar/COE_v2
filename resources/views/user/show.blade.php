@extends('layouts.master')

@section('title', 'Coesperiences: Show Profile')

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
  <div class="col-md-offset-1 col-md-10" style="padding-left: 0px; padding-right: 0px;">

    <div class="container-fluid" style="margin-top: 20px;">
        <div class="col-md-3 col-md-offset-1" style="padding-top: 10px; padding-bottom: 10px;">
        <img src={{ asset('uploads/avatars/'.$user->avatar)}} style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
        <hr>
        <h4 style="color: #000; font-weight: bold;">{{ $user->name }} {{ $user->last_name }}</h4>
        <h5>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            <span class="glyphicon glyphicon-star-empty half"></span>
        </h5>
        <div class="btn btn-default" style="width: 100%">{{trans('user.my_collection')}}</div>
        </div>
        <div class="col-md-6">
            <div class="btn btn-default" style="float:right;"><a style="text-decoration: none;" href="{{route('edit_profile')}}">{{trans('user.profile_edit')}}</a></div>
            <div class="col-md-12">
                <h4>{{trans('user.biography')}}</h4><hr>
                <div style="text-align: justify;">{{$user->biography}}</div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 20px;">
        @foreach ($myexps as $exp)
        <div class="col-md-12" style="border: 1px solid #ccc; width: 90%;height: 145px; margin-top: 10px; padding-top: 10px; margin-left: 10px;">
            <div class="row">
            <div class="col-md-2">
                <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="85px;">
            </div>
            <div class="col-md-10">
                <div class="col-md-8">
                    <h4 style="color: #000;">{{strtoupper($exp->exp_name)}}</h4>
                    <h6>{{trans('experience.exp_location')}}: {{$exp->exp_location}}</h6> 
                    <h6>{{trans('experience.exp_min_people')}}: {{$exp->exp_min_people}} {{trans('experience.exp_max_people')}}: {{$exp->exp_max_people}} {{trans('experience.people')}} </h6>
                    <h6>{{trans('experience.duration')}}: {{$exp->exp_duration}} {{$exp->exp_duration_h}}</h6>
                </div>
                <div class="col-md-2"><h5>{{$exp->cur_simbol}} {{$exp->exp_price}} <h6>{{$exp->cur_name}}</h6></h5></div>
                <div class="col-md-2">
                    <div class="btn btn-default" style="float:right;">
                        <a style="text-decoration: none;" href="{{route('experience_show',array('id'=>$exp->exp_id))}}">{{trans('user.exp_detail')}}</a>
                    </div>

                    @if($exp->exp_status == 'Active')
                        <div class="btn btn-primary" style="float:right; width: 75px;">
                          <a style="text-decoration: none; color: #fff;" href="{{route('change_status_experience',array('id'=>$exp->id))}}">Active</a>
                        </div>
                    @else
                        <div class="btn btn-danger" style="float:right; width: 75px;">
                          <a style="text-decoration: none; color: #fff;" href="{{route('change_status_experience',array('id'=>$exp->id))}}">Inactive</a>
                        </div>
                    @endif

                </div>
            </div>
            <div class="col-md-3">
                <span style="background: #ccc; padding: 3px; color: #000;">{{trans('user.reviews')}}</span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty half"></span>
            </div>
            </div>
        </div>
        @endforeach
    </div>

  </div>
</div>
{!! $myexps->render() !!}
@endsection
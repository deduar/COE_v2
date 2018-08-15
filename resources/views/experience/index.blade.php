@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<h1>All Experiences</h1>

<div class="container-fluid" style="margin-bottom: 20px;">
  <div class="col-md-offset-1 col-md-10" style="padding: 0px;">
  @foreach($experiences as $exp)
    <div class="col-md-4" style="margin-bottom: 30px;">
      
      <div class="col-md-12" style="padding: 0px;">
        <a href="{{route('experience_show',array('id'=>$exp->exp_id))}}">
          <img style="display: block; width: 100%; height: 278px; margin-left: auto; margin-right: auto;" src="{{asset('uploads/exp/'.$exp->exp_photo)}}" >
        </a>
      </div>

      <div class="col-md-12" style="border: 1px solid #000; border-bottom: 0px; height: 70px;">
        <h3 style="color: #000; margin-top: 0px;">{{ strtoupper($exp->exp_name) }}</h3>
      </div>
      <div class="col-md-12" style="border-left: 1px solid #000; border-right: 1px solid #000; height: 80px;">
        {{ $exp->name }} {{ $exp->last_name }}
        <span><br>{{ number_format($exp->exp_price, 2, '.', ',') }} {{ $exp->cur_simbol }} ({{ $exp->cur_name }})</span>
        <span><br>{{ number_format($exp->exp_price/$exp->cur_exchange, 2, '.', ',') }} US$ (American Dollar)</span>
      </div>
      <div class="col-md-12" style="border: 1px solid #000; border-top: 0px; height: 60px;">
        @if(Auth::user())
          <a href="{{ route('user_show',array('id'=>$exp->user_id)) }}">
            <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="float: right; border-radius: 50%;">
          </a>
          @if($exp->exp_guide_id != $user->id)
            <div>
              <a class="btn btn-success" href="{{route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
            </div>
          @endif
        @else
          <div class="btn btn-success">
            <a style="text-decoration: none; color: #fff; font-size: 14px; font-weight: bold;" href="{{route('reservation_create',array('id'=>$exp->exp_id))}}">{{trans('experience.reservation') }}</a>
          </div>
        @endif
      </div>

    </div>
  @endforeach
  </div>
</div>

{!! $experiences->render() !!}

@endsection
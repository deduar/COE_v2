@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<h1>All Experiences</h1>

<div class="container-fluid" style="margin-bottom: 20px;">
  <div class="col-md-offset-1 col-md-10" style="padding: 0px;">
  @foreach($experiences as $exp)
    <div class="col-sm-8 col-md-4" style="background: #fff; height: 540px;">
    
      <a href="{{route('experience_show',array('id'=>$exp->exp_id))}}">
        <img style="display: block; width: 100%; height: 300px; margin-left: auto; margin-right: auto;" src={{asset('uploads/exp/'.$exp->exp_photo)}} >
      </a>
      <div style="border: 1px solid #000; padding: 5px;">  
      <span style="padding-left: 30px;">{{ $exp->exp_name }}</span>
      <hr>
      <a href="{{ route('user_show',array('id'=>$exp->user_id)) }}">
        <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="float: right; border-radius: 50%;">
      </a>
      {{ $exp->name }} {{ $exp->last_name }} <br>
      {{ $exp->email }}
      <span><br>{{ number_format($exp->exp_price, 2, '.', ',') }} {{ $exp->cur_simbol }} ({{ $exp->cur_name }})</span>
      <span><br>{{ number_format($exp->exp_price/$exp->cur_exchange, 2, '.', ',') }} US$ (American Dollar)</span>
      @if ($user == null)
        <div>
          <a class="btn btn-success" style="float: right; margin-top: 12px;" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
        </div>
      @else
        @if($exp->exp_guide_id != $user->id)
          <div>
            <a class="btn btn-success" style="float: right" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
          </div>
        @endif
      @endif
      </div>
    </div>
  @endforeach
  </div>
</div>

{!! $experiences->render() !!}

@endsection
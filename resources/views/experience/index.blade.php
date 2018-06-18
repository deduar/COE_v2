@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>All Experiences</h1>

<div clas="row">
  @foreach($experiences as $exp)
    <div class="col-md-4" style="padding: 20px; margin: 10px; height: 410px; width: 30%; border: solid 1px #ebeae6; padding-bottom: 10px; background: #fff; ">
      <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="180px;" width="100%;" style="display: block; margin-left: auto; margin-right: auto;">
      <br>
      <span style="padding-left: 30px;">{{ $exp->exp_name }}</span>
      <hr>
      <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="float: right; border-radius: 50%;">
      {{ $exp->name }} {{ $exp->lastName }} <br>
      {{ $exp->email }}
      <span><br>${{ $exp->exp_price }} US</span>
      @if($exp->exp_guide_id != $user->id)
        <div>
          <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->id)) }}">{{ trans('experience.reservation') }}</a>
        </div>
      @endif
    </div>
  @endforeach
</div> 

{!! $experiences->render() !!}

@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>Experience Detail</h1>

<div clas="row">

    
      <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="400px;" width="100%;" style="display: block; margin-left: auto; margin-right: auto;">
      <br>
      <span style="padding-left: 30px;">{{ $exp->exp_name }}</span>
      <hr>
      <a href="{{ route('user_show',array('id'=>$exp->exp_guide_id)) }}">
        <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="float: right; border-radius: 50%;">
      </a>
      {{ $exp->name }} {{ $exp->lastName }} <br>
      {{ $exp->email }}
      <hr>
      Summary: {{ $exp->exp_summary }}
      <br><span> Price: {{ number_format($exp->exp_price, 2, '.', ',') }} {{ $exp->cur_simbol }} ({{ $exp->cur_name }})</span>
      <span><br>{{ number_format($exp->exp_price/$exp->cur_exchange, 2, '.', ',') }} US$ (American Dollar)</span>
      <hr>
      @if($exp->exp_guide_id != $user->id)
        <div>
          <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->exp_id)) }}">{{ trans('experience.reservation') }}</a>
        </div>
      @endif
    

</div> 

@endsection
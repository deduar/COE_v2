@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <!--h1>Reservations Waiting<h5>{{ \Carbon\Carbon::parse($now)->format('d/m/Y H:m:s') }}</h5></h1-->

<div class="container-fluid" style="margin-bottom: 10px;">
  <div class="col-md-8">
    <div class="col-md-6 vcenter">
      <h1>{{trans('reservation.my_reservation')}}</h1>
    </div>
    <div class="col-md-4 vcenter">
      <h4>{{ \Carbon\Carbon::parse($now)->format('d/m/Y H:m') }}</h4>
    </div>
  </div>
  <div class="col-md-4">
    <a class="btn btn-info" href="{{ route('reservation') }}" style="float: right; margin-top: 20px;">{{ trans('experience.my_reservations') }}</a>
  </div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">{{trans('reservation.experience_name')}}</th>
      <th scope="col">{{trans('reservation.reservation_date')}}</th>
      <th scope="col">{{trans('reservation.contact_guide')}}</th>
      <th colspan="2" scope="col" style="text-align: center;">{{trans('reservation.guide_name')}}</th>
      <th scope="col">{{trans('reservation.status')}}</th>
      <th scope="col" style="text-align: center;">{{trans('reservation.action')}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reservations as $res)
      @if($res->res_user_id === $user->id)
      <tr>
      <th scope='col'>{{$res->exp_name}}</th>
      @if(Session::get('locale') == "es")
        <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('d/m/Y H:i') }}</th>
      @else
        <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('m/d/Y H:i') }}</th>
      @endif
      <th scope='col'><a href="{{route('messages')}}"><div class="btn btn-success">{{trans('reservation.mail_to_guide')}}</div></a></th>
      <th scope='col'>{{$res->user_name}} {{$res->last_name}}</th>
      <th scope='col'>
        <img src={{asset('uploads/avatars/'.$res->avatar)}} height="40px" style="border-radius: 50%">
      </th>
      @if($res->status === "Waiting")
        <th scope='col'><button class='btn btn-success'>{{$res->status}}</button</th>
        <th scope='col'>
          <button class='btn btn-danger'><a style='text-decoration:none; color:fff;' href="{{route('reservation_canceled',array('id'=>$res->res_id))}}">Cancel</a></button>
          <button class='btn btn-info'><a style='text-decoration:none; color:fff;' href='./reservation/pay_tansfer/$res->res_id'>Pay Transfer</a></button>
          <button class='btn btn-info'>Pay PayPal</button>
        </th>
      @endif
      @if($res->status === "Canceled")
        <th scope='col'><button class='btn btn-danger'>{{$res->status}}</button</th>
        <th></th>
      @endif
      @if($res->status === "Accepted")
        <th scope='col'><button class='btn btn-primary'>{{$res->status}}</button</th>
        <th></th>
      @endif
      </tr>
      @endif
    @endforeach
  </tbody>
</table>

<a class="btn btn-info" href="{{ route('reservation') }}" style="float: right; margin-top: 20px;">{{ trans('experience.my_reservations') }}</a>

</div>

{!! $reservations->render() !!}

@endsection
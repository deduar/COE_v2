@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<style type="text/css">
  .vcenter {
    display: inline-block;
    vertical-align: middle;
    float: none;
  }
</style>

<div class="container-fluid">
  <div class="col-md-8">
    <div class="col-md-6 vcenter">
      <h1>{{trans('reservation.reservation_list')}}</h1>
    </div>
    <div class="col-md-4 vcenter">
      <h4>{{ \Carbon\Carbon::parse($now)->format('d/m/Y H:m') }}</h4>
    </div>
  </div>
  <div class="col-md-4">
    @if($user->group == 'Guide')
      <a class="btn btn-info" href="{{ route('reservation_list') }}" style="float: right; margin-top: 20px;">{{ trans('reservation.list') }}</a>
    @endif
  </div>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">{{trans('reservation.experience_name')}}</th>
      <th scope="col">{{trans('reservation.reservation_date')}}</th>
      <th scope="col">{{trans('reservation.contact_travel')}}</th>
      <th colspan="2" scope="col" style="text-align: center;">{{trans('reservation.travel_name')}}</th>
      <th scope="col" style="text-align: center;">{{trans('reservation.status')}}</th>
      <th scope="col" style="text-align: center;">{{trans('reservation.paid')}}</th>
      <th scope="col" style="text-align: center;">{{trans('reservation.action')}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($reservations_list_waiting as $res)

  		<tr>
  		<th scope='col'>{{$res->exp_name}}</th>
      @if(Session::get('locale') == "es")
        <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('d/m/Y H:i') }}</th>
      @else
        <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('m/d/Y H:i') }}</th>
      @endif
  		<th scope='col'><a href="{{route('messages')}}"><div class="btn btn-success">{{trans('reservation.mail_to_travel')}}</div></a></th>
  		<th scope='col'>{{$res->user_name}} {{$res->last_name}}</th>
  		<th scope='col'>
				<img src={{asset('uploads/avatars/'.$res->avatar)}} height="40px" style="border-radius: 50%">
  		</th>
      @if($res->status == "Waiting")
  		  <th scope='col'>
          <button class='btn btn-success'>{{$res->status}}</button>
        </th>
      @endif
      @if($res->status == "Canceled")
        <th scope='col'><button class='btn btn-danger'>{{$res->status}}</button></th>
        <th></th>
      @endif
      @if($res->status == "Rejected")
        <th scope='col'><button class='btn btn-danger'>{{$res->status}}</button></th>
        <th></th>
      @endif
      @if($res->status == "Accepted")
        <th scope='col'><button class='btn btn-primary'>{{$res->status}}</button></th>
        <th></th>
      @endif
      @if($res->status == "Expired")
        <th scope='col'><button class='btn btn-secondary'>{{$res->status}}</button></th>
      @endif
      @if ($res->paid == "Authorized")
        <th><button class='btn btn-primary'>{{trans('reservation.authorized')}}</button></th>
      @endif
      @if ($res->paid == "Take")
          <th><button class='btn btn-success'>{{trans('reservation.taked')}}</button></th>
      @endif
      @if ($res->paid == "Unpaid")
        <th><button class='btn btn-info'>{{trans('reservation.unpaid')}}</button></th>
      @endif
      <th>
        <a href="{{route('reservation_rejected',array('id'=>$res->res_id))}}"><button class='btn btn-warning'>{{trans('reservation.reject')}}</button></a>
        @if($res->paid == "Authorized")
          <a href="{{route('reservation_accepted',array('id'=>$res->res_id))}}"><button class='btn btn-success'>{{trans('reservation.take')}}</button></a>
        @endif
      </th>
  		</tr>
  	@endforeach
  </tbody>
</table>

@if($user->group == 'Guide')
  <a class="btn btn-info" href="{{ route('reservation_list') }}" style="float: right; margin-bottom: 20px;">{{ trans('reservation.list') }}</a>
@endif

</div>

{!! $reservations_list_waiting->render() !!}

@endsection
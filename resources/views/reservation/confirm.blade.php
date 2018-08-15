@extends('layouts.master')

@section('title', 'Coesperiences: Create Reservation')

@section('content')

  <h1>{{trans('reservation.confirmation')}}</h1>
  
  <div class="container-fluid" style="margin-top: 20px;">
  {!! Form::open(['route' => 'reservation_store', 'files' => true]) !!}
  
  {!! Form::token(); !!}
  <div class="col-md-12">
    <div class="col-md-8">
      <div class="col-md-12"> {{ $exp->exp_name }} </div>
      <div class="col-md-4"> {{ $guide->name }}</div>
      <div class="col-md-8"> <img style="margin-left: 40%; border: 4px solid #fff; height: 80px; border-radius: 50px; " src="{{asset('uploads/avatars/'.$guide->avatar)}}"> </div>
      <div class="col-md-4"> Fecha de la reserva</div>
      <div class="col-md-8"> {{ $data['date'] }}</div>
      <div class="col-md-4"> Número de viajeros</div>
      <div class="col-md-8"> {{ $data['pax'] }} Viajeros</div>
      <div class="col-md-4"> Costo</div>
      <div class="col-md-8"> {{ $data['amount'] }} {{$exp->exp_currency}}</div>
    </div>
    <div class="col-md-4">
      Confirmar
    </div>
  </div>
  {!! Form::close() !!}
  </div>
  
@endsection
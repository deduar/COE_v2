@extends('layouts.master')

@section('title', 'Coesperiences: Create Reservation')

@section('content')

  <h1>{{trans('reservation.confirmation')}}</h1>
  
  <div class="container-fluid" style="margin-top: 20px;">
  {!! Form::open(['route' => 'reservation_store', 'files' => true]) !!}
  {!! Form::token(); !!}
  {!! Form::hidden('date', $data['date']) !!}
  {!! Form::hidden('exp_id', $data['exp_id']) !!}
  {!! Form::hidden('guide_id', $data['guide_id']) !!}
  {!! Form::hidden('flat', $data['flat']) !!}
  {!! Form::hidden('price', $data['price']) !!}
  {!! Form::hidden('pax', $data['pax']) !!}
  {!! Form::hidden('amount', $data['amount']) !!}
  <div class="col-md-12">

    <div class="col-md-6 col-md-offset-1" style="border: 1px solid #000;"></div>
    <div class="col-md-3 col-md-offset-1">
      <div class="row" style="border: 1px solid #000; margin-bottom: 10px;">
        <div class="col-md-12"><img style="height: 220px; width: 220px; padding: 10px;" src="{{asset('uploads/exp/'.$exp->exp_photo)}}"> </div>
        <div class="col-md-12"><h4 style="color: #000; text-align: center;">{{$exp->exp_name}}</h4></div>
        <div class="col-md-12"><h6 style="color: #000; text-align: center;">{{trans('reservation.with')}} {{$guide->name}} {{$guide->last_name}}, {{$exp->exp_location}}</h6></div>
        <hr style="border: 1px solid #cecece; width: 90%;">
        <div class="col-md-12">{{trans('reservation.for')}} {{$data['pax']}} @if($data['pax']>1){{trans('experience.people')}}@else{{trans('reservation.person')}}@endif , {{trans('reservation.on_date')}} {{$data['date']}}</div>
        <hr style="width: 90%;">
        <div class="col-md-12">{{trans('reservation.rate')}} {{$data['price']}} {{$exp->exp_currency}} {{trans('reservation.by_person')}} {{trans('reservation.by')}} {{$exp->exp_duration}}  {{$exp->exp_duration_h}}</div>
        <br>
        <hr style="width: 90%;">
        <div class="col-md-12">{{trans('reservation.sub_total')}}{{$data['amount']}} {{$exp->exp_currency}}</div>
        <div class="col-md-12" style="margin-bottom: 10px;">{{trans('reservation.total')}}{{$data['amount']}} {{$exp->exp_currency}}</div>
      </div>
      <div class="row" style="border: 1px solid #000; margin-bottom: 10px;">
        <hr style="width: 90%;">
        <div class="col-md-12">{{trans('reservation.how_work')}}</div>
        <hr style="width: 90%;">
        <div class="col-md-12">{{trans('reservation.instan_book')}}</div>
        <div class="col-md-12">{{trans('reservation.instan_book_text')}}</div>
        <div class="col-md-12" style="margin-top: 10px;">{{trans('reservation.other_reservation')}}</div>
        <div class="col-md-12">{{trans('reservation.instan_other_reservation_text')}}</div>
        <div class="col-md-12" style="margin-top: 10px;">{{trans('reservation.secure_booking')}}</div>
        <div class="col-md-12" style="margin-bottom: 10px;">{{trans('reservation.secure_booking_text')}}</div>
      </div>
    </div>

    <!--div class="col-md-8">
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
      <button style="margin-bottom: 10px; width: 100%;" name="reserv" value="confirm" type="submit" class="btn btn-primary">{{trans('experience.confirm')}}</button>
      <button style="margin-bottom: 10px; width: 100%;" name="reserv" value="paypal" type="submit" class="btn btn-primary">{{trans('experience.payPal')}}</button>
      <button style="margin-bottom: 10px; width: 100%;" name="reserv" value="bank" type="submit" class="btn btn-primary">{{trans('experience.payBank')}}</button>
    </div-->
  </div>
  {!! Form::close() !!}
  </div>
  
@endsection
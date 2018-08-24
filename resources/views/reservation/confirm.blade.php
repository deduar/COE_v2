<style type="text/css">
  .container{
    background: #f0f0f0;
    width: 100% !important;
  }
</style>

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

    <div class="col-md-6 col-md-offset-1" style="border: 1px solid #000; background: #fff; padding-top: 10px; padding-bottom: 10px; margin-top: 10px;">
      <h4>{{trans('reservation.pay_msg')}}</h4>
      <ul class="nav nav-tabs">
        <li class="active"><a  href="#PayPal" data-toggle="tab">PayPal</a></li>
        <li><a href="#BankTransfer" data-toggle="tab">Bank Transfer</a></li>
      </ul>

      <div class="tab-content clearfix" style="margin-top: 20px;">
        <div class="tab-pane active" id="PayPal">
          <div class="form-group" style="padding-top: 10px; padding-bottom: 30px;">
            <div class="col-md-4">
              {!! Form::label('postal_code', trans('reservation.postal_code')) !!}  
            </div>
            <div class="col-md-8">
              {!! Form::text('postal_code', Input::old('postl_code'), array('placeholder'=>trans('reservation.palce_code_placeHolder'), 'class'=>'form-control')) !!}
            </div>
          </div>
          <div class="form-group" style="padding-top: 10px; padding-bottom: 30px;">
            <div class="col-md-4">
              {!! Form::label('mobile_nomber', trans('reservation.mobile_number')) !!}  
            </div>
            <div class="col-md-8">
              {!! Form::text('mobile_nomber', Input::old('mobile_nomber'), array('placeholder'=>trans('reservation.mobile_nomber_placeHolder'), 'class'=>'form-control')) !!}
            </div>
          </div>
          <div class="form-group" style="padding-top: 10px; padding-bottom: 30px;">
            <div class="col-md-4">
              {!! Form::label('message', trans('reservation.message')) !!}  
            </div>
            <div class="col-md-8">
              {!! Form::textarea('message', Input::old('message'), array('placeholder'=>trans('reservation.message_placeHolder'), 'class'=>'form-control', 'style'=>'overflow:hidden;')) !!}
            </div>
          </div>
          <div class="form-group">
            <button style="margin-top: 30px; margin-bottom: 10px; width: 100%;" name="acction" value="paypal" type="submit" class="btn btn-primary">{{trans('experience.paypal_btn')}}</button>
          </div>
        </div>
        <div class="tab-pane" id="BankTransfer">
          <div class="col-md-12">{{trans('reservation.bank_message')}}</div>
          <div class="form-group">
            <button style="margin-top: 30px; margin-bottom: 10px; width: 100%;" name="acction" value="bak" type="submit" class="btn btn-primary">{{trans('experience.paypal_btn')}}</button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-md-offset-1" style="margin-top: 10px;">
      <div class="row" style="border: 1px solid #000; margin-bottom: 10px; background: #fff;">
        <div class="col-md-12"><img style="height: 220px; width: 220px; padding: 10px;" src="{{asset('uploads/exp/'.$exp->exp_photo)}}"> </div>
        <div class="col-md-12"><h4 style="color: #000; text-align: center;">{{$exp->exp_name}}</h4></div>
        <div class="col-md-12"><h6 style="color: #000; text-align: center;">{{trans('reservation.with')}} {{$guide->name}} {{$guide->last_name}}, {{$exp->exp_location}}</h6></div>
        <hr style="border: 1px solid #cecece; width: 90%;">
        <div class="col-md-12">{{trans('reservation.for')}} {{$data['pax']}} @if($data['pax']>1){{trans('experience.people')}}@else{{trans('reservation.person')}}@endif</div>
        <div class="col-md-12">{{trans('reservation.on_date')}} {{$data['date']}}</div>
        <hr style="width: 90%;">
        <div class="col-md-12">{{trans('reservation.rate')}} {{$currency->cur_simbol}} {{number_format($data['price'],2,',','.')}} [{{$currency->cur_name}}]</div>
        <div class="col-md-12">{{trans('reservation.by_person')}} {{trans('reservation.by')}} {{$exp->exp_duration}}  {{$exp->exp_duration_h}}</div>
        <br>
        <hr style="width: 90%;">
        <div class="col-md-12"><div class="col-md-6">{{trans('reservation.sub_total')}}</div><div class="col-md-6">{{$currency->cur_simbol}} {{number_format($data['amount'],2,',','.')}} </div></div>
        <div class="col-md-12" style="margin-bottom: 10px;"><div class="col-md-6">{{trans('reservation.total')}}</div><div class="col-md-6">{{$currency->cur_simbol}} {{number_format($data['amount'],2,',','.')}} </div></div>
      </div>
      <div class="row" style="border: 1px solid #000; margin-bottom: 10px; background: #fff;">
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
@extends('layouts.master')

@section('title', 'Coesperiences: Create Reservation')

@section('content')

  <h1>Make Reservation</h1>

  Experiencia: {{ $exp->exp_name }} <br>
  Guia: {{ $guide->name }}<br>
  <div class="container-fluid" style="margin-top: 20px;">
  {!! Form::open(['route' => 'reservation_store', 'files' => true]) !!}
  
  {!! Form::token(); !!}
    <div class="col-md-2">
    {!! Form::label('experience_date', 'Experience Date') !!}
    </div>
    <div class="col-md-4">
    {!! Form::date('res_date', \Carbon\Carbon::now()) !!}
    {!! Form::time('res_time', \Carbon\Carbon::now()->format('H:i')) !!}
    {!! Form::hidden('res_exp_id',$exp->id) !!}
    {!! Form::hidden('res_guide_id',$exp->exp_guide_id) !!}
    {!! Form::submit(Lang::get('reservation.save')) !!}
    </div>

  {!! Form::close() !!}
  </div>
  
@endsection
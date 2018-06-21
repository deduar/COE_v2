@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Cretae Currency</h1>


  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}">{{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.currency') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">

      <div class="container-fluid" style="margin-top: 20px;">
      {!! Form::open(['route' => 'admin_currency_update', 'files' => true]) !!}      
      {!! Form::token(); !!}
        {!! Form::hidden('id', $currency->id) !!}
        <div class="form-group">
          {!! Form::label('cur_name', trans('admin.cur_name')) !!}
          {!! Form::text('cur_name', $currency->cur_name) !!}
        </div>
        <div class="form-group">
          {!! Form::label('cur_simbol', trans('admin.cur_simbol')) !!}
          {!! Form::text('cur_simbol', $currency->cur_simbol) !!}
        </div>
        <div class="form-group">
          {!! Form::label('cur_exchange', trans('admin.cur_exchange')) !!}
          {!! Form::number('cur_exchange', $currency->cur_exchange, array('step'=>'0.01') ) !!}
        </div>
        
        {!! Form::submit(Lang::get('admin.cur_update')) !!}

      {!! Form::close() !!}
      </div>

    </div>
    </div>
  </div>

@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Edit Experience Category</h1>


  <div class="container">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-md-2">
        <a class="btn btn-default" style="width: 170px;" href="{{ route('admin_users') }}"> {{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" style="width: 170px;" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
        <a class="btn btn-default" style="width: 170px;" href="{{ route('admin_currency') }}"> {{ trans('admin.currency') }}</a>
        <a class="btn btn-default" style="width: 170px;" href="{{ route('admin_experience_category') }}"> {{ trans('admin.exp_category') }}</a>
        <a class="btn btn-default" style="width: 170px;" href="{{ route('admin_document_type') }}"> {{ trans('admin.document_type') }}</a>
        <a class="btn btn-default" style="width: 170px;" href="{{ route('admin_reservations') }}"> {{ trans('admin.reservations') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">

      <div class="container-fluid" style="margin-top: 20px;">
      {!! Form::open(['route' => 'admin_updateExperienceCategory', 'files' => true]) !!}      
      {!! Form::token(); !!}
        {!! Form::hidden('id', $experienceCategory->id) !!}
        <div class="form-group">
          {!! Form::label('category_name', trans('admin.category_name')) !!}
          {!! Form::text('category_name', $experienceCategory->category_name) !!}
        </div>
        {!! Form::submit(Lang::get('admin.admin_experience_category')) !!}

      {!! Form::close() !!}
      </div>

    </div>
    </div>
  </div>

@endsection
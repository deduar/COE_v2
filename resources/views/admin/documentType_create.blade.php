@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Cretae Document Type</h1>


  <div class="container">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}"> {{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.currency') }}</a>
        <a class="btn btn-default" href="{{ route('admin_experience_category') }}"> {{ trans('admin.exp_category') }}</a>
        <a class="btn btn-default" href="{{ route('admin_document_type') }}"> {{ trans('admin.document_type') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">

      <div class="container-fluid" style="margin-top: 20px;">
      {!! Form::open(['route' => 'admin_storeDocumentType', 'files' => true]) !!}      
      {!! Form::token(); !!}
        <div class="form-group">
          {!! Form::label('documentType_name', trans('admin.documenType_name')) !!}
          {!! Form::text('documentType_name') !!}
        </div>
        {!! Form::submit(Lang::get('admin.documentType_save')) !!}
      {!! Form::close() !!}
      </div>

    </div>
    </div>
  </div>

@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Backend</h1>

  <div class="container">
    <div class="row" style="margin-bottom: 30px;">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}"> {{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.currency') }}</a>
        <a class="btn btn-default" href="{{ route('admin_experience_category') }}"> {{ trans('admin.exp_category') }}</a>
        <a class="btn btn-default" href="{{ route('admin_document_type') }}"> {{ trans('admin.document_type') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">
        Content
      </div>
    </div>
  </div>

@endsection

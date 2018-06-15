@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Backend</h1>

  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}"> {{ trans('admin.users') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">
        Content
      </div>
    </div>
  </div>

@endsection

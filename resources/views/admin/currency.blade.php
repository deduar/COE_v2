@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Currency</h1>


  <div class="container">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}">{{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.currency') }}</a>
        <a class="btn btn-default" href="{{ route('admin_experience_category') }}"> {{ trans('admin.exp_category') }}</a>
        <a class="btn btn-default" href="{{ route('admin_document_type') }}"> {{ trans('admin.document_type') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Currency Name</th>
                <th scope="col">Currency Simbol</th>
                <th scope="col">Currency Exchange</th>
                <th scope="col">Currency Status</th>
                <th scope="col">Currency Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($currencies as $cur)
              <tr>
                <th  scope='col'>{{ $cur->cur_name }}</th>
                <th  scope='col'>{{ $cur->cur_simbol}}</th>
                <th  scope='col'>{{ $cur->cur_exchange }}</th>
                <th>
                @if ($cur->cur_status) 
                  <a class="btn btn-success" href="{{ route('change_cur_active',array('id'=>$cur->id)) }}">{{ trans('admin.active') }}</span></a> 
                @else
                  <a class="btn btn-danger" href="{{ route('change_cur_active',array('id'=>$cur->id)) }}">{{ trans('admin.inactive') }}</a> 
                @endif
                <th>
                  <a class="btn btn-primary" href="{{ route('admin_currency_edit',array('id'=>$cur->id)) }}">{{ trans('admin.edit') }}</a> 
                </th>
              </tr>
            @endforeach
            </tbody>
          </table>

          <a class="btn btn-success" href="{{ route('admin_currency_create') }}" style="float: right;"><span class="glyphicon glyphicon-plus-sign"></span>  {{ trans('admin.create_currency') }}</a>

      </div>
    </div>
  </div>

{!! $currencies->render() !!}

@endsection

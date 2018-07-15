@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Users</h1>

  <div class="container">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}">{{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.currency') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.exp_category') }}</a>
        <a class="btn btn-default" href="{{ route('admin_document_type') }}"> {{ trans('admin.document_type') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Experience Name</th>
                <th scope="col">Experience Image</th>
                <th scope="col">Guide Name</th>
                <th scope="col">Guide email</th>
                <th scope="col">Guide Avatar</th>
                <th scope="col">Experience Status</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($experiences as $exp)
              <tr>
                <th  scope='col'>{{ $exp->exp_name }}</th>
                <th></th>
                <th  scope='col'>{{ $exp->name }} {{ $exp->last_name }}</th>
                <th  scope='col'>{{ $exp->email }}</th>
                <th  scope='col'>
                  <a href="editProfile/{{$exp->id}}">
                    <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="border-radius: 50%;">
                  </a>
                </th>
              </tr>
            @endforeach

            </tbody>
          </table>

      </div>
    </div>
  </div>

{!! $experiences->render() !!}

@endsection

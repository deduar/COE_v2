@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Users</h1>

  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}">{{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
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
                <th  scope='col'>{{ $exp->name }} {{ $exp->lastName }}</th>
                <th  scope='col'>{{ $exp->email }}</th>
                <th  scope='col'>
                  <a href="editProfile/{{$exp->id}}">
                    <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="border-radius: 50%;">
                  </a>
                </th>
                <!--th>
                  @if ($exp->status == "Active") 
                    <a class="btn btn-success" href="{{ route('change_active',array('id'=>$exp->id)) }}">{{ trans('admin.active') }}</span></a> 
                  @else
                    <a class="btn btn-danger" href="{{ route('change_active',array('id'=>$exp->id)) }}">{{ trans('admin.inactive') }}</a> 
                  @endif
                </th-->
              </tr>
            @endforeach

            </tbody>
          </table>

      </div>
    </div>
  </div>

{!! $experiences->render() !!}

@endsection

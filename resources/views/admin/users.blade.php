@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Users</h1>

  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}">{{ trans('admin.users') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">User Name</th>
                <th scope="col">User email</th>
                <th scope="col">User Avatar</th>
                <th scope="col">Status</th>
                <th scope="col">Admin</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($users as $us)
              <tr>
                <th  scope='col'>{{ $us->name }} {{ $us->lastName }}</th>
                <th  scope='col'>{{ $us->email }}</th>
                <th  scope='col'>
                  <a href="editProfile/{{$us->id}}">
                    <img src={{asset('uploads/avatars/'.$us->avatar)}} height="40px;" style="border-radius: 50%;">
                  </a>
                </th>
                <th>
                  @if ($us->status == "Active") 
                    <a class="btn btn-success" href="{{ route('change_active',array('id'=>$us->id)) }}">{{ trans('admin.active') }}</span></a> 
                  @else
                    <a class="btn btn-danger" href="{{ route('change_active',array('id'=>$us->id)) }}">{{ trans('admin.inactive') }}</a> 
                  @endif
                </th>
                <th>
                  @if ($us->admin) 
                    <a class="btn btn-success" href="{{ route('promove_admin',array('id'=>$us->id)) }}"><span class="glyphicon glyphicon-ok"></span></a> 
                  @else
                    <a class="btn btn-danger" href="{{ route('promove_admin',array('id'=>$us->id)) }}"><span class="glyphicon glyphicon-remove"></span></a> 
                  @endif
                </th>
              </tr>
            @endforeach

            </tbody>
          </table>

      </div>
    </div>
  </div>

@endsection

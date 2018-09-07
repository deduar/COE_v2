@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin Users</h1>

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

          <table class="table table-striped">
            <thead>
              <tr>
                <!--th scope="col">Reservation ID</th>
                <th scope="col">Experience ID</th-->
                <th colspan="2" scope="col" style="text-align: center;">{{trans('reservation.guide_name')}}</th>                
                <th scope="col">Status</th>
                <th scope="col">Paid</th>
                <th scope="col">Reservation Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($reservations as $res)
              <tr>
                <!--th  scope='col'>{{ $res->id }}</th>
                <th  scope='col'>{{ $res->res_exp_id }}</th-->
                <th scope='col'>{{$res->name}}  {{$res->last_name}}</th>
                <th scope='col'>
                  <img src={{asset('uploads/avatars/'.$res->avatar)}} height="40px" style="border-radius: 50%">
                </th>

                <th scope='col'>
                  @if($res->status == "Waiting")
                  <button class='btn btn-primary'>{{$res->status}}</button>
                @endif
                @if($res->status == "Canceled")
                  <button class='btn btn-danger'>{{$res->status}}</button>
                @endif
                @if($res->status == "Accepted")
                  <button class='btn btn-info'>{{$res->status}}</button>
                @endif
                @if($res->status == "Rejected")
                  <button class='btn btn-warning'>{{$res->status}}</button>
                @endif
                @if($res->status == "Expired")
                  <button class='btn btn-secondary'>{{$res->status}}</button>
                @endif
                </th>

                <th  scope='col'>
                @if ($res->paid == "Paid")
                  <button class='btn btn-primary'>{{trans('reservation.paid')}}</button>
                @endif
                @if ($res->paid == "Unpaid")
                  <button class='btn btn-info'>{{trans('reservation.unpaid')}}</button>
                @endif
                </th>
                
                <th  scope='col'>{{ $res->res_date }} </th>
                <th>
                @if($res->paid == "Unpaid")
                  <button class='btn btn-info'><a style='text-decoration:none; color:fff;' href="{{route('admin_reservationCheckPaid',array('id'=>$res->id))}}">Check Paid</a></button>
                @endif
                </th>
              </tr>
            @endforeach

            </tbody>
          </table>

      </div>
    </div>
  </div>

{!! $reservations->render() !!}

@endsection

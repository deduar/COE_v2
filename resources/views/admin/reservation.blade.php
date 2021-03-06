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
                <th scope="col">Remaing Time</th>
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


                @if($res->status == "Canceled")
                  <th scope='col'><button class='btn btn-danger'>{{$res->status}}</button></th>
                @endif
                @if($res->status == "Accepted")
                  <th scope='col'><button class='btn btn-primary'>{{$res->status}}</button></th>
                @endif
                @if($res->status == "Rejected")
                  <th scope='col'><button class='btn btn-warning'>{{$res->status}}</button></th>
                @endif
                @if($res->status == "Expired")
                  <th scope='col'><button class='btn btn-secondary' style="width: 80px; height: 33px;">{{$res->status}}</button></th>
                @endif

                @if ($res->paid == "Authorized")
                  <th><button class='btn btn-primary' style="width: 100px; height: 33px;">{{trans('reservation.authorized')}}</button></th>
                @endif
                @if ($res->paid == "Take")
                  <th><button class='btn btn-success' style="width: 100px; height: 33px;">{{trans('reservation.paid')}}</button></th>
                @endif
                @if ($res->paid == "Refund")
                  <th><button class='btn btn-danger' style="width: 100px; height: 33px;">{{trans('reservation.refund')}}</button></th>
                @endif
                @if ($res->paid == "Void")
                  <th><button class='btn btn-warning' style="width: 100px; height: 33px;">{{trans('reservation.void')}}</button></th>
                @endif
                @if ($res->paid == "Unpaid")
                  <th><button class='btn btn-info' style="width: 100px; height: 33px;">{{trans('reservation.unpaid')}}</button></th>
                @endif
                @if($res->paid == "Unpaid")
                  <th><button class='btn btn-info'><a style='text-decoration:none; color:fff;' href="{{route('admin_reservationCheckPaid',array('id'=>$res->id))}}">Check Paid</a></button></th>
                @endif

                @if(Session::get('locale') == "es")
                  <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('d/m/Y H:i') }}</th>
                @else
                  <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('m/d/Y H:i') }}</th>
                @endif

                <th>RedDate</th>
                
                <th>
                  @if($res->paid == "Take")
                    <button class='btn btn-danger'><a style='text-decoration:none; color:fff;' href="{{route('reservation_refundPaid',array('id'=>$res->id))}}">Refund Paid</a></button>
                  @endif
                </th>

            @endforeach

            </tbody>
          </table>

      </div>
    </div>
  </div>

{!! $reservations->render() !!}

@endsection

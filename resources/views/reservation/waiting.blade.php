@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<style type="text/css">
  .vcenter {
    display: inline-block;
    vertical-align: middle;
    float: none;
  }
</style>

<div class="container-fluid" style="margin-bottom: 10px;">
  <div class="col-md-8">
    <div class="col-md-6 vcenter">
      <h1>{{trans('reservation.my_reservation')}}</h1>
    </div>
    <div class="col-md-4 vcenter">
      <h4 style="margin-top: 28px;">{{trans('reservation.today')}}: {{ \Carbon\Carbon::parse($now)->format('d/m/Y H:i') }}</h4>
    </div>
  </div>
  <div class="col-md-4">
    <a class="btn btn-info" href="{{ route('reservation') }}" style="float: right; margin-top: 20px;">{{ trans('experience.my_reservations') }}</a>
  </div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">{{trans('reservation.experience_name')}}</th>
      <th scope="col">{{trans('reservation.reservation_date')}}</th>
      <th scope="col">{{trans('reservation.expired')}}</th>
      <th scope="col">{{trans('reservation.contact_guide')}}</th>
      <th colspan="2" scope="col" style="text-align: center;">{{trans('reservation.guide_name')}}</th>
      <th scope="col" style="text-align: center;">{{trans('reservation.status')}}</th>
      <th scope="col" style="text-align: center;">{{trans('reservation.paid')}}</th>
      <th scope="col" style="text-align: center;">{{trans('reservation.action')}}</th>
    </tr>
  </thead>
  <tbody>
    <?php $k=0; ?>
    @foreach($reservations as $key => $res)
      @if($res->res_user_id === $user->id)
      <tr>
        <th scope='col'>{{$res->exp_name}}</th>
        @if(Session::get('locale') == "es")
          <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('d/m/Y H:i') }}</th>
        @else
          <th scope='col'>{{ \Carbon\Carbon::parse($res->res_date)->format('m/d/Y H:i') }}</th>
        @endif
        <th>
            <?php
                $res_date = Carbon\Carbon::parse($res->res_date);
                $created_at = Carbon\Carbon::parse($res->created_at)->addDays(2);
                $k++;
            ?>
            <p id="demo<?php echo $k; ?>" style="color: #E82C0C;"></p>
            <script>
              var deadline = new Date("<?php if(isset($created_at)) echo $created_at; else $created_at=""; ?>").getTime();
              var x = setInterval(function() {
              var now = new Date().getTime();
              var t = deadline - now;
              var days = Math.floor(t / (1000 * 60 * 60 * 24));
              var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
              var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((t % (1000 * 60)) / 1000);
              document.querySelector('[id="demo<?php echo $k; ?>"]').innerHTML = days + "d "
              + hours + "h " + minutes + "m " + seconds + "s ";
                  if (t < 0) {
                      clearInterval(x);
                      document.querySelector('[id="demo<?php echo $k; ?>"]').innerHTML = "EXPIRED";
                  }
              }, 1000);
            </script>
        </th>

        <th scope='col'><a href="{{route('messages')}}"><div class="btn btn-success">{{trans('reservation.mail_to_guide')}}</div></a></th>
        <th scope='col'>{{$res->user_name}} {{$res->last_name}}</th>
        <th scope='col'>
          <img src={{asset('uploads/avatars/'.$res->avatar)}} height="40px" style="border-radius: 50%">
        </th>
      
        @if($res->status == "Waiting")
          <th scope='col'><button class='btn btn-success'>{{$res->status}}</button></th>
        @endif
        @if($res->status == "Canceled")
          <th scope='col'><button class='btn btn-danger'>{{$res->status}}</button></th>
        @endif
        @if($res->status == "Accepted")
          <th scope='col'><button class='btn btn-primary'>{{$res->status}}</button></th>
        @endif
        @if($res->status == "Expired")
          <th scope='col'><button class='btn btn-secondary'>{{$res->status}}</button></th>
        @endif

        @if($res->paid == "Authorized")
          <th><button class='btn btn-primary'>{{trans('reservation.authorized')}}</button></th>
        @endif
        @if ($res->paid == "Take")
          <th><button class='btn btn-success'>{{trans('reservation.paid')}}</button></th>
        @endif
        @if($res->paid == "Unpaid")
          <th><button class='btn btn-info'>{{trans('reservation.unpaid')}}</button></th>
        @endif

      <th><a href="{{route('reservation_canceled',array('id'=>$res->res_id))}}"><button class='btn btn-danger'>{{trans('reservation.cancel')}}</button></a></th>
      
      </tr>

      @endif
    @endforeach
  </tbody>
</table>

<a class="btn btn-info" href="{{ route('reservation') }}" style="float: right; margin-top: 20px;">{{ trans('experience.my_reservations') }}</a>

</div>

<!--script>
var deadline = new Date("<?php if(isset($created_at)) echo $created_at; else $created_at=""; ?>").getTime();
var x = setInterval(function() {
var now = new Date().getTime();
var t = deadline - now;
var days = Math.floor(t / (1000 * 60 * 60 * 24));
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((t % (1000 * 60)) / 1000);



document.getElementById("demo").innerHTML = days + "d " 
+ hours + "h " + minutes + "m " + seconds + "s ";
    if (t < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);

</script-->

<!--script>
// Set the date we're counting down to
var countDownDate = new Date("<?php //echo $res->created_at; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = now - countDownDate;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo_").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script-->

{!! $reservations->render() !!}

@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>My Reservations<h5>{{ \Carbon\Carbon::parse($now)->format('d/m/Y H:m:s') }}</h5></h1>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Experience</th>
      <th scope="col">Reservation Date</th>
      <th scope="col">Guide email</th>
      <th scope="col">Guide Name</th>
      <th scope="col">Guide</th>
      <th scope="col">Status</th>
      <th scope="col" style="text-align: center;">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  	foreach ($myreservations as $res) { 
      ?> @if($res->res_user_id === $user->id) <?php
  		echo "<tr>";
  		echo "<th scope='col'>$res->exp_name $res->id $res->res_user_id $user->id $res->res_guide_id</th>";
  		echo "<th scope='col'>$res->res_date</th>";
  		echo "<th scope='col'>$res->email</th>";
  		echo "<th scope='col'>$res->user_name $res->lastName</th>";
  		echo "<th scope='col'>"?>
				<img src={{asset('uploads/avatars/'.$res->avatar)}} height="40px" style="border-radius: 50%">
  		<?php "</th>";
      ?> @if($res->status === "Waiting") <?php
  		echo "<th scope='col'><button class='btn btn-success'>$res->status</button</th>";
      echo "<th scope='col'>
        <button class='btn btn-danger'><a style='text-decoration:none; color:fff;' href='./reservation/cancel/$res->res_id'>Cancel</a></button>
        <button class='btn btn-info'><a style='text-decoration:none; color:fff;' href='./reservation/pay_tansfer/$res->res_id'>Pay Transfer</a></button>
        <button class='btn btn-info'>Pay PayPal</button>
      </th>";
      ?> @endif <?php
      ?> @if($res->status === "Canceled") <?php
      echo "<th scope='col'><button class='btn btn-danger'>$res->status</button</th>";
      echo "<th></th>"
      ?> @endif <?php
      ?> @if($res->status === "Waiting Pay") <?php
      echo "<th scope='col'><button class='btn btn-primary'>$res->status</button</th>";
      echo "<th></th>"
      ?> @endif <?php
  		echo "</tr>";
      ?> @endif <?php
  	}
  ?>
  </tbody>
</table>

@if($user->group == 'Guide')
  <a class="btn btn-info" href="{{ route('reservation_waiting') }}" style="float: right;"></span>  {{ trans('experience.waiting') }}</a>
@endif


@endsection
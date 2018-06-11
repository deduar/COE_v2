@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>My Reservations</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Experience</th>
      <th scope="col">Date</th>
      <th scope="col">Guide email</th>
      <th scope="col">Guide Name</th>
      <th scope="col">Guide</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  	foreach ($myreservations as $res) { 
      ?> @if($res->res_user_id === $user->id) <?php
  		echo "<tr>";
  		echo "<th scope='col'>$res->exp_name $res->res_user_id $user->id $res->res_guide_id</th>";
  		echo "<th scope='col'>$res->res_date</th>";
  		echo "<th scope='col'>$res->email</th>";
  		echo "<th scope='col'>$res->user_name $res->lastName</th>";
  		echo "<th scope='col'>"?>
				<img src={{asset('uploads/avatars/'.$res->avatar)}} height="40px" style="border-radius: 50%">
  		<?php "</th>";
  		echo "<th scope='col'><button class='btn btn-success'>$res->status</button</th>";
      echo "<th scope='col'><button class='btn btn-danger'>Cancel</button</th>";
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
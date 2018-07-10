@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>Reservations Waiting<h5>{{ \Carbon\Carbon::parse($now)->format('d/m/Y H:m:s') }}</h5></h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Experience</th>
      <th scope="col">Fecha de Reserva</th>
      <th scope="col">Viajero</th>
      <th scope="col">Viajero email</th>
      <th scope="col">Viajero Avatar</th>
      <th scope="col">Status</th>
      <th style="text-align: center;" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    foreach ($reservations as $res) {
      ?>@if($res->res_guide_id === $user->id)<?php
      echo "<tr>";
      echo "<th scope='col'>$res->exp_name</th>";
      echo "<th scope='col'>$res->res_date</th>";
      echo "<th scope='col'>$res->user_name $res->last_name</th>";
      echo "<th scope='col'>$res->email</th>";
      echo "<th scope='col'>"?>
        <img src={{asset('uploads/avatars/'.$res->avatar)}} height="40px" style="border-radius: 50%">
      <?php "</th>";
      ?> @if($res->status === "Waiting" or $res->status === "Waiting Pay") <?php
      echo "<th scope='col'><button class='btn btn-primary'>$res->status</button</th>";
      echo "<th scope='col'>
        <button class='btn btn-danger'><a style='text-decoration:none; color:fff;' href='../../reservation/reject/$res->res_id'>Rejected</a></button>
        <button class='btn btn-primary'><a style='text-decoration:none; color:fff;' href='../../reservation/accept/$res->res_id'>Accepted</a></button>
      </th>";
      ?> @else <?php
      ?> @if($res->status === "Accepted") <?php
      echo "<th scope='col'><button class='btn btn-success'>$res->status</button</th>";
      echo "<th></th>"
      ?> @endif <?php
      ?> @if($res->status === "Canceled") <?php
      echo "<th scope='col'><button class='btn btn-danger'>$res->status</button</th>";
      echo "<th></th>"
      ?> @endif <?php
      ?> @if($res->status === "Rejected") <?php
      echo "<th scope='col'><button class='btn btn-danger'>$res->status</button</th>";
      echo "<th></th>"
      ?> @endif <?php
      echo "<th></th>"
      ?> @endif <?php
      echo "</tr>";
      ?> @endif <?php

    }
  ?>
  </tbody>
</table>

<a class="btn btn-info" href="{{ route('reservation') }}" style="float: right;"></span>  {{ trans('experience.my_reservations') }}</a>

{!! $reservations->render() !!}

@endsection
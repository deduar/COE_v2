<style type="text/css">
  .container{
    background: #f0f0f0;
    width: 100% !important;
  }
</style>

@extends('layouts.master')

@section('title', 'Coesperiences: Create Reservation')

@section('content')

  <h1>{{trans('reservation.fail')}}</h1>
  
  <div class="container-fluid" style="margin-top: 20px;">
  
    <h1>{{trans('reservation.fail')}}</h1>
    <h2>Amount: US$ - {{$amount_us}}</h2>

  </div>

  <script> 
    setTimeout(function(){window.location="{{route('experience_index')}}"}, 2000); 
  </script>
  
@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>All Experiences</h1>

<!--table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Experience</th>
      <th scope="col">Guide email</th>
      <th scope="col">Guide Name</th>
      <th scope="col">Guide</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  @foreach ($experiences as $exp)
    <tr>
      <th  scope='col'>{{ $exp->exp_name }} {{ $exp->id }}</th>
      <th  scope='col'>{{ $exp->email }}</th>
      <th  scope='col'>{{ $exp->name }} {{ $exp->lastName }}</th>
      <th  scope='col'>
        <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="border-radius: 50%;">
      </th>
      <th>
        @if($exp->exp_guide_id != $user->id)
          <a class="btn btn-success" href="{{ route('reservation_create',array('id'=>$exp->id)) }}">{{ trans('experience.reservation') }}</a>
        @endif
      </th>
    </tr>
  @endforeach

  </tbody>
</table-->

<div clas="row">
  @foreach($experiences as $exp)
    <div class="col-md-4" style="padding: 20px; margin: 10px; height: 380px; width: 30%; border: solid 1px #2cbde8;  box-shadow: 2px 5px; border-radius: 10px; padding-bottom: 10px; ">
      <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="210px;" width="310px;" style="display: block; margin-left: auto; margin-right: auto;">
      <br>
      <span style="padding-left: 30px;">{{ $exp->exp_name }}</span>
      <hr>
      {{ $exp->name }} {{ $exp->lastName }} <br>
      {{ $exp->email }} 
      @if($exp->exp_guide_id != $user->id)  
        <img src={{asset('uploads/avatars/'.$exp->avatar)}} height="40px;" style="border-radius: 50%;">
        <a class="btn btn-success" style="float: right;" href="{{ route('reservation_create',array('id'=>$exp->id)) }}">{{ trans('experience.reservation') }}</a>
      @endif
    </div>
  @endforeach
</div> 

{!! $experiences->render() !!}

@endsection
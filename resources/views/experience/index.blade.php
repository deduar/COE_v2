@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>All Experiences</h1>

<table class="table table-striped">
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
</table>


@endsection
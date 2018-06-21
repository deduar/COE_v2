@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

  <h1>My Experiences</h1>

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


  @foreach ($myexps as $exp)
    <tr>
    	<th>{{ $exp->exp_name }}</th>
    	<th>{{ $user->email }}</th>
    	<th>{{ $user->name }} {{ $user->lastName }}</th>
    	<th  scope='col'>
        	<img src={{asset('uploads/avatars/'.$user->avatar)}} height="40px;" style="border-radius: 50%;">
      	</th>
      	<th  scope='col'>
        	<a class="btn btn-success" href="{{ route('experience_edit',array('id'=>$exp->id)) }}">{{ trans('experience.edit') }}</a>
      	</th>
    </tr>
  @endforeach

 </tbody>
</table>

<a class="btn btn-success" href="{{ route('experience_create') }}" style="float: right;"><span class="glyphicon glyphicon-plus-sign"></span>  {{ trans('profile.create_experience') }}</a>

{!! $myexps->render() !!}

@endsection
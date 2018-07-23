@extends('layouts.master')

@section('title', 'Coesperiences: My Experiences')

@section('content')

<div class="row">

  <div class="row" style="border-bottom: 1px solid #afafaf; margin-bottom: 10px;";>
  <div class="col-md-10 col-xs-6">
    <h1>My Experiences</h1>
  </div>
  <div class="col-md-2 col-xs-6">
    <a class="btn btn-primary" href="{{ route('experience_create') }}" style="margin: 20px 0px; background: #47bbcc; border: 0px; font-size: 16px; font-weight: bold;"><span class="glyphicon glyphicon-plus-sign"></span>  {{ trans('profile.create_experience') }}</a>
  </div>
  </div>
  

  
  @foreach ($myexps as $exp)
  <div class="row" style="margin-bottom: 10px;">
    <div class="col-md-2" style="height: 120px;">
      <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="120px;">
    </div>
    <div class="col-md-6" style="height: 120px;">
      <div class="row">
        <div class="col-md-12">
          <h3 style="color: #000;">{{strtoupper($exp->exp_name)}}</h3>    
        </div>
        <div class="col-md-6" style="color: #000;">
          {{$exp->exp_location}}
        </div>
        <div class="col-md-6">
          {{$exp->exp_price}} {{$exp->cur_name}} [{{$exp->cur_simbol}}]
          <h6>Nota: person/flat !!!!</h6>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="height: 120px;">
      <div>
        <div class="row" style="margin-bottom: 2px;">
        <div class="col-md-6">
          <div class="btn btn-info" style="width: 100px;"><a href="{{route('experience_show',array('id'=>$exp->id))}}"><span class="glyphicon glyphicon-eye-open"> View</span></a></div>
        </div>
        <div class="col-md-6">
          <div class="btn btn-info" style="width: 100px;"><a href="{{route('experience_edit',array('id'=>$exp->id))}}"><span class="glyphicon glyphicon-pencil"> Edit</span></a></div>
        </div>
        </div>
        <div class="row" style="margin-bottom: 2px;">
        <div class="col-md-6">
          <div class="btn btn-info" style="width: 100px;"><span class="glyphicon glyphicon-calendar"> Schedule</span></div>
        </div>
        <div class="col-md-6">
          <div class="btn btn-info" style="width: 100px;"><span class="glyphicon glyphicon-list-alt"> Publish</span></div>
        </div>
        </div>
        <div class="row" style="margin-bottom: 2px;">
        <div class="col-md-6">
          @if($exp->exp_status == 'Active')
            <div class="btn btn-primary" style="width: 100px;">
              <a style="text-decoration: none; color: #fff;" href="{{route('change_status_experience',array('id'=>$exp->id))}}">Active</a>
            </div>
          @else
            <div class="btn btn-danger" style="width: 100px;">
              <a style="text-decoration: none; color: #fff;" href="{{route('change_status_experience',array('id'=>$exp->id))}}">Inactive</a>
            </div>
          @endif
        </div>
        <div class="col-md-6">
          @if($exp->exp_published == 'Active')
            <div class="btn btn-primary" style="width: 100px;">Published</div>
          @else
            <div class="btn btn-Danger" style="width: 100px;">Pending</div>
          @endif
        </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  @endforeach
  


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


    @foreach ($myexps as $exp)
      <tr>
      	<th>{{ $exp->exp_name }}</th>
      	<th>{{ $user->email }}</th>
      	<th>{{ $user->name }} {{ $user->last_name }}</th>
      	<th  scope='col'>
          	<img src={{asset('uploads/avatars/'.$user->avatar)}} height="40px;" style="border-radius: 50%;">
        	</th>
        	<th  scope='col'>
          	<a class="btn btn-success" href="{{ route('experience_edit',array('id'=>$exp->id)) }}">{{ trans('experience.edit') }}</a>
        	</th>
      </tr>
    @endforeach

   </tbody>
  </table-->

{!! $myexps->render() !!}
</div>

@endsection
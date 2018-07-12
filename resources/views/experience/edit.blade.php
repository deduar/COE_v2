@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')


@if(count($errors))
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.
    <br/>
    <h3> {{ trans('experience.form_error') }}</h3>
  </div>
@endif


<hr>

<style type="text/css">
  .container{
    background: #fff !important;
  }
  .form-group{
    padding-bottom: 40px;
  }
</style>

<div class="row">
  <div class="col-md-offset-2 col-md-8" style="padding-left: 0px; padding-right: 0px;">
  <ul class="nav nav-tabs">
    <li class="active"><a  href="#basic" data-toggle="tab">Basic</a></li>
    <li><a href="#photos" data-toggle="tab">Photos</a></li>
    <li><a href="#scheduler" data-toggle="tab">Scheduler</a></li>
    <li><a href="#profile" data-toggle="tab">Profile</a></li>
    <li><a href="#payment" data-toggle="tab">Payment</a></li>
    <li><a href="#publis" data-toggle="tab">Publish</a></li>
  </ul>
  <hr style="margin-bottom: 0px;">

{!! Form::open(['route' => 'experience_update', 'files' => true]) !!}
    {!! Form::token(); !!}

  <div class="tab-content clearfix">
  <div class="tab-pane active" id="basic">

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">The Basic</h1>

    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>

    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
       {!! Form::hidden('id', $exp->id) !!}
    </div>

    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
		    {!! Form::label('exp_name', trans('experience.exp_name' )).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-8">
       {!! Form::text('exp_name', $exp->exp_name, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_location', trans('experience.exp_location')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-8">
        {!! Form::text('exp_location', $exp->exp_location, array('placeholder'=>$exp->exp_location, 'class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_summary', trans('experience.exp_summary')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_summary', $exp->exp_summary, array('placeholder'=>$exp->exp_summary, 'class'=>'form-control')) !!}
      </div>
    </div>

    <div class="row"></div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_people', trans('experience.exp_people')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_min_people', $exp->exp_min_people, array('placeholder'=>$exp->exp_min_people, 'class'=>'form-control')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_min_people', trans('experience.exp_min_people')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-2">
        {!! Form::number('exp_max_people', $exp->exp_max_people, array('placeholder'=>$exp->exp_max_people, 'class'=>'form-control')) !!}
      </div>
      <div class="col-md-2">
        {!! Form::label('exp_max_people', trans('experience.exp_max_people')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_duration', trans('experience.exp_duration')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-4">
        {!! Form::number('exp_duration', $exp->exp_duration, array('placeholder'=>$exp->exp_duration, 'class'=>'form-control')) !!}
      </div>
      <div class="col-md-3">
      {!! Form::select('exp_duration_h', 
          array(
            'Days' => trans('experience.exp_days'),
            'Hours' => trans('experience.exp_hours'),
            'Minutes' => trans('experience.exp_minutes'))
            ,null, array('class'=>'form-control'))
      !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_price', trans('experience.exp_price')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      </div>
      <div class="col-md-3">
        {!! Form::number('exp_price', $exp->exp_price, array('placeholder'=>$exp->exp_price, 'class'=>'form-control','step' => '0.01','min'=>'0')) !!}
      </div>
      <div class="col-md-4">
        {!! Form::select('exp_currency', $cur, null, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_category', trans('experience.exp_category')) !!}
      </div>
      <div class="col-md-8">
        {!! Form::number('exp_category', null, array('class'=>'form-control')) !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_private_notes', trans('experience.exp_private_notes')) !!}
      </div>
      <div class="col-md-8" style="margin-bottom: 20px;">
        {!! Form::textarea('exp_private_notes', $exp->exp_private_notes, array('placeholder'=>$exp->exp_private_notes, 'class'=>'form-control')) !!}
      </div>
    </div>

    <div class="row"></div>

    </div>    
  
  </div>

  <div id="photos" class="tab-pane">
    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Photos</h1>
    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <div class="form-group">
      <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="400px;">
      <br>
      {!! Form::label('exp_photo', trans('experience.exp_photo')).' <span class="glyphicon glyphicon-info-sign" style="color: red" title="OBLIGATORIO/REQUIRED"></span>' !!}
      {!! Form::file('exp_photo', null, array('class'=>'form-control')) !!}
    </div>
     <div class="form-group">
      {!! Form::label('exp_photo', trans('experience.exp_video')) !!}
      {!! Form::text('exp_video', $exp->exp_video, array('placeholder'=>$exp->exp_video, 'class'=>'form-control')) !!}
    </div>

    @if($exp_photos)
      <div class="row">
      @foreach($exp_photos as $e_p)
        <div class="col-md-4" style="margin-bottom: 15px;">
          <div class="col-md-12 text-center">
            <div class="btn btn-success"><a href="{{route('remove_img', array('id'=>$e_p->id))}}" style="text-decoration: none; color: #fff;">{{ trans('experience.delete_exp') }} <span class="glyphicon glyphicon-remove-circle"></span></a></div>
            <img src={{asset('uploads/exp/'.$e_p->exp_photo)}} height="180px;">
          </div>
        </div>
      @endforeach
      </div>
    @endif
  
    <br>
    {!! Form::label('exp_more_photo_label', trans('experience.exp_more_photos_label')) !!}
    <div class="form-group">  
      <div class="col-md-4">
        {!! Form::label('exp_more_photo', trans('experience.exp_more_potos')) !!}
      </div>
      <div class="col-md-3">
        <input type="file" name="file[]" multiple>
      </div>
    </div>

    </div>

  </div>

  <div id="scheduler" class="tab-pane">
    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Schedule</h1>
    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>
    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_schedule_type', trans('experience.schedule_type')) !!}
      </div>
      <div class="col-md-8">
        {!! Form::select('exp_schedule_type',
              array(
                'Unavaible' => trans('experience.unavaible'),
                'InstanBook' => trans('experience.instan_book')),
              null, array('class'=>'form-control')
            )
        !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_begin_date', trans('experience.schedule_begin' )) !!}
      </div>
      <div class="col-md-8">
       {!! Form::datetime('exp_begin_date', \Carbon\Carbon::now()->format('d/m/Y H:i'), Input::old('exp_begin_date'), array('placeholder'=>trans('experience.exp_begin_schedule_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('exp_name') ? 'has-error' : '' }}">
      <div class="col-md-2 col-md-offset-1">
        {!! Form::label('exp_end_date', trans('experience.schedule_end' )) !!}
      </div>
      <div class="col-md-8">
       {!! Form::datetime('exp_end_date', \Carbon\Carbon::now()->format('d/m/Y H:i'), Input::old('exp_end_date'), array('placeholder'=>trans('experience.exp_end_schedule_placeHolder'), 'class'=>'form-control')) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="btn btn-success glyphicon glyphicon-plus-sign" style="float: right;">
        <a style="text-decoration: none; color:#fff;" ref="#">
          {{trans('experience.add_schedule')}}
        </a>
      </div>
    </div>
    </div>
  </div>

  <div id="profile" class="tab-pane">
    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Profile</h1>
    <div class="row" style="margin-bottom: 30px;">
    <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">

      <div class="container-fluid" style="margin-top: 20px;">
          <div class="col-md-3 col-md-offset-1" style="border: 1px solid #000; padding-top: 10px; padding-bottom: 10px;">
          <img src={{ asset('uploads/avatars/'.$user->avatar)}} height="170px;">
          <hr>
          <h4 style="color: #000; font-weight: bold;">{{ $user->name }} {{ $user->last_name }}</h4>
          <h5>
              <span class="glyphicon glyphicon-star-empty"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
              <span class="glyphicon glyphicon-star-empty half"></span>
          </h5>
          <div class="btn btn-primary" style="width: 100%">{{trans('user.mycollection')}}</div>
          </div>
          <div class="col-md-6">
              <div class="btn btn-default" style="float:right;"><a style="text-decoration: none;" href="{{route('edit_profile')}}">{{trans('exp.profile_edit')}}</a></div>
              <div class="col-md-12">
                  <h4>{{trans('user.biography')}}</h4>
                  <span style="height: 90%; width: 90%;">{{$user->biography}}</span>
                  <hr>
              </div>
              <div class="col-md-12">
                  <h4>{{trans('user.review')}}</h4>
                  <hr>
              </div>

          </div>
      </div>

      <div class="container-fluid" style="margin-top: 20px;">
          @foreach ($myexps as $exp)
          <div class="col-md-12" style="border: 1px solid #ccc; width: 90%;height: 120px; margin-top: 10px; padding-top: 10px; margin-left: 10px;">
              <div class="col-md-3">
                  <img src={{asset('uploads/exp/'.$exp->exp_photo)}} height="85px;">
              </div>
              <div class="col-md-9">
                  <div class="col-md-6"><h4>{{$exp->exp_name}}</h4></div>
                  <div class="col-md-6"><h5>{{$exp->cur_simbol}} {{$exp->exp_price}} {{$exp->cur_name}}</h5></div>
                  <div class="btn btn-default" style="float:right;">{{trans('exp.detail')}}</div>
              </div>
              <h5>
                  <span style="background: #ccc; padding: 3px; color: #000;">{{trans('user.reviews')}}</span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty"></span>
                  <span class="glyphicon glyphicon-star-empty half"></span>
              </h5>
          </div>
          @endforeach
      </div>

    </div>
  </div>
  {!! $myexps->render() !!}
  </div>

  <div id="payment" class="tab-pane">

  </div>

  <div id="Publish" class="tab-pane">

  </div>

  <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">
      {!! Form::submit(Lang::get('experience.save'), array('class' => 'btn btn-success','style'=>'width: 180px;')) !!}
  </div>

</div>

{!! Form::close() !!}

  </div>
</div>

@endsection
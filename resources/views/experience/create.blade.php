@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')

  <h1>Create Experience</h1>

  
  {!! Form::open(['route' => 'experience_store', 'files' => true]) !!}
		{!! Form::token(); !!}
    <div class="container-fluid" style="margin-top: 20px;">
    <div class="form-group">
		  {!! Form::label('exp_name', trans('experience.exp_name')) !!}
    	{!! Form::text('exp_name') !!}
    </div>
    <div class="form-group">
      {!! Form::label('exp_photo', trans('experience.exp_photo')) !!}
      {!! Form::file('exp_photo', null) !!}
    </div>
    <div class="form-group">
     <div class="form-group">
      {!! Form::label('exp_location', trans('experience.exp_location')) !!}
      {!! Form::text('exp_location') !!}
    </div>
    <div class="form-group">
      {!! Form::label('exp_summary', trans('experience.exp_summary')) !!}
      {!! Form::text('exp_summary') !!}
    </div>
    <div class="form-group">
      {!! Form::label('exp_people', trans('experience.exp_min_people')) !!}
      {!! Form::number('exp_min_people') !!}
      {!! Form::label('exp_min_people', trans('experience.exp_min_people')) !!}
      {!! Form::number('exp_max_people') !!}
      {!! Form::label('exp_max_people', trans('experience.exp_max_people')) !!}
    </div>
    <div class="form-group">
      {!! Form::label('exp_duration', trans('experience.exp_duration')) !!}
      {!! Form::number('exp_duration') !!}
      <select name="exp_duration_h">
          <option value="Days">trans('experience.days'))</option>
          <option value="Hours">trans('experience.hours'))</option>
          <option value="Minutes">trans('experience.minutes'))</option>
      </select>
    </div>
    <div class="form-group">
      {!! Form::label('exp_price', trans('experience.exp_price')) !!}
      {!! Form::number('exp_price', null, ['step' => '0.01']) !!}
      <select name="exp_currency">
        @foreach($currencies as $cur)
          <option value="{{$cur->id}}">{{$cur->cur_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      {!! Form::label('exp_category', trans('experience.exp_category')) !!}
      {!! Form::number('exp_category') !!}
    </div>
    <div class="form-group">
      {!! Form::label('exp_private_notes', trans('experience.exp_private_notes')) !!}
      {!! Form::text('exp_private_notes') !!}
    </div>
    <div class="form-group">
      {!! Form::submit(Lang::get('experience.save'), ['class' => 'btn btn-success']) !!}
    </div>
  {!! Form::close() !!}


@endsection
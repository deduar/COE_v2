@extends('layouts.master')

@section('title', 'Coesperiences: ChangePassword')

@section('sidebar')
@endsection

@section('content')

<style type="text/css">
  .container{
    background: #fff !important;
  }
  .form-group{
    /*padding-bottom: 40px;*/
  }
  .row{
    margin-left: 0px !important;;
    margin-right: 0px !important;
    padding-bottom: 20px;
  }
</style>

    <div class="col-md-offset-2 col-md-8" style="padding-left: 0px; padding-right: 0px;">
	{!! Form::open(['route' => 'update_profile', 'files' => true]) !!}
		{!! Form::token(); !!}

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Edit Profile</h1>
    <div class="row" style="border: solid 1px #f2f2f2; margin-left: -15px;">
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="col-md-3" style="padding-top: 10px; padding-bottom: 10px;">
            <img src={{ asset('uploads/avatars/'.$user->avatar)}} height="170px;"/>
            <br><br>
            <div class="btn btn-primary" style="width: 100%">{{trans('user.change_avatar')}}</div>
        </div>

        <div class="col-md-9" style="margin-top: 10px; margin-bottom: 20px;">
            <div class="form-group">
              <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                {!! Form::label('name', trans('user.name')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
                {!! Form::text('name', $user->name, array('class'=>'form-control')) !!}
              </div>
              <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                {!! Form::label('last_name', trans('user.last_name')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
                {!! Form::text('last_name', $user->last_name, array('class'=>'form-control')) !!}
              </div>              
            </div>

            <div class="form-group">
              <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
                {!! Form::label('email', trans('user.email')) !!}
                {!! Form::text('email', $user->email, array('class'=>'form-control','disabled'=>'disabled')) !!}
              </div>
              <div class="col-md-4" style="margin-top: 10px; margin-bottom: 10px;">
                {!! Form::label('age', trans('user.age')) !!}
                {!! Form::number('age', $user->age, array('class'=>'form-control','min'=>18, 'step'=>1)) !!}
              </div>              
            </div>

            <div class="form-group">
              <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                {!! Form::label('phone', trans('user.phone')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
                {!! Form::text('phone', $user->phone, array('class'=>'form-control')) !!}
              </div>
              <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                {!! Form::label('nationality', trans('user.nationality')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
                {!! Form::text('nationality', $user->nationality, array('class'=>'form-control')) !!}
              </div>              
            </div>
        </div>
    
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('biography', trans('user.biography')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
                {!! Form::textarea('biography', $user->biography, array('class'=>'form-control')) !!}
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <hr/>
            <div class="col-md-12">
                {!! Form::label('video', trans('user.video')) !!}
                {!! Form::text('video', $user->video, array('class'=>'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
          <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('job', trans('user.job')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
            {!! Form::text('job', $user->job, array('class'=>'form-control')) !!}
          </div>
          <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('company', trans('user.company')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
            {!! Form::text('company', $user->company, array('class'=>'form-control')) !!}
          </div>
          <div class="btn btn-normal">{{trans('user.googleBusinness')}}</div>
        </div>

        <div class="form-group">
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('address', trans('user.address')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
            {!! Form::text('address', $user->address, array('class'=>'form-control')) !!}
          </div>
          <div class="col-md-4" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('postal_code', trans('user.postal_code')) !!}
            {!! Form::text('postal_code', $user->postal_code, array('class'=>'form-control')) !!}
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('city', trans('user.city')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
            {!! Form::text('city', $user->city, array('class'=>'form-control')) !!}
          </div>
          <div class="col-md-4" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('country', trans('user.country')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
            {!! Form::text('country', $user->country, array('class'=>'form-control')) !!}
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('language', trans('user.language')).' <span class="glyphicon glyphicon-info-sign" style="color: red;" title="OBLIGATORIO/REQUIRED"></span>' !!}
            {!! Form::text('language', $user->language, array('class'=>'form-control')) !!}
          </div>
          <div class="col-md-4" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('othe_language', trans('user.other_language')) !!}
            {!! Form::text('other_language', $user->other_language, array('class'=>'form-control')) !!}
          </div>
        </div>
    </div>

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Payment Detail</h1>
    <div class="form-group">
        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('paypal', trans('user.paypal')) !!}
            {!! Form::text('paypal', $user->paypal, array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('bank_name', trans('user.bank_name')) !!}
            {!! Form::text('bank_name', $user->bank_name, array('class'=>'form-control')) !!}
        </div>
        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('beneficiary', trans('user.beneficiary')) !!}
            {!! Form::text('beneficiary', $user->beneficiary, array('class'=>'form-control')) !!}
        </div>
        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('account_number', trans('user.account_number')) !!}
            {!! Form::text('account_number', $user->account_number, array('class'=>'form-control')) !!}
        </div>
        <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('document_type', trans('user.document_type')) !!}
            {!! Form::text('document_type', $user->document_type, array('class'=>'form-control')) !!}
        </div>
        <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('document_number', trans('user.document_number')) !!}
            {!! Form::text('document_number', $user->document_number, array('class'=>'form-control')) !!}
        </div>
    </div>


    </div>

    <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">
      {!! Form::submit(Lang::get('experience.save'), array('class' => 'btn btn-success','style'=>'width: 180px;')) !!}
    </div>

	{!! Form::close() !!}
    </div>
    

@endsection
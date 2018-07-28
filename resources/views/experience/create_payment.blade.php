@extends('layouts.master')

@section('title', 'Coesperiences: Create Experience')

@section('content')

@if(count($errors))
  <div class="alert alert-danger">
    <h4> {{ trans('experience.form_error') }}</h4>
    <ul>
      @if ($errors->has('exp_begin_date'))
        <h5><strong>{{trans('experience.error_exp_begin_date')}}</strong></h5>
      @endif
      @if ($errors->has('exp_end_date'))
        <h5><strong>{{trans('experience.error_exp_end_date')}}</strong></h5>
      @endif
    </ul>
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
    <li class="disabled"><a  href="#basic" data-toggle="tab">Basic</a></li>
    <li class="disabled"><a href="#photos" data-toggle="tab">Photos</a></li>
    <li class="disabled"><a href="#scheduler" data-toggle="tab">Scheduler</a></li>
    <li class="active"><a href="#payment" data-toggle="tab">Payment</a></li>
    <li class="disabled"><a href="#publis" data-toggle="tab">Publish</a></li>
  </ul>
  <hr style="margin-bottom: 0px;">

{!! Form::open(['route' => 'experience_store_payment', 'files' => true]) !!}
    {!! Form::token(); !!}

  <div class="tab-content clearfix">
  <div class="tab-pane active" id="schedule">

    <h1 style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">Payment <span class="btn btn-success" style="height: 40PX; float: right; font-weight: bold;">{!! Form::submit('NEXT', array('class'=>'btn btn-success')) !!} <span class="glyphicon glyphicon-chevron-right"></span></span></h1>

    <div class="container-fluid" style="margin-top: 0px; border:1px solid #ddd;">
    <br><br>

    <div class="form-group" style="padding-bottom: 0px; margin-bottom: 0px;">
      {!! Form::hidden('id',$id) !!}
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <h3 style="border: 1px solid #000; background: #fbfbfb; padding-top: 5px; padding-bottom: 5px;"><span style="font-weight: bold; color: #000; margin-left: 15px;">PAYPAL</span></h3>
        <p>Ipsen Lorem PAYPAL</p>
        <div class="col-md-2 col-md-offset-1" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('exp_paypal', trans('experience.paypal')) !!}
        </div>
        <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::text('exp_paypal', isset($exp->exp_paypal) ? $exp->exp_paypal : $user->paypal, array('class'=>'form-control')) !!}
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <h3 style="border: 1px solid #000; background: #fbfbfb; padding-top: 5px; padding-bottom: 5px;"><span style="font-weight: bold; color: #000; margin-left: 15px;">BANK TRANSFER</span></h3>
        <p>Ipsen Lorem BANK</p>
      </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
          <div class="col-md-2 col-md-offset-1" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('exp_bank_name', trans('experience.bank_name')) !!}
          </div>
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::text('exp_bank_name', isset($exp->exp_bank_name) ? $exp->exp_bank_name : $user->bank_name, array('class'=>'form-control')) !!}
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-2 col-md-offset-1" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('exp_beneficiary', trans('experience.beneficiary')) !!}
          </div>
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::text('exp_beneficiary', isset($exp->exp_beneficiary) ? $exp->exp_beneficiary : $user->beneficiary, array('class'=>'form-control')) !!}
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-2 col-md-offset-1" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('exp_account_number', trans('experience.account_number')) !!}
          </div>
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::text('exp_account_number', isset($exp->exp_account_number) ? $exp->exp_account_number : $user->account_number, array('class'=>'form-control')) !!}
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-2 col-md-offset-1" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('exp_document_type', trans('experience.document_type')) !!}
          </div>
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::select('exp_document_type', $documentTypes, isset($exp->exp_document_type) ? $exp->exp_document_type : $user->document_type, array('class'=>'form-control')) !!}
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-2 col-md-offset-1" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::label('exp_document_number', trans('experience.document_number')) !!}
          </div>
          <div class="col-md-8" style="margin-top: 10px; margin-bottom: 10px;">
            {!! Form::text('exp_document_number', isset($exp->exp_document_number) ? $exp->exp_document_number : $user->document_number, array('class'=>'form-control')) !!}
          </div>
        </div>

    </div>


    </div>
  </div>


  <div class="form-group" style="background: #fbfbfb; padding: 10px; color:#000; margin-top: 0px; margin-bottom: 0px; height: 90px; padding-top: 30px;">
    <span class="btn btn-success" style="height: 40PX; font-weight: bold;">{!! Form::submit('NEXT', array('class'=>'btn btn-success')) !!} <span class="glyphicon glyphicon-chevron-right"></span></span>
  </div>

  

</div>

{!! Form::close() !!}

  </div>
</div>

@endsection
@extends('layouts.master')

@section('title', 'Coesperiences: Admin Backend')

@section('content')

  <h1>Admin ID Type</h1>


  <div class="container">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-md-2">
        <a class="btn btn-default" href="{{ route('admin_users') }}">{{ trans('admin.users') }}</a><br>
        <a class="btn btn-default" href="{{ route('admin_experiences') }}"> {{ trans('admin.experiences') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.currency') }}</a>
        <a class="btn btn-default" href="{{ route('admin_currency') }}"> {{ trans('admin.exp_category') }}</a>
        <a class="btn btn-default" href="{{ route('admin_document_type') }}"> {{ trans('admin.document_type') }}</a>
      </div>
      <div style="border-left: 1px solid #000;" class="col-md-10">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Document Type</th>
                <th scope="col">Currency Status</th>
                <th scope="col">Currency Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($documentTypes as $docType)
              <tr>
                <th  scope='col'>{{ $docType->documentType_name }}</th>
                <th>
                @if ($docType->documentType_status == "Active")
                  <a class="btn btn-success" href="{{ route('change_statusDocumentType',array('id'=>$docType->id)) }}">{{ trans('admin.active') }}</span></a> 
                @else
                  <a class="btn btn-danger" href="{{ route('change_statusDocumentType',array('id'=>$docType->id)) }}">{{ trans('admin.inactive') }}</a> 
                @endif
                <th>
                  <a class="btn btn-primary" href="{{ route('admin_editDocumentType',array('id'=>$docType->id)) }}">{{ trans('admin.documentType_edit') }}</a> 
                </th>
              </tr>
            @endforeach
            </tbody>
          </table>

          <a class="btn btn-success" href="{{ route('admin_createDocumentType') }}" style="float: right;"><span class="glyphicon glyphicon-plus-sign"></span>  {{ trans('admin.create_documentType') }}</a>

      </div>
    </div>
  </div>

{!! $documentTypes->render() !!}

@endsection

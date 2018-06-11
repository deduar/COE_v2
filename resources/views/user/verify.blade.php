@extends('layouts.master')

@section('title', 'Coesperiences: Verify Account')

@section('content')
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('profile.dashboard')</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>@lang('profile.welcome_message')</h4>
                    <a class="btn btn-link" href="{{ route('resend') }}">
                        <button class=btn btn-default>@lang('profile.resend_email')</button>
                    </a>
                    <h4>{{ session('resend_message') }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
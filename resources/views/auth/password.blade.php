<!-- resources/views/auth/password.blade.php -->
@extends('layouts.master')

@section('title', 'Coesperiences: Login')

@section('content')
<form method="POST" action="{{ route('postemail') }}">
    {!! csrf_field() !!}

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <button type="submit">
            Send Password Reset Link
        </button>
    </div>
</form>
@endsection
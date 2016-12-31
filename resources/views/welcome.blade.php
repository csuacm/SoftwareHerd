@extends('layouts.master')
<link rel="stylesheet" href="{{ URL::asset('/css/welcome.css') }}">
@section('title')
    Welcome
@endsection

@section('content')
<p id="temp-logged-in-notice">Logged out home page</p>
@endsection

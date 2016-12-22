@extends('layouts.master')

@section('content')
<h1>{{ $user->name }}</h1>
<h3>{{ $user->email }}</h3>
<h3><a href="{{ $user->github_link }}">{{ $user->github_link }}</a></h3>
@endsection
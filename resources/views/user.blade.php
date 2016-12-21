@extends('layouts.master')

@section('content')
<h1>{{ $user->name }}</h1>
<h3>{{ $user->email }}</h3>
@endsection
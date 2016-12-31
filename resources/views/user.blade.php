@extends('layouts.master')
<link rel="stylesheet" href="{{ URL::asset('/css/profile.css') }}">

@section('content')


<div class="image-section">
	<img class="avatar" src="/uploads/avatars/{{ $user->avatar }} " style="width:150px; height:150px;  border-radius:50%;">
</div>

<div class="info-section">
    	<p class="user-name">{{ $user->name }}</p>
    	{{ $user->email }}<br>
    	<p class="bio">{{ $user->bio }}</p>
</div>


<div class="skills-section row">
	<div class="col-md-4">
		<h3 id="underline">Languages</h3>
		<li>Java</li>
		<li>C</li>
		<li>Assembly</li>
		<li>Rust</li>
	</div>
	<div class="col-md-4">
		<h3 id="underline">Tools</h3>
		<li>Git</li>
		<li>MVCs (Ruby on Rails, Laravel)</li>
		<li>Linux/OSX</li>
	</div>
	<div class="col-md-4">
		<h3 id="underline">Links</h3>
		<li>Website:<br><a href="{{ $user->website_link }}">{{ $user->website_link }}</a></li>
		<li>GitHub:<br><a href="{{ $user->github_link }}">{{ $user->github_link }}</a></li>
	</div>
</div>

<div class="edit-section">
@if(Auth::user()->id == $user->id)
<div class="edit-image-section row">
		<form enctype="multipart/form-data" action="/user" method="post">
			<h5>Update Profile Image</h5>
			<input type="file" name="avatar" id="input-profile-image">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" class="btn btn-sm btn-primary">
		</form>


@endif
</div>

@endsection
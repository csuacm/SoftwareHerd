<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Software Herd') }}</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
	<script src="https://use.fontawesome.com/0d3a2260ec.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<!-- NAV BAR -->

@if (Auth::guest())
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/"><img class="nav-logo" src="/uploads/Images/SHIconRedAndOrange.png" style="width:100px; height:auto;"></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/contact">Contact</a></li>
					<li><a href="/project_library">Browse Projects</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
@else
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/"><img class="nav-logo" src="/uploads/Images/SHIconRedAndOrange.png" style="width:100px; height:auto;"></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/home" id="nav-1200-fix">Home</a></li>
					<li><a href="/about" id="nav-1200-fix">About</a></li>
					<li><a href="/contact" id="nav-1200-fix">Contact</a></li>
					<li><a href="/project_library" id="nav-1200-fix">Browse Projects</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="">
					<li><a href="\new_project" id="nav-right-1200fix" id="nav-1200-fix">New Project</a></li>
					<li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="nav-1200-fix">Logout</a></li>
	        		<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
	       		 	</form>
					<li><a href="/user/{{Auth::user()->id}}" id="nav-1200-fix">My Profile</a></li>
					<a href="/user/{{Auth::user()->id}}" id="nav-1200-fix"><img class="av-nav" src="/uploads/avatars/{{ Auth::user()->avatar }} " id="avatar-nav" ></a>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
@endif
<!-- NAV BAR END  -->


<div class="container">
@yield('content')
</div>



<!-- Scripts -->
<script src="/js/app.js"></script>
<script type="text/javascript" src="{{ asset('/js/posts/comments.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/project_admin/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/main.js') }}"></script>
</body>
</html>






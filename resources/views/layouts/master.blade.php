<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Software Herd') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>




<!-- NAV BAR -->
<nav class="sidebar-left">
	<div class="logo">
		<!-- HIDE IMAGE 
		<a href="https://www.cs.colostate.edu/cstop/"><img src="ramLogo.png" alt="Colorado State University Logo" style="width:100px;height:auto;"></a>
		-->
	</div>
	<div class="title">
		<h1 class="minMargin-B" href="{{ url('/') }}">{{ config('app.name', 'Software Herd') }}</h1>
		<h4>Network and Create Projects</h4>
	</div>
	<div class="links nav-m">
		
		<a href="\">Home</a>
		<a href="#">About</a>
		<a href="#">Contact</a>
		@if (Auth::guest())
			<a href="{{ url('/login') }}">Login</a>
			<a href="{{ url('/register') }}">Register</a>
		@else
			<a href="\new_project">New Project</a>
			<a href="{{ url('/logout') }}"
	           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	           Logout
	        </a>
	        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	            {{ csrf_field() }}
	        </form>
        @endif
                                        


	</div>
	<div class="logo"><br>
		<!-- HIDE IMAGE 
		<a href="https://www.acm.org/"><img src="acm.png" alt="Association for Computing Machinery Logo" style="width:100px;height:auto;"></a>
		-->
	</div>
</nav>
<!-- NAV BAR END  -->

<div id="events">
@yield('content')
</div>



<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>






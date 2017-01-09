<!DOCTYPE html>
<html>
<head>
	<title>M-Arts Register</title>

	{{-- logo --}}
	<link href = "img/logo.png" rel="icon" type="image/png">

	{{-- css files --}}
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	{{-- js files --}}
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	{{-- livereload --}}
	@if ( Config::get('app.debug') )
	<script type="text/javascript">
		document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
	</script> 
	@endif
	{{-- meta --}}
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	{{-- menu row --}}
	<div class="row heading-row">
		<h1 class="logo-heading"><span class="danger">M-</span>Arts</h1>
		<nav>
			<ul class="nav nav-pills register-menu">
				{{-- show separate menu items for logged/non-logged user --}}
				@if(Sentinel::check())
				<li role="presentation">
					<form action="/logout" method="POST" id="logout-form">
						{{ csrf_field() }}
						<a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
					</form>
				</li>
				@else
				<li role="presentation">
					<a href="/"><span class="fa fa-home"></span> Get home </a>
				</li>
				<li role="presentation">
					<a href="/register"><span class="fa fa-user-plus"></span> Sign up </a>
				</li>
				<li role="presentation">
					<a href="/login"><span class="fa fa-sign-in"></span> Log in </a>
				</li>
				@endif
			</ul>
			@if(Sentinel::check())
			Hello, {{Sentinel::getUser()->first_name}}
			@endif
		</nav>

	</div>
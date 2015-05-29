<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Happy Hackr</title>

    <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
    {{--<script src="{{ elixir("js/app.js") }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->
</head>
<body>
	<nav class="navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Happy Hackr</a>
			</div>

			<div class="collapse navbar-collapse" id="main-nav">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('about') }}">About</a></li>
                    <li><button type="button" class="btn btn-primary navbar-btn">Sign Up for Updates</button></li>
				</ul>
			</div>
		</div>
	</nav>
    <section class="row-fluid">
        <div class="container-fluid">
            @yield('banner')
        </div>
    </section>
    <section class="row">
        <div class="container">
            @yield('content')
        </div>
    </section>
</body>
</html>

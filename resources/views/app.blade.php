<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Happy Hackr</title>

    <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
    {{--<script src="{{ elixir("js/app.js") }}"></script>--}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>
@include('partials._navbar')
<section class="row-fluid">
    <div class="container-fluid">
        @yield('banner')
    </div>
</section>
<section class="row">
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</section>
@include('partials._footer')
</body>
</html>

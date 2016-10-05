<!DOCTYPE html>
<HTML>
	<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>J&#38;M Parking | @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}resources/assets/bootstrap/css/bootstrap.min.css"/>
   	<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}resources/css/style.css"/>

    @yield('css')
    </head>
    <body>
    	<section>
   		@yield('content')
    	</section>


    	@yield('js')

    </body>
</HTML>

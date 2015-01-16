<html lang="en">
	<head>
		<title>The Mandarin::TMIP</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="The Mandarin Integration Platform">

		<!-- BEGIN STYLESHEETS -->
		{{ HTML::style('TMIP/Trinity/css/theme-default/bootstrap.css') }}
		{{ HTML::style('TMIP/Trinity/css/theme-default/boostbox.css') }}
		{{ HTML::style('TMIP/Trinity/css/theme-default/boostbox_responsive.css') }}
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Additional CSS includes -->
		@yield('additional_css_includes')
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="/assets/js/libs/utils/html5shiv.js"></script>
		<script type="text/javascript" src="/assets/js/libs/utils/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<header id="header">
			@include('TrinityCommonView::layouts.navbar')
		</header>
		<div id="base">
			@if(!strpos(\Request::url(), 'jobPool/signUp'))
			<div id="sidebar">
				@include('TrinityCommonView::layouts.sidebar')
			</div>
			@endif
			<div id="content">
				@yield('main_content')
			</div>
		</div>

		<!-- BEGIN JAVASCRIPT -->
		{{ HTML::script('TMIP/Trinity/js/libs/jquery/jquery-1.11.0.min.js') }}
		{{ HTML::script('TMIP/Trinity/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}
		{{ HTML::script('TMIP/Trinity/js/core/BootstrapFixed.js') }}
		{{ HTML::script('TMIP/Trinity/js/libs/bootstrap/bootstrap.min.js') }}
		<!-- Additional JS includes -->
		@yield('additional_js_includes')

		<!-- Always put App.js last in your javascript imports -->
		{{ HTML::script('TMIP/Trinity/js/core/App.js') }}
	</body>
</html>
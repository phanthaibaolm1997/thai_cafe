<!doctype html>
<html class="fixed">

<head>
	<meta charset="UTF-8">
	<title>COFFEE</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
	<meta name="author" content="JSOFT.net">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
		rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/vendor/magnific-popup/magnific-popup.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />
	<link rel="stylesheet"
		href="{{ asset('/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/vendor/morris/morris.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/stylesheets/theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/stylesheets/skins/default.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/stylesheets/theme-custom.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/admin.css') }}">
	<script src="{{ ('/assets/vendor/modernizr/modernizr.js') }}"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css" rel="stylesheet" />

</head>

<body>
	<section class="body">
		@include('layouts.admin.header')
		<div class="inner-wrapper">
			@include('layouts.admin.sidebar')
			<section role="main" class="content-body">
				@yield('content')
			</section>
		</div>
	</section>

	<!-- Vendor -->
	<script src="{{ ('/assets/vendor/jquery/jquery.js') }}"></script>
	<script src="{{ ('/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
	<script src="{{ ('/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ ('/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
	<script src="{{ ('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ ('/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
	<script src="{{ ('/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
	<script src="{{ ('/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js') }}"></script>
	<script src="{{ ('/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
	<script src="{{ ('/assets/vendor/jquery-appear/jquery.appear.js') }}"></script>
	<script src="{{ ('/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
	<script src="{{ ('/assets/vendor/jquery-easypiechart/jquery.easypiechart.js') }}"></script>
	<script src="{{ ('/assets/vendor/flot/jquery.flot.js') }}"></script>
	<script src="{{ ('/assets/vendor/flot-tooltip/jquery.flot.tooltip.js') }}"></script>
	<script src="{{ ('/assets/vendor/flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ ('/assets/vendor/flot/jquery.flot.categories.js') }}"></script>
	<script src="{{ ('/assets/vendor/flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ ('/assets/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
	<script src="{{ ('/assets/vendor/raphael/raphael.js') }}"></script>
	<script src="{{ ('/assets/vendor/morris/morris.js') }}"></script>
	<script src="{{ ('/assets/vendor/gauge/gauge.js') }}"></script>
	<script src="{{ ('/assets/vendor/snap-svg/snap.svg.js') }}"></script>
	<script src="{{ ('/assets/vendor/liquid-meter/liquid.meter.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/jquery.vmap.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/maps/jquery.vmap.world.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js') }}"></script>
	<script src="{{ ('/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js') }}"></script>
	<script src="{{ ('/assets/javascripts/theme.js') }}"></script>
	<script src="{{ ('/assets/javascripts/theme.custom.js') }}"></script>
	<script src="{{ ('/assets/javascripts/theme.init.js') }}"></script>
	<script src="{{ ('/assets/javascripts/ui-elements/examples.lightbox.js') }}"></script>
	<script src="{{ ('/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
	<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
	<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
	<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script>
	<script src="{{ ('/assets/admin.js') }}"></script>
</body>

</html>
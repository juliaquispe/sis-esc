{{-- <!DOCTYPE html>
<html lang="en">
    <head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />

        <title>@yield('titulo', 'SIST')Sistema-AronCars</title>

		<meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}"/>
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/font-awesome/4.5.0/css/font-awesome.min.css")}}"/>

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/fonts.googleapis.com.css")}}"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace.min.css")}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-skins.min.css")}}"/>
        <link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-rtl.min.css")}}"/>
        @yield('styles')
		<!-- ace settings handler -->
		<script src="{{asset("assets/$theme/assets/js/ace-extra.min.js")}}"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container" style="height: 40px">
                @include("theme/$theme/header")
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
                </button>
                <div class="navbar-header pull-left" >
                    <a href="index.html" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            Ace Admin
                        </small>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>
            <div class="content-wrapper">
                <section class="content">
                    @include("theme/$theme/aside")
                    @include("theme/$theme/wrapper")
                    @include("theme/$theme/footer")
                </section>
            </div>
        </div>
        <script src="{{asset("assets/$theme/assets/js/jquery-2.1.4.min.js")}}"></script>
        <script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{asset("assets/$theme/assets/js/jquery.mobile.custom.min.js")}}'>"+"<"+"/script>");
		</script>
        <script src="{{asset("assets/$theme/assets/js/bootstrap.min.js")}}"></script>
        <script src="{{asset("assets/$theme/assets/js/ace-elements.min.js")}}"></script>
        <script src="{{asset("assets/$theme/assets/js/ace.min.js")}}"></script>
        @yield('scripts')
    </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />

		<title>@yield('titulo', 'SIS') /Sist. AronCar</title>

		<meta name="description" content="responsive photo gallery using colorbox" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/font-awesome/4.5.0/css/font-awesome.min.css")}}" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/colorbox.min.css")}}" />

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/fonts.googleapis.com.css")}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace.min.css")}}" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-skins.min.css")}}" />
        <link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-rtl.min.css")}}" />

        @yield("styles")
		<script src="{{asset("assets/$theme/assets/js/ace-extra.min.js")}}"></script>

        <link rel="stylesheet" href="{{asset("assets/css/toastr/toastr.min.css")}}"/>
        @yield("styles")
    </head>
    <body class="skin-2">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
					</a>
                </div>
                @include("theme/$theme/header")
            </div>
        </div>
        <div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
            </script>
            <div class="content-wrapper" >
                <!-- Content Header (Page header) -->
                    <section class="content">
                        @include("theme/$theme/aside")
                        @include("theme/$theme/wrapper")
                        @include("theme/$theme/footer")
                    </section>
            </div>
        </div>
        <div>
		<script src="{{asset("assets/$theme/assets/js/jquery-2.1.4.min.js")}}"></script>
        <script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="{{asset("assets/$theme/assets/js/bootstrap.min.js")}}"></script>
		<!-- ace scripts -->
		<script src="{{asset("assets/$theme/assets/js/ace-elements.min.js")}}"></script>
        <script src="{{asset("assets/$theme/assets/js/ace.min.js")}}"></script>

        <script src="{{asset("assets/$theme/assets/js/jquery.validate.min.js")}}"></script>
        <script src="{{asset("assets/$theme/assets/js/messages_es.min.js")}}"></script> //CONVIERTE EL IDIOMA A ESPAÑOL

        @yield("scriptsPlugins")

        <script src="{{asset("assets/js/sweetalert/sweetalert.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/js/toastr/toastr.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/js/funciones.js")}}" type="text/javascript"></script>
        @yield("scripts")
        </div>

    </body>
</html>

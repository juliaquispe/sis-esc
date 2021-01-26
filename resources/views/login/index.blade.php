		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/font-awesome/4.5.0/css/font-awesome.min.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/fonts.googleapis.com.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace.min.css")}}" />
        <link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-rtl.min.css")}}" />
        <script src="{{asset("assets/$theme/assets/js/jquery-2.1.4.min.jss")}}"></script>
<!DOCTYPE html>
<html lang="en">
	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
                                    <img class="nav-user-photo" src="{{asset("assets/$theme/assets/images/gallery/corazon.jpg")}}" />
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">CLINICA</span>
									<span class="white" id="id-text2">SANTA TERESA</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Sistema de control de Historial y Fichaje </h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Por favor ingrese su informacion
											</h4>

											<div class="space-6"></div>
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <div class="alert-text">
                                                        @foreach ($errors->all() as $error)
                                                            <span><li type="square">{{ $error }}<br></li></span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            <form action="{{route('login_post')}}" method="POST" autocomplete="off">
                                                @csrf <!--esto es untocken para enviar datos con metodo post-->
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="usuario" type="text" class="form-control" placeholder="Usuario" value="{{old('usuario')}}"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="password" type="password" class="form-control" placeholder="Contraseña" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
                            </div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
	</body>
</html>


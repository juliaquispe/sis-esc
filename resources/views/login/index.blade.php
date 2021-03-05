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
                                <div class="space"></div>
								<div>
                                    <img class="nav-user-photo" style="border-radius: 800px" width="120" height="120" src="{{asset("assets/$theme/assets/images/gallery/clinica.jpg")}}" />
                                    <span style="color: rgb(238, 221, 233)"><b><u>CLÍNICA</u></b></span>
                                    <font style="color: rgb(74, 143, 199)" size="6" face="impact"><u>SANTA TERESA</u></font>
                                </div>
								<h5 style="color: rgb(83, 226, 195)" id="id-company-text">Sistema de control de Historial y Fichaje </h5>
							</div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header royal  bigger"> {{--poner color--}}
												Inicie Sesión
											</h4>
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
													<div class="clearfix" style="align: center">
                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Ingresar</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->
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


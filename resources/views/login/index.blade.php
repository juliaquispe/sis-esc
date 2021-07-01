		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/bootstrap.min.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/font-awesome/4.5.0/css/font-awesome.min.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/fonts.googleapis.com.css")}}" />
		<link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace.min.css")}}" />
        <link rel="stylesheet" href="{{asset("assets/$theme/assets/css/ace-rtl.min.css")}}" />
        <link rel="stylesheet" href="{{asset("assets/css/estilos.css")}}" />
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
                                    @php
                                        $clinica=MyHelper:: Datos_Clinica();
                                    @endphp
                                    @if ($clinica->logo==null)
                                        <img class="nav-user-photo" style="border-radius: 800px" width="120" height="120" class="zoom" src="{{asset("assets/$theme/assets/images/avatars/logo.jpg")}}"/>
                                    @else
                                        <img class="nav-user-photo" style="border-radius: 800px" width="120" height="120" src="{{Storage::url("Datos/Clinica/$clinica->logo")}}"/>
                                    @endif
                                    <span style="color: rgb(238, 221, 233)"><b><u>CLÍNICA</u></b></span>
                                    <font style="color: rgb(74, 143, 199)" size="6" face="impact"><u>SANTA TERESA</u></font>
                                </div>
								<h5 style="color: rgb(83, 226, 195)" id="id-company-text">Sistema de Administración de Historial y Fichaje </h5>
							</div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h3 class="header center " style="color: midnightblue" >
												Inicie Sesión
											</h3>
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
                                            <form action="{{route('login_post')}}" method="POST" autocomplete="off" class="">
                                                @csrf <!--esto es untocken para enviar datos con metodo post-->
												<div class="form">
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="usuario" type="text" value="{{old('usuario')}}" required/>
															<label class="lbl-usuario">
																<span class="txt-usuario"><i class="ace-icon fa fa-user"></i> Usuario</span>
															</label>
														</span>
													</label>
												</div>
												<div class="form">
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="password" type="password" required/>
															<label class="lbl-password">
																<span class="txt-password"><i class="ace-icon fa fa-lock"></i> Contraseña</span>
															</label>
														</span>
													</label>
												</div>
												<div class="form">
													<div class="clearfix center">
                                                        <button type="submit" class="width-35  btn btn-sm btn-primary" style="border-radius: 30%">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Ingresar</span>
														</button>
													</div>
												</div>
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


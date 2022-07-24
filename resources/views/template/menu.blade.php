<!-- Page Preloder -->
<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header Section Begin -->


	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<ul class="header__top__left">
							<li><img src="{!! asset('estilo/img/logoDC.png') !!}" width="40px" height="50px"></li>
							<li><i class="fa fa-phone"></i>722-782-8137</li>
							<li><i class="fa fa-map-marker"></i> Instituto tecnologico de Toluca</li>
						</ul>
					</div>
					<div class="col-lg-4">
						<div class="header__top__right">
							<a href="https://www.facebook.com/ivan.GonGarc"><i class="fa fa-facebook"></i></a>
							<a href="https://www.instagram.com/ivanchanitu/"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<div class="header__logo"> 
						<a href="{!! asset('/') !!}"><h3 class="text-primary">Doctor call</h3></a>
					</div>
				</div>
				<div class="col-lg-10">
					<div class="header__menu__option">
						<nav class="header__menu">
							<ul>
								@auth
								<li><a href="{!! asset('opcionesusuario') !!}">Soy cliente</a></li>
								<li><a href="{!! asset('OpcionesAdmin') !!}">Soy Administrador</a></li>
								<li><a href="{!! asset('OpcionesDoctor') !!}">Soy Doctor</a></li>
								</ul>
						</nav>
						<div class="header__btn">
							<a href="{!! asset('cerrarsession') !!}" class="primary-btn">Cerrar sesión</a>
						</div>
								@else
								<li class="active"><a href="register">Crear cuenta</a></li>
							</ul>
						</nav>
						<div class="header__btn">
							<a href="login" class="primary-btn">Iniciar sesión</a>
						</div>
						@endauth
					</div>
				</div>
			</div>
			<div class="canvas__open">
				<i class="fa fa-bars"></i>
			</div>
		</div>
	</header>
	<!-- Header Section End -->
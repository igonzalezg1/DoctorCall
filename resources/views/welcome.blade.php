@extends('template.master')
@section('contenido_central')
<div class="container">
		<div class="row">
			<div class="col-sm-2">

			</div>
			<div class="col-sm-8">
				<h2 align="center">Bienvenido a Doctor Call</h2>
				<p align="justify">
					Que es doctor call: Es una plataforma pensaba en la necesidad que existe dentro de la sociedad para atender situaciones de las distintas áreas médicas que existen como lo son oncología, medicina general, pediatría, neurología, por mencionar sólo algunas.
				</p>
				<div id="demo" class="carousel slide" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
					</ul>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="{!! asset('estilo/img/i1.jpg') !!}" alt="Los Angeles" width="1100" height="250">
							<div class="carousel-caption">
								<h3>Doctor Call</h3>
								<p>Mas informacion...</p>
							</div>   
						</div>
						<div class="carousel-item">
							<img src="{!! asset('estilo/img/i2.jpg') !!}" alt="Chicago" width="1100" height="250">
							<div class="carousel-caption">
								<h3>Doctor Call</h3>
								<p>Mas informacion...</p>
							</div>   
						</div>
						<div class="carousel-item">
							<img src="{!! asset('estilo/img/i3.jpg') !!}" alt="New York" width="1100" height="250">
							<div class="carousel-caption">
								<h3>Doctor Call</h3>
								<p>Mas informacion...</p>
							</div>   
						</div>
					</div>
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
				<p align="justify">
					Objetivo general: Desarrollar una herramienta digital para agendar citas con médicos de diferentes especialidades dedicada a la población en general utilizando herramientas de diseño web y maquetado como HTML y CSS.
				</p>
			</div>
			<div class="col-sm-2">

			</div>
		</div>
	</div>

	<h2 class="display-4" align = "center">Información de desarrolladores y contactos.</h2>
	<br />
	<div id="section1" class="container-fluid bg-primary" style="padding-top:70px;padding-bottom:70px">
		<img src="{!! asset('estilo/img/vane2.jpeg') !!}" width="300px">
		<h1>Diana Vanessa Medina Pichardo</h1>
		<h3>Telefono: 222-222-2222 </h3>
		<h3>Correo: dianavanessa@gmail.com</h3>
		<h3>Facebook: Diana Vanessa Medina Pichardo</h3>
		<h3>Instagram: DianaMedinaPichardo</h3>
	</div>
	<div id="section2" class="container-fluid bg-success" style="padding-top:70px;padding-bottom:70px">
		<img src="{!! asset('estilo/img/jonathan.jpeg') !!}" width="300px">
		<h1>Jonathan Antonio Garcia Ortiz</h1>
		<h3>Telefono: 333-333-3333 </h3>
		<h3>Correo: jonathanantonio@gmail.com</h3>
		<h3>Facebook: Jonathan Antonio Garcia Ortiz</h3>
		<h3>Instagram: JonathanAntonio</h3>
	</div>
	<div id="section3" class="container-fluid bg-info" style="padding-top:70px;padding-bottom:70px">
		<img src="{!! asset('estilo/img/ivan2.jpeg') !!}" width="300px">
		<h1>Ivan de Jesus Gonzalez Garcia</h1>
		<h3>Telefono: 444-444-4444 </h3>
		<h3>Correo: ivandejesusgonzalez@gmail.com</h3>
		<h3>Facebook: Ivan de Jesus Gonzalez Garcia</h3>
		<h3>Instagram: ivandejesusgongar</h3>
	</div>
@endsection()
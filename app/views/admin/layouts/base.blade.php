<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>
		@section('titulo')
			Página principal
		@show 
		 | {{Site::find(1)->name}}
	</title>
	<meta charset="utf-8" />

	<!-- CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
</head>
<body>

	<div class="container-full">

		<div class="row">
			<div class="col-lg-7 col-lg-offset-3" style="margin-bottom:50px;">
				<h1>Panel de Administración</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-2 col-lg-offset-3">
				<h3>Menú principal</h3>
				<ul>
					<li><a href="{{URL::to('/admin')}}">Inicio</a></li>
					<li><a href="{{URL::to('/')}}">Ir a la web</a></li>
					<li><a href="{{URL::to('/logout')}}">Desconectarse</a></li>
				</ul>
				<h3>Artículos</h3>
				<ul>
					<li><a href="{{URL::to('/admin/posts')}}">Lista de artículos</a></li>
					<li><a href="{{URL::to('/admin/posts/add')}}">Añadir artículo</a></li>
					<li><a href="{{URL::to('/admin/categories')}}">Categorías</a></li>
				</ul>
			</div>

			<div class="col-lg-5">
				@yield('content')
			</div>
		</div>

		<div class="row">
			<div class="col-lg-7 col-lg-offset-3">
				<footer style="text-align:center;">
					App por @JaimeMSE
				</footer>
			</div>
		</div>

	</div>

	<!-- JS -->
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Practica PHP Notas</title>
	<link rel="stylesheet" href="../core/css/bootstrap.min.css">
	
</head>
<body>

<div class="container my-3">
	<a href="{{ route('inicio') }}" class="btn btn-primary">Inicio</a>
	<a href="{{ route('foto') }}" class="btn btn-primary">Fotos</a>
	<a href="{{ route('noticias') }}" class="btn btn-primary">Blog</a>
	<a href="{{ route('nosotros') }}" class="btn btn-primary">Nosotros</a>
	<br>
</div>

<!-- aqui cambia  -->
<div class="container">
   @yield('seccion')
</div>



</body>
</html>
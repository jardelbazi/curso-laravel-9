<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title') - Curso Laravel 9</title>

	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

	<div class="app">
		<form action="{{ route('logout') }} " method="post">
			@csrf
			<button type="submit">Sair</button>
		</form>
		@yield('content')
	</div>

</body>
</html>

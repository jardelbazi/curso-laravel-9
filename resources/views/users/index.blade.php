@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')

<h1>Listagem dos Usuários | <a href="{{ route('users.create') }}">+ Novo</a></h1>

<form action="{{ route('users.index') }}" method="get">
	<input type="text" name="search" id="search" placeholder="Pesquisar">
	<button type="submit">Pesquisar</button>
</form>

<ul>
	@foreach ($users as $user)
		<li>
			{{ $user->name }} -
			{{ $user->email }}
			| <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
			| <a href="{{ route('comments.index', $user->id) }}">Ver Comentários ({{ $user->comments->count() }})</a>
			| <a href="{{ route('users.edit', $user->id) }}">Editar</a>
		</li>
	@endforeach
</ul>

<div>{{ $users->appends(['search' => request()->get('search', '')])->links() }}</div>

@endsection

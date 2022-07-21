@extends('layouts.app')

@section('title', 'Listagem dos Comentários do Usuário {{ $user->name }}')

@section('content')

<h1>Listagem dos Comentários do Usuário {{ $user->name }} | <a href="{{ route('comments.create', $user->id) }}">+ Novo</a></h1>

<form action="{{ route('comments.index', $user->id) }}" method="get">
	<input type="text" name="search" id="search" placeholder="Pesquisar">
	<button type="submit">Pesquisar</button>
</form>

<ul>
	@foreach ($comments as $comment)
		<li>
			{{ $comment->body }} -
			{{ $comment->visible ? 'SIM' : 'NÃO'}}
			| <a href="{{ route('comments.edit', ['userId' => $user->id, 'id' => $comment->id]) }}">Editar</a>
		</li>
	@endforeach
</ul>

<div>{{ $comments->appends(['search' => request()->get('search', '')])->links() }}</div>

@endsection

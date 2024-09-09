@extends('layouts.main')

@section('title', "home")

@section('content')

<h1>Usuários do Sistema</h1>

@forelse ($users as $user)
  <a href="{{ url('/' . $user->name) }}">Ver detalhes de {{ $user->name }}</a>
  <p>{{ $user->name }}</p>
@empty
  <p>Não há usuários cadastrados.</p>
@endforelse

@endsection

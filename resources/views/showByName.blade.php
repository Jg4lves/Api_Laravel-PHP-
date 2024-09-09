@extends('layouts.main')

@section('title', "showByName")

@section('content')


@if ($user)
<h1>Usuario {{ $user->name }}</h1>
  <p>CPF: {{$user->cpf}}</p>
  <p>Data de Nascimento: {{$user->data_nascimento}}</p>

@else
    <h1>Usuário não encontrado</h1>
@endif


@endsection
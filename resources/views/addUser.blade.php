@extends('layouts.main')

@section('title', 'Adicionar Usuário')

@section('content')

<h1>Adicionar Usuário</h1>
<form action="/user" method="POST">
  @csrf
  <div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required>
  </div>
  <div class="form-group">
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento" required>
  </div>
  <input type="submit" value="Adicionar Usuário">
</form>

@endsection

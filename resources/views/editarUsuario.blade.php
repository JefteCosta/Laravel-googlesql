@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('sidebar')
    @parent
    <div align="center">
        <h1>Usuarios do Sistema</h1>
        <p>Edição de Usuarios </p>
    </div>
@endsection

@section('content')
    <div class="container">
        <form action="{{route('user.editado', ['user' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome Completo:</label>
                <input type="text" class="form-control" id="name" name="name" ria-describedby="nameHelp" placeholder="Seu nome completo" value="{{$user->name}}">
                <small id="naameHelp" class="form-text text-muted">Nunca vamos compartilhar seu nome, com ninguém.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de email</label>
                <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" placeholder="Seu email" name="email" value="{{$user->email}}">
                <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="password" placeholder="Senha" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection

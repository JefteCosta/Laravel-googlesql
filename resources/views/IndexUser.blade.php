
@extends('layouts.app')

@section('title', 'Usuario')

@section('sidebar')
    @parent
        <div class="container">
            <div align="center">
                <h1>Usuarios do Sistema</h1>
                <p>Tabela de Usuarios Cadastrados </p>
            </div>
            @switch($msg)
                @case('cadastrado')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Tudo, certo!</strong> Usuario Cadastrado com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @break
                @case('alterado')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Tudo, certo!</strong> Usuario Atualizado com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @break
                @case('deletado')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Tudo, certo!</strong> Usuario Deletado com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @break
                @default
                <div></div>
            @endswitch
        </div>
@endsection

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" width="10%">#</th>
                <th scope="col" width="35%">Nome</th>
                <th scope="col" width="35%">Email</th>
                <th scope="col" colspan="2" width="20%">Ação</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-right"><a href="{{route('user.editar', ['user'=> $user->id])}}" class="btn btn-primary">Editar</a></td>
                    <td class="text-right">
                        <form action="{{route('user.delete', ['user'=> $user->id])}}"  method="POST" >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr align="rigth">
                <td colspan="5" class="text-right" >
                    <a href="{{route('user.novo')}}" class="btn btn-success">Novo Usuario</a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection





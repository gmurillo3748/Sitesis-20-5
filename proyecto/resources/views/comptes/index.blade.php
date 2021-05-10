@extends('layouts.app')

@section('content')

<h2>Comptes</h2>
<div>
    <table class="my-5 table table-striped">
        <th>ID</th>
        <th>Compte</th>
        <th>FUC</th>
        <th>Clau</th>
        <th>Accions</th>
        @foreach ($comptes as $compte)
        <tr>
            <td>{{$compte->id}}</td>
            <td>{{$compte->compte}}</td>
            <td>{{$compte->fuc}}</td>
            <td>{{$compte->clau}}</td>
            <td>
                <a href="comptes/edit/{{$compte->id}}"><i title="Edita el compte" class="fas fa-edit"></i></a>
                <a href="comptes/remove/{{$compte->id}}"><i title="Elimina el compte" class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="comptes/add">Afegir un compte</a>
    
</div>

@endsection

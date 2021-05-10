@extends('layouts.app')

@section('content')

<h2>Usuaris</h2>
<div>
    <table class="my-5 table table-striped">
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Actiu</th>        
        <th>Accions</th>
        @foreach ($usuaris as $usuari)
        <tr>
            <td>{{$usuari->id}}</td>
            <td>{{$usuari->name}}</td>
            <td>{{$usuari->email}}</td>
            <td>{{$usuari->rol}}</td>
            <td>{{$usuari->activo}}</td>
            <td>
                <a href="usuaris/edit/{{$usuari->id}}"><i title="Edita el usuari" class="fas fa-edit"></i></a>
                <a href="usuaris/remove/{{$usuari->id}}"><i title="Elimina el usuari" class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="usuaris/add">Afegir un usuari</a>
    
</div>

@endsection

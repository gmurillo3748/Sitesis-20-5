@extends('layouts.app')

@section('content')

<h2>Cursos</h2>
<div>
    <table class="my-5 table table-striped">
        <th>ID</th>
        <th>Curs</th>
        <th>Accions</th>
        @foreach ($cursos as $curs)
        <tr>
            <td>{{$curs->id}}</td>
            <td>{{$curs->curs}}</td>
            <td>
                <a href="cursos/edit/{{$curs->id}}"><i title="Edita el curs" class="fas fa-edit"></i></a>
                <a href="cursos/remove/{{$curs->id}}"><i title="Elimina el curs" class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="cursos/add">Afegir un curs</a>
    
</div>

@endsection

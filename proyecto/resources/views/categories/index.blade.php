@extends('layouts.app')

@section('content')

<h2>Categories</h2>
<div>
    <table class="my-5 table table-striped">
        <th>ID</th>
        <th>Categoria</th>
        <th>Accions</th>
        @foreach ($categories as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->categoria}}</td>
            <td>
                <a href="categories/edit/{{$categoria->id}}"><i title="Edita el categoria" class="fas fa-edit"></i></a>
                <a href="categories/remove/{{$categoria->id}}"><i title="Elimina el categoria" class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="categories/add">Afegir una categoria</a>
    
</div>

@endsection

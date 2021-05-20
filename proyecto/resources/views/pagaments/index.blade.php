@extends('layouts.app')

@section('content')

<h2>Pagaments</h2>
<div>
    <a href="/pagaments/print">IMPRIMIR</a>
    <table class="my-5 table table-striped">
        <th>ID</th>
        <th>Nom</th>
        <th>Descripció</th>
        <th>Categoria</th>
        <th>Compte</th>
        <th>Preu</th>
        <th>Data Inicial</th>
        <th>Data Final<th>
        <th>Accions</th>
        @foreach ($pagaments as $pagament)
        <tr>
            <td>{{$pagament->id}}</td>
            <td>{{$pagament->nombre}}</td>
            <td>{{$pagament->descripcion}}</td>
            <td>{{isset($pagament->categoria_id) ? $pagament->categoria()->categoria : '' }}</td>
            <td>{{isset($pagament->compte_id) ? $pagament->cuenta()->compte : '' }}</td>
            <td>{{$pagament->preu}}</td>
            <td>{{$pagament->data_inicial}}</td>
            <td>{{$pagament->data_final}}</td>
            <td >
                <a href="pagaments/edit/{{$pagament->id}}"><i title="Edita el pagament" class="fas fa-edit"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="pagaments/add">Afegir un pagament</a>
    
</div>

@endsection

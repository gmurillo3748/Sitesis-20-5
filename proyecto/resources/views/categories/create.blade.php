@extends('layouts.app')

@section('content')
<h2>Afegir una Categoria</h2>
<div class="p-5">
    <form method="POST" action="{{isset($categoria) ? "../update/$categoria->id" : 'add'}}">
        @csrf
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="icategoria">Categoria: </label>
                <input required class="col-4"id="icategoria" name="categoria" value="{{isset($categoria) ? $categoria->categoria : ''}}">
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <br>
        <br>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
    
</div>

@endsection

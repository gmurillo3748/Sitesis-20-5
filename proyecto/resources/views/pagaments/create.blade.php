@extends('layouts.app')

@section('content')
<h2>Afegir un Pagament</h2>
<div class="p-5">
    <form method="POST" action="{{isset($pagament) ? "../update/$pagament->id" : 'add'}}">
        @csrf
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="inombre">Nom: </label>
                <input required class="col-4"id="inombre" name="nombre" value="{{isset($pagament) ? $pagament->nombre : ''}}">
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="idescripcion">Descripcio: </label>
                <textarea required class="ckeditor col-4"id="idescripcion" name="descripcion" rows="4" cols="50">{{isset($pagament) ? $pagament->descripcion : ''}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="icategoria">Categoria: </label>
                <select id="icategoria" name="categoria_id" class="form-control col-4">
                    @inject('categories','App\Http\Controllers\PagamentController')
                    {{ $categories->selectCategories() }}
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="icompte">Compte: </label>
                <select id="icompte" name="compte_id" class="form-control col-4">
                    @inject('comptes','App\Http\Controllers\PagamentController')
                    {{ $comptes->selectComptes() }}
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="ipreu">Preu: </label>
                <input required type="text" class="col-4"id="ipreu" name="preu" value="{{isset($pagament) ? $pagament->preu : ''}}">
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="idata_inicial">Data Inicial: </label>
                <input required type="date" class="col-4"id="idata_inicial" name="data_inicial" value="{{isset($pagament) ? $pagament->data_inicial : ''}}">
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label required class="col-2 text-right" for="idata_final">Data Final: </label>
                <input required type="date"  class="col-4"id="idata_final" name="data_final" value="{{isset($pagament) ? $pagament->data_final : ''}}">
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

        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
</div>

@endsection

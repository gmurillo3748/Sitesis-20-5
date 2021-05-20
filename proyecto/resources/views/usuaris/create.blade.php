@extends('layouts.app')

@section('content')
<h2>Afegir una Categoria</h2>
<div class="p-5">
    <form method="POST" action="{{isset($usuari) ? "../update/$usuari->id" : 'add'}}">
        @csrf
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="iname">Nom : </label>
                <input required type="text" required class="col-4"id="iname" name="name" value="{{isset($usuari) ? $usuari->name : ''}}">
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="iemail">Email: </label>
                <input required type="email" required class="col-4"id="iemail" name="email" value="{{isset($usuari) ? $usuari->email : ''}}">
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="ipassword">Password: </label>
                <input type="password" required class="col-4" id="ipassword" name="password" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="rol">Rol :</label>
                <select class="col-4" name="rol" id="rol">
                    <option value="1">Professorat</option>
                    <option value="0">Administrador</option> 
                </select> 
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-2 text-right" for="activo">Actiu :</label>
                <select class="col-4" name="activo" id="activo">
                    <option value="1">Actiu</option>
                    <option value="0">Inactiu</option> 
                </select> 
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

@extends('layouts.app')

@section('content')
<h2>Afegir un Compte</h2>
<div class="p-5">
    <form method="POST" action="{{isset($compte) ? "../update/$compte->id" : 'add'}}">
        @csrf
        <div class="form-group">
            <label class="col-3" for="icompte">Compte: </label>
            <input required class="col-7" id="icompte" name="compte" value="{{isset($compte) ? $compte->compte : ''}}">
        </div>
        
        <div class="form-group">
            <label class="col-3" for="ifuc">FUC: </label>
            <input required class="col-7" id="ifuc" name="fuc" value="{{isset($compte) ? $compte->fuc : ''}}">
        </div>
        
        <div class="form-group">
            <label class="col-3" for="iclau">Clau: </label>
            <input required class="col-7" id="iclau" name="clau" value="{{isset($compte) ? $compte->clau : ''}}">
        </div>
        <br>
        <br>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
</div>

@endsection

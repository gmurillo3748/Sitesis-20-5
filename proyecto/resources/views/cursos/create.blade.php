@extends('layouts.app')

@section('content')
<h2>Afegir un Curs</h2>
<div class="p-5">
    <form method="POST" action="{{isset($curs) ? "../update/$curs->id" : 'add'}}">
        @csrf
        <label for="icurs">Curs: </label>
        <input required id="icurs" name="curs" value="{{isset($curs) ? $curs->curs : ''}}">
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

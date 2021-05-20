@extends('layouts.app')

@section('content')
@guest
<h2>Pagaments INS Camí de Mar</h2>
<div class="m-4">
    <p>Aquesta és la pàgina principal dels pagaments online de l'INS Camí de Mar de Calafell, 
        per procedir a realitzar un pagament, escull el curs al menú de la barra blava superior 
        i fes clic al nom del pagament que vulguis realitzar per a continuar amb el tràmit.
    </p>
</div>
@endguest
@auth
<h2>INTRANET - Pagaments INS Camí de Mar</h2>
<div class="m-4">
    <p>Benvolguts a la Intranet de pagaments del Ins Camí de mar.</p>
    <p>Per a continuar, fes click en qualsevol de les opcions que es mostren al menú horizontal.</p>
</div>
@endauth

@endsection

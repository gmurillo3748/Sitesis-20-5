@extends('layouts.app')

@section('content')

<h2>{{$pagament->nombre}}</h2>
<div>
    <div class="my-5">
    {!!$pagament->descripcion!!}
    </div>
    <form action="https://sis.sermepa.es/sis/realizarPago" method="post" accept-charset="utf-8" 
    id="form_260"> 
        <input type="hidden" name="Ds_SignatureVersion" value="HMAC_SHA256_V1" /> 
        <input type="hidden" name="Ds_MerchantParameters" value="eyJEU19NRVJDSEFOVF9BTU9VTlQiOiIyMDAwMCIsIkRTX01FUkNIQU5UX09SREVSIjoiMjAwMjI3MTAyOTU0IiwiRFNfTUVSQ0hBTlRfTUVSQ0hBTlRDT0RFIjoiMDIyMzE2Nzk5MCIsIkRTX01FUkNIQU5UX0NVUlJFTkNZIjoiOTc4IiwiRFNfTUVSQ0hBTlRfVFJBTlNBQ1RJT05UWVBFIjoiMCIsIkRTX01FUkNIQU5UX1RFUk1JTkFMIjoiMSIs">
        <input class="btn btn-primary" type="submit" value="Fer el pagament">
    </form>
    
    <div class="row my-3 mx-1">
      <button class="btn btn-primary" style="border:none;" id="twitter">Twitter</button>
      <button class="btn btn-primary" style="border:none;" id="facebook">Facebook</button>
      <button class="btn btn-primary" style="border:none;" id="whatsapp">WhatsApp</button>
      <button class="btn btn-primary" style="border:none;" id="telegram">Telegram</button>
    </div>

    
</div>

@endsection

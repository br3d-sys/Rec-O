@extends('layouts.client')

@section('content')

<div class="container d-flex align-items-center">

    <div class="col-sm-6 p-3">
        <img width="100%" id="imagen_reconocida" src="" alt="" attr-img ="{{$recognition[0]->image}}">
    </div>
    <div class="col-sm-6 p-2">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Resultado</h3>
            </div>
        
            <div class="card-body">
                <p>
                Grado de Similitud: {{$recognition[0]->similarity}}
                <br>
                Intento: {{$recognition[0]->attempt}}
                <br>
                Fecha y Hora: {{$recognition[0]->updated_at}}
            </p>
            </div>
            @if ($recognition[0]->similarity>90)
                <div class="d-flex justify-content-between py-3 px-5">
                <div class="bg-green p-2">Validación Exitosa</div>
                <a class="btn btn-primary" href="/dashboard">Continuar</a>
            </div>
            @else
                <div class="d-flex justify-content-between py-3 px-5">
                    <div class="bg-red p-2">Validación Fallida</div>
                    <a class="btn btn-primary" href="/recfacial">Continuar</a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(){
          var imagen = document.getElementById('imagen_reconocida');

          var img64 = imagen.getAttribute('attr-img');
          imagen.setAttribute('src', "data:image/jpg;base64," + img64);

        })
    </script>
@endsection
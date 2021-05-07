@extends('layouts.admin')
@section('content')
<div class="container cards bg-white p-5">
  
<div class="card-header">
  <h4>REGISTRO DE IDENTIFICACIÓN</h4>
</div>
<div class="card-body">
    <div class="row">
    @foreach ($recognition as $item)
    <div class="col-lg-6 p-2">
      <div class="card">
        <div class="row g-0 col-12">
          <div class="col-md-6 d-flex align-items-center" >
            <img width="100%" id="" class="imagen_mostrar" src="" alt="" attr-img ="{{$item->image}}">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title">{{DB::table('users')->where('id', $item->id_usuario)->first()->name}}</h5>
              <p class="card-text">
                Grado de Similitud: {{$item->similarity}}
                <br>
                Intento: {{$item->attempt}}
                <br>
                Fecha y Hora: {{$item->updated_at}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    @endforeach
  </div>
</div>
  

  
</div>
@endsection
@section('scripts')
    <script>
      document.addEventListener("DOMContentLoaded",function() {
        
        var imagenes = document.getElementsByClassName("imagen_mostrar");
      imagenes.forEach(element => {
          var img64 = element.getAttribute('attr-img');
          element.setAttribute('src', "data:image/jpg;base64," + img64);
      });

      })
      
    </script>
@endsection
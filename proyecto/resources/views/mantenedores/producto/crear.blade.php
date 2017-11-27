@extends('layouts/principal')
@section('contenido')
<div class="row" style="padding: 20px;">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Crear Producto</span>
        <form id="formularioCrear" method="post" action="/producto">
         {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s4">
              <input value="" id="nombre_producto" name="nombre_producto" type="text" class="validate">
              <label class="active" for="nombre_producto">Nombre</label>
            </div>
           
          </div>
        </form>
        
      </div>
      <div class="card-action">
        <a href="/producto">Cancelar</a>
        <a href="javascript:{}" onclick="document.getElementById('formularioCrear').submit();">Crear</a>
      </div>
    </div>
  </div>
</div>

@stop
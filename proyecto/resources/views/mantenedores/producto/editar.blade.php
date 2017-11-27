@extends('layouts/principal')
@section('contenido')
<div class="row" style="padding: 20px;">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Editar Producto</span>
        <form id="formularioEditar" method="post" action="/producto/{{$data_producto->id_producto}}">
          <input name="_method" type="hidden" value="PUT">
         {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s4">
              <input value="{{$data_producto->nombre_producto}}" id="nombre_producto" name="nombre_producto" type="text" class="validate">
              <label class="active" for="nombre_producto">Nombre</label>
            </div>
           
          </div>
        </form>
        
      </div>
      <div class="card-action">
        <a href="/producto">Cancelar</a>
        <a href="javascript:{}" onclick="document.getElementById('formularioEditar').submit();">Editar</a>
      </div>
    </div>
  </div>
</div>

@stop
@extends('layouts/principal')
@section('contenido')
<div class="row" style="padding: 20px;">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Crear Variedad</span>
        <form id="formularioCrear" method="post" action="/variedad">
         {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s4">
              <input value="" id="nombre_variedad" name="nombre_variedad" type="text" class="validate">
              <label class="active" for="nombre_variedad">Nombre</label>
            </div>
            <div class="input-field col s4">
              <select id="id_producto" name="id_producto">
                @foreach($data as $row)
                  <option value="{{ $row->id_producto }}">{{ $row->nombre_producto }}</option>
                @endforeach
              </select>
              <label>Producto</label>
            </div>
           
          </div>
        </form>
        
      </div>
      <div class="card-action">
        <a href="/variedad">Cancelar</a>
        <a href="javascript:{}" onclick="document.getElementById('formularioCrear').submit();">Crear</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
@stop
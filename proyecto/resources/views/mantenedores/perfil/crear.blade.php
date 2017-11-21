@extends('layouts/principal')
@section('contenido')
<div class="row" style="padding: 20px;">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Crear Perfil</span>
        <form id="formularioCrear" method="post" action="/perfil">
         {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s4">
              <input value="" id="nombre" name="nombre" type="text" class="validate">
              <label class="active" for="nombre">Nombre</label>
            </div>
            <div class="input-field col s4">
              <select id="estado" name="estado">
                  <option value="Habilitado">Habilitado</option>
                  <option value="Deshabilitado">Deshabilitado</option>
              </select>
              <label>Estado</label>
            </div>
           
          </div>
        </form>
        
      </div>
      <div class="card-action">
        <a href="/perfil">Cancelar</a>
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
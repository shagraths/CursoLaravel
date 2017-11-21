@extends('layouts/principal')
@section('contenido')
<div class="row" style="padding: 20px;">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Editar Perfil</span>
        <form id="formularioEditar" method="post" action="/perfil/{{$data_perfil->id}}">
          <input name="_method" type="hidden" value="PUT">
         {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s4">
              <input value="{{$data_perfil->nombre}}" id="nombre" name="nombre" type="text" class="validate">
              <label class="active" for="nombre">Nombre</label>
            </div>
            <div class="input-field col s4">
              <select id="estado" name="estado">
                @if($data_perfil->estado === 'Habilitado')
                    <option value="Habilitado" selected>Habilitado</option>
                    <option value="Deshabilitado" >Deshabilitado</option>
                @else
                    <option value="Habilitado">Habilitado</option>
                    <option value="Deshabilitado" selected>Deshabilitado</option>
                @endif
              </select>
              <label>Perfil</label>
            </div>
           
          </div>
        </form>
        
      </div>
      <div class="card-action">
        <a href="/perfil">Cancelar</a>
        <a href="javascript:{}" onclick="document.getElementById('formularioEditar').submit();">Editar</a>
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
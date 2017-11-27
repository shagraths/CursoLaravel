@extends('layouts/principal')
@section('contenido')
<div class="row" style="padding: 20px;">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Editar Variedad</span>
        <form id="formularioEditar" method="post" action="/variedad/{{$data_variedad->id_variedad}}">
            <input name="_method" type="hidden" value="PUT">
            {{ csrf_field() }}
            <div class="row">
            <div class="input-field col s4">
                <input value="{{$data_variedad->nombre_variedad}}" id="nombre_variedad" name="nombre_variedad" type="text" class="validate">
                <label class="active" for="nombre_variedad">Nombre</label>
            </div>
            <div class="input-field col s4">
                <select id="id_producto" name="id_producto">
                @foreach($select_producto as $row)
                    @if($data_variedad->id_producto === $row->id_producto)
                    <option value="{{ $row->id_producto }}" selected>{{ $row->nombre_producto }}</option>
                    @else
                    <option value="{{ $row->id_producto }}" >{{ $row->nombre_producto }}</option>
                    @endif
                    
                @endforeach
                </select>
                <label>Producto</label>
            </div>
            
            </div>
        </form>
        
      </div>
      <div class="card-action">
        <a href="/variedad">Cancelar</a>
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
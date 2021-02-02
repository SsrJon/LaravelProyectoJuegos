@extends('welcome')

@section('content')

    <h1>Info del juego</h1> 

    <div class="row">

        <div class="col-sm-4">
        
        
            <img src="{{ asset('img/'.$arrayJuegos->poster) }}" style="height:200px; width:150px"/>
        </div>
        <div class="col-sm-8">
            
            <p>Titulo: {{$arrayJuegos->title}}</p>
            <p>Año: {{$arrayJuegos->year}}</p>
            <p>Studio: {{$arrayJuegos->studio}}</p>
            <p>Sinopsis: {{$arrayJuegos->synopsis}}</p>
            <p>Categoria: {{$arrayCategorias->nombreCategoria}}</p>

            <button class="btn btn-default" onclick="window.location='{{ url('/juegos/edit/' .($id) )}}'">Editar juego</button>
            <button class="btn btn-default" onclick="window.location='{{ url('borrar/' .($arrayJuegos->id) )}}'">Borrar</button>
            <button class="btn btn-default" onclick="window.location='{{ url('galeria/' )}}'">Volver al listado</button>
            
            
        </div>
    </div>

@stop
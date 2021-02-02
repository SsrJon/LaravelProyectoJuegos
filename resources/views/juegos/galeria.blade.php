@extends('welcome')

@section('content')

    <h1>Lista de juegos</h1> 

    <div class="row" style="margin-top:40px">

        @foreach( $arrayJuegos as $key => $juego )
        <div class="col-xs-6 col-sm-4 col-md-3 text-center" style="margin-top:10px">

            <a href="{{ url('/juegos/show/' . $key ) }}" >
                <img src="../public/img/{{$juego->poster}}" style="height:200px; width:150px"/>
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$juego->title}}
                </h4>
                
            </a>
            @if(isset(Auth::user()->name))
            <button class="btn btn-default" onclick="window.location='{{ url('borrar/' .($juego->id) )}}'">Borrar</button>
            @endif

        </div>
        @endforeach

    </div>

@stop
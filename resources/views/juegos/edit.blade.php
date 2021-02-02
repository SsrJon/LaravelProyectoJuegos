@extends('welcome')

@section('content')


    <h1>Editar juego</h1> 
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Editar juego
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" id="method" name="_method" value="PUT">
                        {{ method_field('PUT') }}

                        <input type="hidden" id="id" name="id" value="{{$arrayJuegos->id}}">
                        <div class="form-group">
                            <label for="title">Modificar juego</label>
                            <input type="text" name="title" id="title" value="{{$arrayJuegos->title}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Año</label>
                            <input type="text" name="year" id="year" value="{{$arrayJuegos->year}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Estudio</label>
                            <input type="text" name="studio" id="studio" value="{{$arrayJuegos->studio}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Poster</label>
                            <input type="file" class="form-control" name="poster" id="poster" />
                        </div>

                        <div class="form-group">
                            <label for="synopsis">Categoria </label>
                            <select name="id_categoria" id="id_categoria">
                                @foreach( $arrayCategorias as $key => $categoria )
                                
                                <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="synopsis">Sinopsis</label>
                            <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$arrayJuegos->synopsis}}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar juego
                            </button>
                        </div>

                    </form>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
            </div>
        </div>
    </div>



   

@stop
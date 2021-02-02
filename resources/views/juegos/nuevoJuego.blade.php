@extends('welcome')

@section('content')

    <h1>Nuevo Juego</h1> 


    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Añadir Juego</h2> 
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="POST" enctype="multipart/form-data" >

                        <!-- Protección contra CSRF -->
                        @csrf
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Año</label>
                            <input type="text" name="year" id="year" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Estudio</label>
                            <input type="text" name="studio" id="director" class="form-control">
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
                            <textarea name="synopsis" id="synopsis" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir juego
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
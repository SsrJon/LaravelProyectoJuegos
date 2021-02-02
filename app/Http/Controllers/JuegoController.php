<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Juego;
use App\Models\Categoria;

class JuegoController extends Controller
{
    
	public $arrayJuegos=[];
	public $arrayCategorias=[];

    
	public function getJuegos(){

		$arrayJuegos = DB::table('juegos')->get();
        $arrayJuegos = Juego::all();
        $arrayJuegos =  DB::select('SELECT * FROM juegos');
		return view('juegos.galeria')->with('arrayJuegos', $arrayJuegos);
		//Forma con un array manual (Sin BD)
		/* return view('catalog.index')->with('arrayPeliculas', $this->arrayPeliculas); */
	}
	

	public function nuevoJuego(){

		$arrayCategorias = DB::table('categorias')->get();
        $arrayCategorias = Categoria::all();
        $arrayCategorias =  DB::select('SELECT * FROM categorias');
		
		return view('juegos.nuevoJuego')->with('arrayCategorias', $arrayCategorias);
		//Forma con un array manual (Sin BD)
		/* return view('catalog.index')->with('arrayPeliculas', $this->arrayPeliculas); */
	}

	public function getShow($id){
		
		$arrayJuegos = DB::table('juegos')->get();
		$arrayJuegos = Juego::all();
		$arrayJuegos =  DB::select('SELECT * FROM juegos');

		$arrayCategorias = DB::table('categorias')->get();
        $arrayCategorias = Categoria::all();
		$arrayCategorias =  DB::select('SELECT * FROM categorias');
		
		//id de la categoria
		$idC= $arrayJuegos[$id]->id_categoria-1;

		//Varios arrays
		return view('juegos.show', array('id'=>$id))->with('arrayJuegos', $arrayJuegos[$id])->with('arrayCategorias', $arrayCategorias[$idC]);
		/* return view('juegos.show', array('id' => $id, 'arrayJuegos' => $arrayJuegos[$id], 'arrayCategorias' => $arrayCategorias[$id] )); */
	}
	
	public function postJuego(Request $request){

		$validated = $request->validate([
			'title' => 'required|unique:juegos|max:255|min:3',
			'year' => 'required|integer|between:1980,2021',
			'studio' => 'required',
			'synopsis' => 'required',
			'poster' => 'required',
			'id_categoria' => 'required',
		]);

		$cover = $request->file('poster');
		$extension = $cover->getClientOriginalExtension();
		Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
	
		$title = $request->input('title');
		$year = $request->input('year');
		$studio = $request->input('studio');
		$poster = $cover->getFilename().'.'.$extension;
		$synopsis = $request->input('synopsis');
		$id_categoria = $request->input('id_categoria');

		DB::table('juegos')->insert(
			['title' => $title, 'year' => $year, 'studio' => $studio, 'poster' => $poster, 'synopsis' => $synopsis, 'id_categoria' => $id_categoria ]
		
		);
		return redirect()->action([JuegoController::class, 'getJuegos']);
		
	}

	public function getEdit($id){
		
		$arrayJuegos = DB::table('juegos')->get();
        $arrayJuegos = Juego::all();
		$arrayJuegos =  DB::select('SELECT * FROM juegos');
		
		$arrayCategorias = DB::table('categorias')->get();
        $arrayCategorias = Categoria::all();
		$arrayCategorias =  DB::select('SELECT * FROM categorias');
		
		//id de la categoria
		$idC= $arrayJuegos[$id]->id_categoria-1;

        return view('juegos.edit')->with('arrayJuegos', $arrayJuegos[$id])->with('arrayCategorias', $arrayCategorias);
	}

	public function putEdit(Request $request, $id ){


		$validated = $request->validate([
			'title' => 'required|max:255|min:3',
			'year' => 'required|integer|between:1980,2021',
			'studio' => 'required',
			'synopsis' => 'required',
			'poster' => 'required',
			'id_categoria' => 'required',
		]);


		$cover = $request->file('poster');
		$extension = $cover->getClientOriginalExtension();
		Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

		$idJ = $request->input('id');
		$title = $request->input('title');
		$year = $request->input('year');
		$studio = $request->input('studio');
		$poster = $cover->getFilename().'.'.$extension;
		$synopsis = $request->input('synopsis');
		$id_categoria = $request->input('id_categoria');

		

		DB::table('juegos')->where('id', $idJ)->update(
			['title' => $title, 'year' => $year, 'studio' => $studio, 'poster' => $poster, 'synopsis' => $synopsis, 'id_categoria' => $id_categoria ]
		);
	
		return redirect('juegos/show/'.$id);

	}

	public function borrar($id){

		DB::delete('delete from juegos where id = ?',[$id]);
		return redirect()->action([JuegoController::class, 'getJuegos']);
		
	}

}

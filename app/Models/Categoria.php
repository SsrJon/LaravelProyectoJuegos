<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /* use HasFactory; */

    // Parametros iniciales
    protected $table = 'categorias';
    public $timestamps = false;

    protected $fillable = ['nombreCategoria'];

    // Funciones
    public function juego() {
        return $this->hasMany('App\Models\Juego');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos';
    public $timestamps = false;

    protected $fillable = ['id', 'title', 'year', 'studio', 'poster', 'synopsis', 'id_categoria'];

    public function categorias() 
    {
        return $this->belongsTo('App\Models\Categoria', 'id_categoria', 'id');
    }
}

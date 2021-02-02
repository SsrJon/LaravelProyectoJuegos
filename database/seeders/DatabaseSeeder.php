<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Juego;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public $arrayJuegos = array(
        array(
            'title' => 'Red Read Redemption ',
            'year' => '2011', 
            'studio' => 'Rockstar', 
            'poster' => 'phpFB32.tmp.jpg', 
            'synopsis' => 'Vaqueros pew pew.',
            'id_categoria' => 2
        ),
        array(
            'title' => 'Red Read Redemption 2',
            'year' => '2018', 
            'studio' => 'Rockstar', 
            'poster' => 'php236C.tmp.webp', 
            'synopsis' => 'Vaqueros pew pew 2.',
            'id_categoria' => 2
        ),
        array(
            'title' => 'Yakuza 0',
            'year' => '2016', 
            'studio' => 'Sega', 
            'poster' => 'php4974.tmp.jpg', 
            'synopsis' => ' Japoneses enfadados y friday night.',
            'id_categoria' => 2
        ),
        array(
            'title' => 'Yakuza Like a Dragon',
            'year' => '2020', 
            'studio' => 'Sega', 
            'poster' => 'php76ED.tmp.jpg', 
            'synopsis' => 'Japoneses enfadados  ',
            'id_categoria' => 2
        ),
        array(
            'title' => 'Hades',
            'year' => '2020', 
            'studio' => 'SuperGiant', 
            'poster' => 'php9B7E.tmp.jpg', 
            'synopsis' => 'Mucho dios griego.',
            'id_categoria' => 3
        )
    );
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        // \App\Models\User::factory(10)->create();

        //primero las foreign key 
        /* self::seedCategorias(); */

        //luego las otras
        self::seedJuegos();
        self::seedUsuarios();
         
    }

    private function seedJuegos(){
        DB::table('juegos')->delete();
        foreach( $this->arrayJuegos as $juegos ) {
            $p = new Juego;
            $p->title = $juegos['title'];
            $p->year = $juegos['year'];
            $p->studio = $juegos['studio'];
            $p->poster = $juegos['poster'];
            $p->synopsis = $juegos['synopsis'];
            $p->id_categoria = $juegos['id_categoria'];
            $p->save();
        }
    }

    private function seedUsuarios(){
        DB::table('users');
        $u1 = new User;
        $u1->name = "admin";
        $u1->email = "admin@email.com";
        $u1->password = Hash::make("admin1234");
        $u1->save();

        $u2 = new User;
        $u2->name = "admin2";
        $u2->email = "admin2@email.com";
        $u2->password = Hash::make("admin1234");
        $u2->save();

        $u3 = new User;
        $u3->name = "Jon Ander";
        $u3->email = "jonanderdecastro@gmail.com";
        $u3->password = Hash::make("jon1234");
        $u3->save();

    }

    private function seedCategorias(){
        DB::table('categorias')->delete();
        $c1 = new Categoria;
        $c1->nombreCategoria = "Shooter";
        $c1->save();

        $c2 = new Categoria;
        $c2->nombreCategoria = "Sandbox";
        $c2->save();

        $c3 = new Categoria;
        $c3->nombreCategoria = "Roguelike";
        $c3->save();

        $c4 = new Categoria;
        $c4->nombreCategoria = "Conducción";
        $c4->save();

        $c5 = new Categoria;
        $c5->nombreCategoria = "Plataformas";
        $c5->save();

       

    }


}

<?php

use Illuminate\Database\Seeder;

class TextosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('textos')->insert(array (
	  		0 =>
	  		array (
				'id'             => 1,
				'home_titulo'    => 'Descubrí Van Rossum',
				'home_subtitulo' => 'Empresa líder en el rubro',
	  		),
	  	));
    }
}

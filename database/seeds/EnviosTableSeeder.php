<?php

use Illuminate\Database\Seeder;

class EnviosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('envios')->insert(array (
	  		0 =>
	  		array (
				'id'          => 1,
				'tipo'        => 'temporal',
				'comentarios' => null,
				'monto'       => null,
	  		),
	  	));
    }
}


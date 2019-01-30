<?php

use Illuminate\Database\Seeder;

class PresentacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('presentacions')->insert(array (
	  		0 =>
	  		array (
					'id'          => 1,
					'cantidad'    => '4',
					'precio'      => '10',
					'producto_id' => 1,
					'unidad_id'   => 1,
	  		),
	  		1 =>
	  		array (
					'id'          => 2,
					'cantidad'    => '6',
					'precio'   => '15',
					'producto_id' => 1,
					'unidad_id'   => 1,
	  		),
	  		2 =>
			array (
					'id'          => 3,
					'cantidad'    => '15',
					'precio'   => '35',
					'producto_id' => 1,
					'unidad_id'   => 1,
	  		),
	  		3 =>
	  		array (
					'id'          => 4,
					'cantidad'    => '35',
					'precio'      => '50',
					'producto_id' => 1,
					'unidad_id'   => 1,
	  		),
	  	));
    }
}

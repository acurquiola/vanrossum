<?php

use Illuminate\Database\Seeder;

class DescuentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('descuentos')->insert(array (
	  		0 =>
	  		array (
					'id'          => 1,
					'desde_id'    => 1,
					'hasta_id'    => 2,
					'producto_id' => 1,
					'descuento'   => '10',
	  		),
	  		1 =>
	  		array (
					'id'          => 2,
					'desde_id'    => 2,
					'hasta_id'    => 3,
					'producto_id' => 1,
					'descuento'   => '15',
	  		),
	  		2 =>
			array (
					'id'          => 3,
					'desde_id'    => 3,
					'hasta_id'    => 4,
					'producto_id' => 1,
					'descuento'   => '30',
	  		),
	  	));
    }
}

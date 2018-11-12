<?php

use Illuminate\Database\Seeder;

class UnidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('unidads')->insert(array (
			0 => 
			array (
				'id'          => 1,
				'nombre'      => 'Kilogramo',
				'abreviacion' => 'Kg',
			),
			1 => 
			array (
				'id'          => 2,
				'nombre'      => 'Litro',
				'abreviacion' => 'L',
			),
			2 => 
			array (
				'id'          => 3,
				'nombre'      => 'Centímetro Cúbico',
				'abreviacion' => 'cm3',
			),
		));  
    }
}

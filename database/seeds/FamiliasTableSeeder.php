<?php

use Illuminate\Database\Seeder;

class FamiliasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('familias')->insert(array (
    		0 =>
    		array (
				'id'         => 1,
				'nombre'     => 'Ninguna',
				'file_image' => null,
				'orden'		 => 'aa',
				'familia_id' => 1,
				'nivel' 	 => '0',
    		),
    		1 =>
    		array (
				'id'         => 2,
				'nombre'     => 'Esencia',
				'file_image' => 'familias__familia2.jpg',
				'orden'		 => 'aa',
				'familia_id' => 1,
				'nivel' 	 => '1',
    		),
    		2 =>
    		array (
				'id'         => 3,
				'nombre'     => 'Aceites',
				'file_image' => 'familias__familia3.jpg',
				'orden'		 => 'bb',
				'familia_id' => 1,
				'nivel' 	 => '1',
    		),
    		3 =>
    		array (
				'id'         => 4,
				'nombre'     => 'Esencias',
				'file_image' => 'familias__familia4.jpg',
				'orden'		 => 'cc',
				'familia_id' => 1,
				'nivel' 	 => '1',
    		),
    		4 =>
    		array (
				'id'         => 5,
				'nombre'     => 'Jabón',
				'file_image' => 'familias__familia5.jpg',
				'orden'		 => 'dd',
				'familia_id' => 1,
				'nivel' 	 => '1',
    		),
    		5 =>
    		array (
				'id'         => 6,
				'nombre'     => 'Productos Químicos',
				'file_image' => 'familias__familia6.jpg',
				'orden'		 => 'ee',
				'familia_id' => 1,
				'nivel' 	 => '1',
    		),
    		6 =>
    		array (
				'id'         => 7,
				'nombre'     => 'Insumos',
				'file_image' => 'familias__familia7.jpg',
				'orden'		 => 'ff',
				'familia_id' => 1,
				'nivel' 	 => '1',
    		),
    	));
    }
}

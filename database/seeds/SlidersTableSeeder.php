<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('sliders')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'file_image' => 'sliders__slider1.jpg',
				'seccion'    => 'home',
				'titulo'     => 'ALTA TECNOLOGÍA Y CALIDAD',
				'descripcion'=> 'Venta mayorista y minorista de insumos químicos',
				'orden'      => 'aa',
			),
			1 => 
			array (
				'id'         => 2,
				'file_image' => 'sliders__slider2.jpg',
				'seccion'    => 'empresa',
				'titulo'     => '',
				'descripcion'=> '' ,
				'orden'      => 'aa',
			),
		));    
    }
}

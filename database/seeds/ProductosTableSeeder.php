<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('productos')->insert(array (
    		0 =>
    		array (
    			'id'         =>  1,
    			'nombre' 	 => 'Aceite de Coco',
    			'codigo' 	 => 'PQ1501',
    			'descripcion'=> 'El aceite de coco es conocido por sus propiedades protectoras, hidratantes y purificantes. 
								 Puedes añadirlo en la formulación de cremas que nutran la piel. El aceite de coco para el pelo es uno de los productos más usados como aditivo para hacer champús, mascarillas o sérum.',
    			'file_image' => 'productos__producto1.jpg',
    			'familia_id' =>  2,
                'orden'      => 'aa',
    		),
    		1 =>
    		array (
    			'id'         =>  2,
    			'nombre' 	 => 'Aceite de Almendras Puro',
    			'codigo' 	 => 'PQ1502',
    			'descripcion'=> 'El aceite de coco es conocido por sus propiedades protectoras, hidratantes y purificantes. 
								 Puedes añadirlo en la formulación de cremas que nutran la piel. El aceite de coco para el pelo es uno de los productos más usados como aditivo para hacer champús, mascarillas o sérum.',
    			'file_image' => 'productos__producto2.jpg',
    			'familia_id' =>  2,
                'orden'      => 'bb',
    		),
    		2 =>
    		array (
    			'id'         =>  3,
    			'nombre' 	 => 'Aceite de Aloe Vera',
    			'codigo' 	 => 'PQ1503',
    			'descripcion'=> 'El aceite de coco es conocido por sus propiedades protectoras, hidratantes y purificantes. 
								 Puedes añadirlo en la formulación de cremas que nutran la piel. El aceite de coco para el pelo es uno de los productos más usados como aditivo para hacer champús, mascarillas o sérum.',
    			'file_image' => 'productos__producto3.jpg',
    			'familia_id' =>  2,
                'orden'      => 'cc',
    		),
    	));
    }
}

<?php

use Illuminate\Database\Seeder;

class NovedadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('novedads')->insert(array (
			0 => 
			array (
				'id'           => 1,
				'titulo'       => 'Nuevos presentaciones de Aceite de Coco',
				'texto'        => 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. 
							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit',
				'file_image'   => 'novedades__novedad1.jpg',
				'orden'        => 'aa',
				'clasificacion_id' => 1
			),
			1 => 
			array (
				'id'           => 2,
				'titulo'       => 'Nuevos presentaciones de Aceite de Coco',
				'texto'        => 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. 
							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit',
				'file_image'   => 'novedades__novedad1.jpg',
				'orden'        => 'bb',
				'clasificacion_id' => 2
			),
			2 => 
			array (
				'id'           => 3,
				'titulo'       => 'Nuevos presentaciones de Aceite de Coco',
				'texto'        => 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. 
							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit',
				'file_image'   => 'novedades__novedad1.jpg',
				'orden'        => 'cc',
				'clasificacion_id' => 2
			),
		));
    }
}

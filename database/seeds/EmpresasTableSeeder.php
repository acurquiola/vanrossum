<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('empresas')->insert(array (
			0 => 
			array (
				'id'          => 1,
				'file_image'  => 'empresa__empresa.jpg',
				'mision'	  => 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. 
							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit',
				'vision'  	  => 'Expandir el liderazgo en la comercialización de productos del sector a nivel Nacional y con participación en mercados internacionales.',
				'valores' 	  => 'Contamos con un equipo humano comprometido con el mejoramiento continuo, trabajando en un ambiente organizacional positivo y proactivo, de alto rendimiento.',
			),
		));  
    }
}

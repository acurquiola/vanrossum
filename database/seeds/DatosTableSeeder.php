<?php

use Illuminate\Database\Seeder;

class DatosTableSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			\DB::table('datos')->insert(array (
				0 =>
				array (
					'id'          => 1,
					'tipo'        => 'direccion',
					'descripcion' => 'Av. Elcano 3979, Ciudad de Buenos Aires, Argentina',
					'status'      => 1,
				),
				1 =>
				array (
					'id'          => 2,
					'tipo'        => 'telefono',
					'descripcion' => '011-4554-5787',
					'status'      => 1,
				),
				2 =>
				array (
					'id'          => 3,
					'tipo'        => 'email',
					'descripcion' => 'info@distvr.com.ar',
					'status'      => 1,
				),
				3 =>
				array (
					'id'          => 4,
					'tipo'        => 'facebook',
					'descripcion' => 'https://es-la.facebook.com/pages/category/Shopping---Retail/Distribuidora-Van-Rossum-207160942655875/',
					'status'      => 1,
				),
				4 =>
				array (
					'id'          => 5,
					'tipo'        => 'instagram',
					'descripcion' => 'www.instagram.com',
					'status'      => 1,
				),
				5 =>
				array (
					'id'          => 6,
					'tipo'        => 'mapa',
					'descripcion' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13139.400716057837!2d-58.4607169!3d-34.5826573!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xde541d8bf5fb116f!2sDistribuidora+Van+Rossum+S.R.L.!5e0!3m2!1ses!2sar!4v1541433383144" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
					'status'      => 1,
				),
			));
		}
}

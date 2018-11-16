<?php

use Illuminate\Database\Seeder;

class ArchivosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('archivos')->insert(array (
	  		0 =>
	  		array (
					'id'     => 1,
					'nombre' => 'Códigos Postales',
					'file'   => 'codigo_postal1.xlsx',
	  		),
	  	));
    }
}

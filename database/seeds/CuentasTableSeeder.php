<?php

use Illuminate\Database\Seeder;

class CuentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('cuentas')->insert(array (
	  		0 =>
	  		array (
				'id'          => 1,
				'descripcion' => '0001-2225-669869865 Cuenta',
	  		),
	  	));
    }
}

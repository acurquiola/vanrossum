<?php

use Illuminate\Database\Seeder;

class InformacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	\DB::table('informacions')->insert(array (
	  		0 =>
	  		array (
					'id'         => 1,
					'file_image' => 'home__informacions1.png',
					'nombre'     => 'Esencia',
					'orden'      => 'aa'
	  		),
	  		1 =>
	  		array (
					'id'         => 2,
					'file_image' => 'home__informacions2.png',
					'nombre'     => 'Aceites',
					'orden'      => 'bb'
	  		),
	  		2 =>
	  		array (
					'id'         => 3,
					'file_image' => 'home__informacions3.png',
					'nombre'     => 'Jabones',
					'orden'      => 'cc'
	  		),
	  		3 =>
	  		array (
					'id'         => 4,
					'file_image' => 'home__informacions4.png',
					'nombre'     => 'Productos Químicos',
					'orden'      => 'dd'
	  		),
	  	));
    }
}

<?php

use Illuminate\Database\Seeder;

class PreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('preguntas')->insert(array (
	  		0 =>
	  		array (
					'id'           => 1,
					'pregunta'     => '¿Ea magna ex anim adipisicing?',
					'respuesta'    => 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.',
					'categoria_id' => 1,
					'orden'        => 'aa',
	  		),
	  		1 =>
	  		array (
					'id'           => 2,
					'pregunta'     => '¿Ea magna ex anim adipisicing?',
					'respuesta'    => 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.',
					'categoria_id' => 2,
					'orden'        => 'bb',
	  		),
	  		2 =>
			array (
					'id'           => 3,
					'pregunta'     => '¿Ea magna ex anim adipisicing?',
					'respuesta'    => 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.',
					'categoria_id' => 1,
					'orden'        => 'cc',
	  		),
	  		3 =>
	  		array (
					'id'           => 4,
					'pregunta'     => '¿Ea magna ex anim adipisicing?',
					'respuesta'    => 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.',
					'categoria_id' => 3,
					'orden'        => 'dd',
	  		),
	  	));
    }
}

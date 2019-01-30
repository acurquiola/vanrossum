<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('users')->insert(array (
  			0 =>
  			array (
          'id'       => 1,
          'name'     => 'Osole',
          'email'    => 'soporte@osole.es',
          'password' => bcrypt('osole'),
  			),
  		));
    }
}

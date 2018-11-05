<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DatosTableSeeder::class);
        $this->call(LogosTableSeeder::class);
        $this->call(MetadatosTableSeeder::class);
    }
}

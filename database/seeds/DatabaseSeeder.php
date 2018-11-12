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
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DatosTableSeeder::class);
        $this->call(LogosTableSeeder::class);
        $this->call(MetadatosTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(FamiliasTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(UnidadsTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
    }
}

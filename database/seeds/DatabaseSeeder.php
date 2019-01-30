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
        $this->call(PresentacionsTableSeeder::class);
        $this->call(DescuentosTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(PreguntasTableSeeder::class);
        $this->call(InformacionsTableSeeder::class);
        $this->call(TextosTableSeeder::class);
        $this->call(ClasificacionsTableSeeder::class);
        $this->call(NovedadesTableSeeder::class);
        $this->call(ArchivosTableSeeder::class);
        $this->call(EnviosTableSeeder::class);
        $this->call(CuentasTableSeeder::class);
    }
}

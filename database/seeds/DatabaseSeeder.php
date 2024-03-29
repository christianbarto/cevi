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
        $this->call(userdefault::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}

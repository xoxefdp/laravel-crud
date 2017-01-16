<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $personas = factory(App\Persona::class, 10)->make(); // instancia
        $personas = factory(App\Persona::class, 30)->create(); // persiste
    }
}

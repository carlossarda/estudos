<?php

use Illuminate\Database\Seeder;
use estoque\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaTableSeeder::class);
    }
}

class CategoriaTableSeeder extends Seeder
{
    public function run()
    {
        Categoria::create(['nome' => 'Brinquedo']);
        Categoria::create(['nome' => 'Esportes']);
        Categoria::create(['nome' => 'Livros']);
        Categoria::create(['nome' => 'Eletrodoméstico']);
    }
}
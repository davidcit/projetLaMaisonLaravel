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
        $this->call(UserTableSeeder::class);
        $this->call(CategorieTableSeeder::class);//creation des categorie avant les produits
        $this->call(ProductTableSeeder::class);//Permet de creer les produits
    }
}

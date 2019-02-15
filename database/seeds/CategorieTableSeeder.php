<?php

use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // création des categorie homme,femme 
        App\Categorie::create([
            'title' => 'Homme'
        ]);
        App\Categorie::create([
            'title' => 'Femme'
        ]);
        
    }
}

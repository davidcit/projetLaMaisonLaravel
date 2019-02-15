<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('local')->delete(Storage::allFiles());

        factory(App\Product::class, 20)->create()->each(function($product){

        $categorie = App\Categorie::find(rand(1,2));

        $product->categorie()->associate($categorie);
        $product->save();

                    // ajout des images
            $link = str_random(12) . '.jpg'; // hash de lien pour la sécurité 
            $file = file_get_contents('https://placeimg.com/300/300/people');
            Storage::disk('local')->put($link, $file);

            $product->update([
                'url_image' => $link,
            ]);
        });
    }
}

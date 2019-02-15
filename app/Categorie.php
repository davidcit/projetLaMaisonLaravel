<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function Product(){
        return $this->hasMany(Product::class);//une categorie peut avoir plusieurs produits
    }
}

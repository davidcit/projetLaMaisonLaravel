<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= [
        'title','description','price','size','url_image','status','code','reference','categorie_id'
    ];


    public function scopePublished($query){
        return $query->where('status','publier');//permet de faire un scope sur les produit uniquement publier
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);// un produit appartient a une categorie
    }
}

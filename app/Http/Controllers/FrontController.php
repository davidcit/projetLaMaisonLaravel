<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Product; //importe l'alias de la Class product
use App\Categorie;//importe l'alias de la class Categorie

class FrontController extends Controller
{
    protected $paginate = 6;//pagination 6 produit par page



    //méthode pour injecter des données a une vue partielle
    public function __construct(){
            
            view()->composer('partials.menu',function($view){
           
            $categorie=Categorie::pluck('title','id')->all();
           
            $view->with('categories',$categorie);
        });
    }

    public function index(){
    
        $count = Product::published()->count();
        $products=Product::published()->paginate($this->paginate);
        
        return view('front.index',['products'=>$products, 'count'=>$count]);
    }

    
    public function show(int $id){
        
        $product=Product::find($id);

        return view('front.show',['product'=>$product]);
    } 
    //permet d'afficher la page du produit en detail

    
    public function productByCategorie(int $id){
        view()->composer('partials.menu', function($view) use ($id) {
        $view->with('categorie_id', $id);
    });
    
    $count = Product::where('code', 'solde')->published()->count();
    $products = Product::where('categorie_id', $id)->published()->paginate($this->paginate);
    return view('front.index', ['products'=>$products, 'count'=>$count]);
    
    }
    //Permet d'afficher les produits uniquement par categorie homme ou femme sur l'index
    
    public function showByCode(){
        if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }
        $count = Product::where('code', 'solde')->published()->count();
        $products = Product::where('code', 'solde')->published()->paginate(6);

        return view('front.index', ['products' => $products, 'count' => $count]);
    }
    //Permet d'afficher^les produits uniquement en solde sur l'index
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Product; //importe l'alias de la Class product
use App\Categorie;//importe l'alias de la class Categorie

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(10);
        
        return view('back.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::pluck('title','id')->all();
        $categories=Categorie::pluck('title','id')->all();

        return view('back.product.create',['products'=>$products, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'categorie_id'=>'required|integer',
            'status'=>'in:publier,brouillon',
            'code'=>'required',
            'reference'=>'required',
        ]);
        $product=Product::create($request->all());
        
        $im=$request->file('url_image');
        if(!empty($im)){
            $link=$request->file('url_image')->store('');

            $product->update([
                'url_image'=>$link,
            ]);
        }
        return redirect()->route('product.index')->with('message','Votre produit est ajouté');
    }//permet de stocker les données dans la BDD

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Categorie::pluck('title', 'id')->all();
        return view('back.product.edit',['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'categorie_id'=>'required|integer',
            'status'=>'in:publier,brouillon',
            'code'=>'required',
            'reference'=>'required',
        ]);
        
        $product = Product::find($id);
        $product->update($request->all());
        $im=$request->file('url_image');

        if(!empty($im)){
            $link=$request->file('url_image')->store('');

            $product->update([
                'url_image'=>$link,
            ]);
        }

    return redirect()->route('product.index')->with('message', 'Votre Produit édité');
    }//permet de stocker les données dans la BDD

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Suppression');
    }//permet de supprimer un produits Dans la BDD (message d'alerte par precaution en js)
}

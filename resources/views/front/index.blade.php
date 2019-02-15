@extends('layouts.master')

@section('content')

<div class="container">
<h2 id="test">Les Vetements  </h2>
{{$products->links()}}
<p>Produit Disponible: {{$count}}</p>

<div class="row">
    @foreach($products as $product)
    
        <div class="col-lg-4">    
                <a href="{{url('product',$product->id)}}"  >
                    <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" width="300px" height="300px" class="thumbnail rounded">
                </a>
            <h3><a href="{{url('product',$product->id)}}">{{ucfirst($product->title)}}</a></h3>
            <p>{{$product->price}}€</p>    
        </div>
    @endforeach
</div>


@endsection 

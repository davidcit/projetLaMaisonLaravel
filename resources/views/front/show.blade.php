@extends('layouts.master')

@section('content')
<div class="container">
<p>Boutique > {{$product->code}} > {{$product->title}} > {{$product->categorie->title}} </p>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <a href="#">
                <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}"class="imgModSmall rounded">
            </a>
            <a href="#"  >
                <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="imgModSmall rounded">
            </a>
            <a href="#"  >
                <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="imgModSmall rounded">
            </a>
        </div>

        <div class="col-lg-6">
                <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="imgModLarge rounded">
        </div>

        <div class="col-lg-2">
            <h3>{{ucfirst($product->title)}}</h3>
            <p>Ref: {{$product->reference}}</p>
            <p>{{$product->price}}€</p>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Taille</label>
                <select class="form-control" id="exampleFormControlSelect1">
                <option>{{$product->size}}</option>
                </select>
            </div>

        </div>
        
    </div>

    <div class="row">
        <div class="col-lg-10">
            <h3>Description</h3>
            <p>{{$product->description}}</p>
        </div>
    </div>

</div>

@endsection 


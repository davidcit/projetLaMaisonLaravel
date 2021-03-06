@extends('layouts.master')

@section('content')

<br>
<br>
<br>
<br>
<div class="container">
    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field() }}
    {{method_field('PUT')}}
    <div class="row">
        <div class="col">
            <label for="title">Titre:</label>
            <input type="text" name="title"  value="{{$product->title}}" id="title" class="form-control" placeholder="Titre du Produit">
            @if($errors->has('title'))<span class="error bg-warning">{{$errors->first('title')}}</span>@endif
        </div>

        <div class="col">
            <div class="form-group">
                <label class="col-md-4 control-label" for="status">Statut:</label>
                    <div class="col-md-4">
                    <div class="radio">
                        <label for="status">
                        <input type="radio" @if(old('status')=='publier') checked @endif name="status" value="publier" checked> Publier
                        </label>
                    </div>

                    <div class="radio">
                        <label for="radios-1">
                        <input type="radio" @if(old('status')=='brouillon') checked @endif name="status" value="brouillon" > Brouillon
                        </label>
                    </div>
                </div>
            </div>                                                        
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="description">Description :</label>
            <textarea rows="6"type="text"name="description"class="form-control">{{$product->description}}</textarea>
            @if($errors->has('description')) <span class="error bg-warning">{{$errors->first('description')}}</span> @endif
        </div>
        <div class="col-md-6">
            <label for="code">Code du Produit:</label>
                <select id="code" name="code" class="form-control" >
                    <option  @if($product->code == 'new') selected @endif>New</option>
                
                    <option @if($product->code == 'solde') selected @endif>Solde</option>

                </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
        <label for="price">Prix:</label>
        <input type="text" class="form-control" name="price"placeholder="Prix du produit " value="{{$product->price}}">
        @if($errors->has('price')) <span class="error bg-warning">{{$errors->first('price')}}</span> @endif
        </div>

        <div class="col">
        <label for="reference">Reference du Produit:</label>
        <input type="text" name="reference" value="{{$product->reference}}"class="form-control" placeholder="Reference(isbn)">
        @if($errors->has('reference')) <span class="error bg-warning">{{$errors->first('reference')}}</span> @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <label for="categorie">Categorie:</label>
            <select class="form-control" id="categorie" name="categorie_id">
                
                @foreach($categories as $id => $title)
                <option value="{{$id}}">{{$title}}</option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
        <label for="size">Taille:</label>
        <select class="form-control" id="categorie" name="categorie_id">    
            <option value="{{$id}}">46</option>
            <option value="{{$id}}">48</option>
            <option value="{{$id}}">50</option>
            <option value="{{$id}}">52</option>
        </select>
        @if($errors->has('taille')) <span class="error bg-warning">{{$errors->first('taille')}}</span> @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">        
                <label for="url_image">Ajouter une Image:</label>
                <input type="file" class="form-control-file" name="url_image">
                @if($errors->has('url_image')) <span class="error bg-warning">{{$errors->first('url_image')}}</span> @endif
            </div>
            <div>
        <button type="submit" class="btn btn-primary">Ajouter un produit</button>
    </div>
        </div>
        <div class="form-group">
            <h5>L'image Produit: </h5>
            <img width="300" src="{{url('images', $product->url_image)}}" alt="">
        </div>
    </div>
         
    
    
    </form>

</div>    
@endsection
@extends('layouts.master')

@section('content')

<div >  
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nom</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Prix</th>
            <th scope="col">Statut</th>
            <th scope="col">Mettre à Jour</th>
            <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
        <div class="mb alert bg-dark text-light">
        @include('back.product.partials.flash')
        <p>{{$products->links()}}</p>
        </div>
            @foreach($products as $product)
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->categorie->title}}</td>
                <td>{{$product->price}}</td>
                <td >
                    @if($product->status == 'publier')
                    <p class="green">Publier</p>
                    @else 
                    <p class="yellow">Brouillon</p>
                    @endif
                </td>
                <td>   
                    <a href="{{route('product.edit', $product->id)}}">
                        <button type="button" class="btn btn-info">Mettre a jour</button>
                    </a>
                </td>
                <td>
                    <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="Supprimer" >
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{$products->links()}}
    
</div>

@endsection 
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection
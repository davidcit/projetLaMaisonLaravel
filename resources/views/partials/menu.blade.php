<div class id="mgb">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-light bg-dark">
                <a href="{{url('/')}}">
                    <h1 class="navbar-text text-light">

                    Boutique La Maison
                    </h1>
                </a>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="nav-link  active" href="{{url('/')}}">Accueil</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto text-light">

                <!-- si on ce trouve ur le dashboard les lien soldes/homme/femme n'apparaitront plus  -->
                @if(Route::is('product.*') == false)
                <li class="nav-item"><a class="nav-link active" href="{{url('soldes')}}">Solde</a> </li>
                @forelse($categories as $id => $title)
                <li class="nav-item"><a class="nav-link  active" href="{{url('categorie', $id)}}">{{$title}}</a></span>
                    @empty
                <li>Aucune Catégorie pour l'instant</li>
                @endforelse
                @endif

                <!-- permet d'afficher le lien ajouter uniquement sur le dashboard -->
                @if(Route::is('product.*') == true)
                <li class="nav-item"><a  href="{{route('product.create')}}" role="button">Ajouter un Produit</a></li>  
                @endif
                </ul>

                <span class="navbar-text">
                @if(Auth::check())
                <a href="{{route('product.index')}}">Dashboard</a>
                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout        
                </a>
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        {{ csrf_field() }}
                    </form>
                
                @else
                <a class="nav-link" href="{{route('login')}}">Login</a>
                @endif
                </span>
            </div>
        </div>
        </nav>
    </div>
</div>

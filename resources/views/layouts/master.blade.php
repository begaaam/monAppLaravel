<!doctype html>
<html lang="fr">
    <head>
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/gsb.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-theme.css') }}" rel="stylesheet">
        <!-- Scripts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">Gsb</a>
                    </div>
                      <div class="collapse navbar-collapse" id="navbar-collapse-target">
                      
                        <ul class="nav navbar-nav navbar-left">  
                              <li><a href="{{ url('/listerVisiteurs') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
                            <li><a href="{{ url('/listerNom') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Visiteur par Nom</a></li>
                            <li><a href="{{ url('/listerScteur') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Visiteur par Secteur</a></li>
                            <li><a href="{{ url('/listerLaboratoire') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Visiteur par Laborateur</a></li>
                            @auth
                               @if($user->role=='Administrateur')
                              <li><a href="{{ url('/ajouterVisiteur') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter</a></li>                                 
                               @endif
                            @endauth
                        </ul> 
                        <ul class="nav navbar-nav navbar-right"> 
                            @auth
                            <li>
                                <form id="logout-form"  method="POST" action="{{ route('logout') }}"> 
                                    @csrf
                                    <button type="submit" class="btn">Déconnexion</button>
                                     
                                </form>
                           </li> 
                            @endauth
                            @guest                      
                            <li>
                                <a  data-toggle="collapse" data-target=".navbar-collapse.in" href="{{ route('login')}}">
                                   me connecter
                                </a>
                            </li>  
                            @endguest                     
                        </ul>        
                    </div>
                </div><!--/.container-fluid -->
            </nav>
        </div> 
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('assets/js/jquery-2.1.3.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/bootstrap.js') }}" defer></script>      
    </body>
</html>

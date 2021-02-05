<nav class="navbar navbar-expand-md navbar-dark bg-nav shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fab fa-accessible-icon"></i> PRESTO
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{(Route::currentRouteName()=='home') ? 'active' : ' '}} " href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Route::currentRouteName()=='announcement.create') ? 'active' : ' '}} " href="{{ route('announcement.create') }}">Inserisci annuncio</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="categoryDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Categorie</a>
                
                <div class="dropdown-menu dropdown-menu-right bg-nav" for="categoryDropdown">
                    @foreach ($categories as $category)
                    <a class="nav-link" href="{{route('announcement.category', $category)}}">
                     {{$category->name}}
                    </a>   
                    @endforeach
                   
                    

                </div>
              </li>
                <li> 
                    <form action="{{route('announcement.search')}}" method="GET"> 
                    @csrf
                        <input type="text" placeholder="Effettua una ricerca" name="q"> 

                                <button class="btn btn-secondary" type="submit">Cerca</button>
                                
                    </form>
                 </li>
            </ul>


            <ul class="navbar-nav ml-auto">
            @if (Auth::user() && Auth::user()->is_revisor)
            <li class="nav-item">
                <a class="nav-link {{(Route::currentRouteName()=='revisor.index') ? 'active' : ' '}} " href="{{ route('revisor.index') }}">Revisor Home <span class="badge-pill badge-warning"
                    >{{\App\Models\Announcement::toBeRevisioned()}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(Route::currentRouteName()=='revisor.trash') ? 'active' : ' '}} " href="{{ route('revisor.trash') }}">Cestino</a>
            </li>
            @endif
         
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{(Route::currentRouteName()=='login') ? 'active' : ' '}} " href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{(Route::currentRouteName()=='register') ? 'active' : ' '}} " href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-nav" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
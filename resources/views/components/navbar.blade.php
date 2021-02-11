<nav class="navbar navbar-expand-md navbar-dark bg-nav shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fab fa-accessible-icon"></i> PRESTO
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link {{(Route::currentRouteName()=='home') ? 'active' : ' '}} " href="{{ route('home') }}">Home</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{(Route::currentRouteName()=='announcement.create') ? 'active-navbar' : ' '}} " href="{{ route('announcement.create') }}">{{__('ui.ads')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="categoryDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{__('ui.categories')}}</a>
                
                <div class="dropdown-menu dropdown-menu-right bg-nav" for="categoryDropdown">
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('announcement.category', $category)}}">
                            {{$category->name}}
                        </a>   
                    </li>
                    @endforeach
                    </ul>
                   
                    

                </div>
              </li>
                <li> 
                    <form action="{{route('announcement.search')}}" method="GET"> 
                    @csrf
                        <input type="text" placeholder="{{__('ui.searchPlaceholder')}}" name="q"> 

                                <button class="btn btn-secondary" type="submit">{{__('ui.searchButton')}}</button>
                                
                    </form>
                 </li>
            </ul>


            <ul class="navbar-nav ml-auto">
            
         
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{(Route::currentRouteName()=='login') ? 'active-navbar' : ' '}} " href="{{ route('login') }}">{{__('ui.login')}}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{(Route::currentRouteName()=='register') ? 'active-navbar' : ' '}} " href="{{ route('register') }}">{{__('ui.register')}}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} 
                            @if (Auth::user() && Auth::user()->is_revisor)
                                <span class="badge-pill bg-green">{{\App\Models\Announcement::toBeRevisioned()}}</span>
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-nav" aria-labelledby="navbarDropdown">
                            <ul class="list-unstyled">
                                @if (Auth::user() && Auth::user()->is_revisor)
                                    <li class="nav-item">
                                        <a class="nav-link {{(Route::currentRouteName()=='revisor.index') ? 'active-navbar' : ' '}} " href="{{ route('revisor.index') }}">Revisor Home </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{(Route::currentRouteName()=='revisor.trash') ? 'active-navbar' : ' '}} " href="{{ route('revisor.trash') }}">Trash</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                                </li>
                            </ul>
                            

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
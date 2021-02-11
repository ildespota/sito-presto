<nav class="navbar navbar-expand-md  bg-nav shadow-sm ">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            <i class="fab fa-accessible-icon text-white"></i> PRESTO
            {{-- <img src="/img/logo.png" class="img-fluid" alt="" id="logo"> --}}
        </a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fas fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link text-white-nav {{(Route::currentRouteName()=='home') ? 'active' : ' '}} " href="{{ route('home') }}">Home</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-white-nav {{(Route::currentRouteName()=='announcement.create') ? 'active-navbar' : ' '}} " href="{{ route('announcement.create') }}">{{__('ui.ads')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="categoryDropdown" class="nav-link text-white-nav dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{__('ui.categories')}}</a>
                
                <div class="dropdown-menu dropdown-menu-right bg-nav" for="categoryDropdown">
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                    <li class="nav-item pl-1">
                        <a class="nav-link text-white-nav" href="{{route('announcement.category', $category)}}">
                            {{$category->name}}
                        </a>   
                    </li>
                    @endforeach
                    </ul>
                   
                    

                </div>
              </li>
                <li class="d-none d-md-flex "> 
                    <form action="{{route('announcement.search')}}" method="GET" class="d-flex align-items-center"> 
                    @csrf
                    <div class="d-flex align-items-center justify-content-center">

                        <button  class="bg-transparent border-0 " type="submit"></button>
                        <a href="#" id="search-btn"><i  class="fas fa-search text-white "></i></a>
                        <input type="text" class="bg-transparent border-0 text-white border-search d-none mx-3" id="input-search"
                        placeholder="{{__('ui.searchPlaceholder')}}" name="q"> 
                    </div>
                                
                    </form>
                 </li>
            </ul>


            <ul class="navbar-nav ml-auto">
            
         
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white-nav {{(Route::currentRouteName()=='login') ? 'active-navbar' : ' '}} " href="{{ route('login') }}">{{__('ui.login')}}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white-nav {{(Route::currentRouteName()=='register') ? 'active-navbar' : ' '}} " href="{{ route('register') }}">{{__('ui.register')}}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-white-nav dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} 
                            @if ((Auth::user() && Auth::user()->is_revisor) || (Auth::user() && Auth::user()->is_admin))
                                <span class="badge-pill bg-green">{{\App\Models\Announcement::toBeRevisioned()}}</span>
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-nav" aria-labelledby="navbarDropdown">
                            <ul class="list-unstyled">
                                @if(Auth::user() && Auth::user()->is_admin)
                                    <li class="nav-item pl-2 d-none d-lg-block">
                                        <a class="nav-link text-white-nav" data-toggle="modal" data-target="#permissionModal">
                                            Gestisci permessi
                                        </a>
                                    </li> 
                                    <li class="nav-item pl-2 d-block d-lg-none">
                                        <a href="{{route('admin.permissions')}}" class="nav-link text-white-nav">
                                            Gestisci permessi
                                        </a>
                                    </li> 
                                @endif
                                @if ((Auth::user() && Auth::user()->is_revisor) || (Auth::user() && Auth::user()->is_admin))
                                    <li class="nav-item pl-2">
                                        <a class="nav-link text-white-nav {{(Route::currentRouteName()=='revisor.index') ? 'active-navbar' : ' '}} " href="{{ route('revisor.index') }}">Revisor Home 
                                            <span class="badge-pill bg-green">{{\App\Models\Announcement::toBeRevisioned()}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item pl-2">
                                        <a class="nav-link text-white-nav {{(Route::currentRouteName()=='revisor.trash') ? 'active-navbar' : ' '}} " href="{{ route('revisor.trash') }}">Trash</a>
                                    </li>
                                @endif
                                <li class="nav-item pl-2">
                                    <a class="nav-link text-white-nav" href="{{ route('logout') }}"
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
<div class="container-fluid d-block d-md-none bg-violet py-3">
    <div class="row ">
        <div class="col-12 ">
            <form action="{{route('announcement.search')}}" method="GET"> 
                @csrf
                <div class="d-flex justify-content-center align-items-center">

                    <button  class="bg-transparent border-0 " type="submit"></button>
                    <a href="#" ><i  class="fas fa-search text-white "></i></a>
                    <input type="text" id="search-mobile" class="bg-transparent border-0 text-white border-search mx-4" 
                    placeholder="{{__('ui.searchPlaceholder')}}" name="q"> 
                </div>
                            
            </form>
        </div>
    </div>
</div>

{{-- Modale --}}
<div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Gestione permessi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>Nome</th>
                        <th>Revisore</th>
                        <th>Rendi Revisore</th>
                        <th>Cancella Revisore</th>
                        <th>Admin</th>
                        <th>Rendi admin</th>
                        <th>Cancella admin</th>
                    </tr>
                    @foreach ($users as $user)
                      <tr>
                          <td>{{$user->name}}</td>
                          <td class="@if($user->is_revisor) bg-success @else bg-danger @endif"></td>
                          <td>
                              <form action="{{route('make.revisor', $user->id)}}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-success">Rendi revisore</button>
                              </form>
                          </td>
                          <td>
                              <form action="{{route('cancel.revisor', $user->id)}}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-danger">Cancella revisore</button>
                              </form>
                          </td>
                          <td class="@if($user->is_admin) bg-success @else bg-danger @endif"></td>
                          <td>
                              <form action="{{route('make.admin', $user->id)}}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-success">Rendi amministratore</button>
                              </form>
                          </td>
                          <td>
                              <form action="{{route('cancel.admin', $user->id)}}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-danger">Cancella amministratore</button>
                              </form>
                          </td>
                      </tr>
                    @endforeach
                </table>
              </div>
          </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
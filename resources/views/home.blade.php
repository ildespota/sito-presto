<x-layout
    title="Homepage"
>


      {{-- @if (Session::has('status'))
          <div class="alert alert-success">
              <ul>
                  <li>{{Session::get('status')}}</li>
              </ul>
          </div>
      @endif --}}
      {{-- @if (Session::has('access.denied.revisor.only'))
          <div class="alert alert-danger">
              <ul>
                  <li>{{Session::get('access.denied.revisor.only')}}</li>
              </ul>
          </div>
      @endif --}}

  {{-- Header per sito desktop --}}

  <div class="container-fluid ">
    <div class="row">
        <div class="col-12 p-0">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  @for ($i = 0; $i < count($categories); $i++)
                    <div class="carousel-item @if ($i == 0) active @endif masthead"  style="background-image: url({{Storage::url($categories[$i]->img)}});">
                       {{--  <h1 class="bg-dark text-light pl-3">{{$categories[$i]->name}}</h1> --}}
                        {{-- <img src="{{Storage::url($categories[$i]->img)}}" alt="" class="img-fluid"> --}}
                       {{--  <p class="bg-dark text-light pl-3">{{$categories[$i]->description}}</p>
                        <a class="btn btn-dark pl-3" href="{{route('category', $categories[$i])}}">Scopri tutti gli annunci di questa categoria</a> --}}
                        <div class="row h-100 w-100 align-items-md-center m-0 ">
                        <div class="col-12 col-md-4 box ml-0 ml-md-5 ">
                          <h1 class="category_title">{{$categories[$i]->name}}</h1>
                          <p class="lead">{{$categories[$i]->description}}</p>
                          <a href="{{route('announcement.create')}}"class="btn btn-custom">Inserisci il tuo annuncio</a>
                        </div>
                      </div>
                    </div>
                  @endfor
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
               
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                 
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
</div>

  {{-- Header per mobile --}}

 {{--  <header class="d-block d-md-none masthead-mobile" style="background-image: url('/img/game.jpg')">
    <div class="container-fluid h-100">
      <div class="row align-items-end h-100">
        <div class="col-12 col-md-6 box">
          <h1 class="category_title text-center">Categoria</h1>
          <p class="lead text-center">A great starter layout for a landing page</p>
        </div>
      </div>
    </div>
  </header>

  <div class="container-fluid my-5">
    <div class="row justify-content-around mx-2 "> --}}
    
      

        @foreach ($announcements as $announcement)
      {{-- {{dd($announcement->announcementImages->first()['file'])}} --}}

        <x-card
        announcement="{{$announcement->id}}"
        title="{{$announcement->title}}"
        description="{{$announcement->description}}"
        createdAt="{{$announcement->created_at->format('d-m-Y')}}"
        name="{{$announcement->category->name}}"
        price="{{$announcement->price}}"
        category="{{$announcement->category->id}}"
        image="{{$announcement->getCover()}}"
        />
        
        @endforeach

      
    </div>
  </div>

</x-layout>
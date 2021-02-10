<x-layout
title="revisori"
>
@if($announcement)
{{-- {{dd($announcement->announcementImages)}} --}}
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
          <h1 class="mb-5">Titolo: {{$announcement->title}}</h1>

                  @if(count($announcement->announcementImages)>0)
                  <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        @for($i = 0; $i<count($announcement -> announcementImages); $i++)
                          <div class="carousel-item @if($i == 0) active @endif">
                              <div class="col-md-4">
                                  <div class="card card-body">
                                      <img class="img-fluid" src="{{$announcement->getCoverCarousel($i)}}">
                                  </div>
                                  <div class="card card-body">
                                  
                                        <p>Adult:{{$announcement->announcementImages[$i]->adult}}</p>
                                        <p>Spoof:{{$announcement->announcementImages[$i]->spoof}}</p>
                                        <p>Medical:{{$announcement->announcementImages[$i]->medical}}</p>
                                        <p>Violence:{{$announcement->announcementImages[$i]->violence}}</p>
                                        <p>Racy:{{$announcement->announcementImages[$i]->racy}}</p>
                                  </div>
                              </div>
                          </div>
                
                        @endfor
                    </div>
                    <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                  @endif
        </div>
      </div>
   {{--  <div class="row">
        <div class="col-12">      
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$announcement->title}}</h5>
                <p class="card-text">{{$announcement->description}}</p>
                <p class="card-text">{{$announcement->price}}</p>
                <p class="card-text">{{$announcement->created_at->format('d-m-Y')}}</p>
                <p class="card-text">{{$announcement->category->name}}</p>
                <p class="card-text">{{$announcement->user->name}}</p>
                <a href="{{route('home')}}" class="btn btn-primary">Torna indietro</a>
              </div>
            </div>
            
            
          </div>
        </div> --}}
        <div class="row mt-5">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <p class="card-text">Inserito il {{$announcement->created_at->format('d-m-Y')}}</p>
                <h6 class="lead">Prezzo: {{$announcement->price}} €</h6>
                <p class="card-text">Autore: {{$announcement->user->name}}</p>
                <p><span>Categoria: </span><a href= "{{route('announcement.category', $announcement->category)}}" class="card-text">{{$announcement->category->name}}</a></p>
               <div class="row">
                    <div class="col-12 col-md-6 my-3">
                        <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Accetta</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-6 ml-auto my-3">
                        <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Rifiuta</button>
                        </form>
                    </div>
               </div>
                
                
        
                
            </div>
            <div class="col-12 col-md-8">
              <p>{{$announcement->description}}</p>
            </div>
        </div>
    </div>
    @else

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Nessun annuncio da visualizzare</h1>
            </div>
        </div>
    </div>
    @endif


</x-layout>
<x-layout
title="revisori"
>
@if($announcement)
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
          <h1 class="mb-5">Titolo: {{$announcement->title}}</h1>
          <p class="mb-5 h1">Id: {{$announcement->id}}</p>

                  <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                      <div class="carousel-inner w-100" role="listbox">
                          <div class="carousel-item active">
                              <div class="col-md-4">
                                  <div class="card card-body">
                                      <img class="img-fluid" src="http://placehold.it/380?text=1">
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="col-md-4">
                                  <div class="card card-body">
                                      <img class="img-fluid" src="http://placehold.it/380?text=2">
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="col-md-4">
                                  <div class="card card-body">
                                      <img class="img-fluid" src="http://placehold.it/380?text=3">
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="col-md-4">
                                  <div class="card card-body">
                                      <img class="img-fluid" src="http://placehold.it/380?text=4">
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="col-md-4">
                                  <div class="card card-body">
                                      <img class="img-fluid" src="http://placehold.it/380?text=5">
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="col-md-4">
                                  <div class="card card-body">
                                      <img class="img-fluid" src="http://placehold.it/380?text=6">
                                  </div>
                              </div>
                          </div>
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
              <p>{{$announcement->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae repudiandae, soluta qui iste amet, possimus, assumenda natus cumque perferendis modi enim culpa blanditiis? Sunt numquam sapiente modi eveniet! Eos possimus nihil aut magnam nisi fuga obcaecati doloribus ad distinctio. Totam ad esse eveniet aliquid optio necessitatibus corporis repellat neque, mollitia vitae nesciunt rem eius vero est, consequatur consectetur quidem quod iste ex numquam molestias, commodi illo architecto. Nesciunt voluptate aut vero nostrum, minima illo ut quibusdam iure provident itaque dicta doloribus obcaecati placeat accusamus! Ipsam reprehenderit ipsa omnis quidem voluptas ullam, quaerat accusantium recusandae. Quo nostrum quis eligendi facere veritatis laudantium magni ab nemo ad sapiente dolorem optio soluta nam omnis maiores, earum architecto. Perspiciatis delectus beatae eius itaque reiciendis iste possimus corrupti quos, maxime nobis voluptatum, deleniti harum sint molestias et ab minima eveniet sunt. Facere dolorem modi soluta veniam, commodi praesentium molestias consequatur ut culpa quibusdam nostrum molestiae laudantium repellat placeat odio hic qui animi excepturi vitae! Est, sed. Voluptate odit, facere delectus, enim omnis vitae minus atque tempore distinctio neque harum quo iste eius cum. Ea repudiandae omnis praesentium et illo, odio ratione vel, rem voluptatum ad iure, culpa soluta ex vero natus sapiente velit nesciunt nihil?</p>
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
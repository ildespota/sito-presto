<x-layout
title="{{$announcement->title}}"
>
    <div class="container my-5">
        <div class="row">
          
    
            
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/400/200" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/401/201" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/402/202" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>


            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$announcement->title}}</h5>
                <p class="card-text">{{$announcement->description}}</p>
                <p class="card-text">{{$announcement->price}}</p>
                <p class="card-text">{{$announcement->created_at->format('d-m-Y')}}</p>
                <p class="card-text">{{$announcement->category->name}}</p>
                <a href="{{route('home')}}" class="btn btn-primary">Torna indietro</a>
              </div>
            </div>
          </div>
          
    
          
        </div>
      </div>
</x-layout>
<x-layout
    title="Homepage"
>

<header class="masthead mt-n5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 col-md-6 box">
          <h1 class="category_title">Categoria</h1>
          <div>
            @if (Session::has('status'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{Session::get('status')}}</li>
                    </ul>
                </div>
            @endif
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui adipisci expedita corporis aperiam enim numquam vitae animi facilis odit, ad similique delectus ex a nostrum beatae modi amet repellat doloremque.</p>
          <p class="lead">A great starter layout for a landing page</p>
          <a class="btn btn-custom">Inserisci il tuo annuncio</a>
        </div>
      </div>
    </div>
  </header>

  <div class="container-fluid my-5">
    <div class="row justify-content-around mx-2 ">
    
      


        @foreach ($announcements as $announcement)
        <div class="col-12 col-md-10 offset-md-1 card col-lg-5 offset-lg-0 my-3 ">
          <div class="row py-2">
                <div class="col-6 d-flex flex-column justify-content-around">
                  <img src="https://picsum.photos/200" class="img-fluid" alt="{{$announcement->title}}">

                </div>
              <div class="col-6">
                <h5 class="">{{$announcement->title}}</h5>
                <p>{{$announcement->description}}</p>
                <p class="card-text">{{$announcement->created_at->format('d-m-Y')}}</p>
                <a href= "{{route('announcement.category', $announcement->category)}}" class="card-text">{{$announcement->category->name}}</a>
                <h5 class="lead">{{$announcement->price}}</h5>
                <a href="{{route('announcement.show', $announcement)}}" class="btn btn-primary">Dettaglio</a>
              </div>
          </div>
      </div>
        @endforeach

      
    </div>
  </div>

</x-layout>
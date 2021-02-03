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

  <div class="container my-5">
    <div class="row">
      

        @foreach ($announcements as $announcement)
        <div class="col-12 col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200" class="card-img-top img-fluid" alt="{{$announcement->title}}">
          <div class="card-body">
            <h5 class="card-title">{{$announcement->title}}</h5>
            <p class="card-text">{{$announcement->description}}</p>
            <p class="card-text">{{$announcement->price}}</p>
            <p class="card-text">{{$announcement->created_at->format('d-m-Y')}}</p>
            <a href= "{{route('announcement.category', $announcement->category)}}" class="card-text">{{$announcement->category->name}}</a>
            <a href="{{route('announcement.show', $announcement)}}" class="btn btn-primary">Dettaglio</a>
          </div>
        </div>
      </div>
        @endforeach

      
    </div>
  </div>

</x-layout>
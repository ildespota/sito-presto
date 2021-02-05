<x-layout
title="revisori"
>
@if($announcement)
<div class="container">
    <div class="row">
        <div class="col-12">
           

            <div class="row justify-content-around">
            <img src="https://picsum.photos/400/200" alt="...">
            <img src="https://picsum.photos/401/201" alt="...">
            <img src="https://picsum.photos/402/202" alt="...">
            </div>
                   
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
            <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Accetta</button>
            </form>

            <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Rifiuta</button>
            </form>
            
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
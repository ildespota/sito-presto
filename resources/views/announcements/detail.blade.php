<x-layout
title="{{$announcement->title}}"
>

<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead_detail" style="background-image: url({{Storage::url($announcement->category->img)}});">
  <div class="container h-100">
    <div class="row h-100 align-items-md-center">
      <div class="col-12 col-md-6 box_detail d-none d-md-block">
        <h2 class="category_title">{{$announcement->category->name}}</h2>
    </div>
  </div>
</div>
</header>



  <div class="container mb-5">
        <div class="row">
          <div class="col-12 mt-5">
            <h1 class="mb-5">{{$announcement->title}}</h1>

                    @if(count($announcement->announcementImages)>0)
                    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox">
                            @for($i = 0; $i<count($announcement->announcementImages); $i++)
                           
                            <div class="carousel-item @if($i == 0) active @endif">
                                <div class="col-md-4">
                                    <div class="card card-body">
                                        <img class="img-fluid" src="{{$announcement->getCoverCarousel($i)}}">
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
        <div class="row mt-5">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <p class="card-text">{{__('ui.created_at')}}: {{$announcement->created_at->format('d-m-Y')}}</p>
                <h6 class="lead">{{__('ui.announcementPrice')}}: {{$announcement->price}} €</h6>
                <p class="card-text">{{__('ui.author')}} {{$announcement->user->name}}</p>
                <p><span>{{__('ui.announcementCategory')}}: </span><a href= "{{route('announcement.category', $announcement->category)}}" class="card-text">{{$announcement->category->name}}</a></p>
                {{-- <a href="" class="go-back">Dettaglio</a> --}}
                <button type="button" onclick="history.back(-1)" class="btn btn-custom2">{{__('ui.goBack')}}</button>
            </div>
            <div class="col-12 col-md-8">
              <p>{{$announcement->description}}</p>
            </div>
        </div>
  </div>

    @if(Auth::id() == $announcement -> user_id)
    
    <div class="container">
      <div class="row mb-3">
        <div class="col-12 col-md-3 mt-2">
          <button class="btn btn-warning" data-toggle="modal" data-target="#updateModal" type="button" data-backdrop="static">Modifica il tuo annuncio</button>
        </div>
  
        <div class="col-12 col-md-3 mt-2">
          <button class="btn btn-danger" data-toggle="modal" data-target="#destroyusermodal" type="button">Cancella il tuo annuncio</button>
        </div>
      </div>
    </div>
    @endif

    <div class="modal" tabindex="-1" id="destroyusermodal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Attenzione</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Sei sicuro di voler cancellare il tuo annuncio?</p>
          </div>
          <div class="modal-footer">
            <form action="{{route('announcement.delete', $announcement)}}" method="POST"> 
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
            <button type="button" class="btn btn-success" data-dismiss="modal">Torna indietro</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICA IL TUO ANNUNCIO</h5>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <div class="modal-body">
        {{-- INIZIO FORM --}}
        <form action="{{route('announcement.update', $announcement)}}" method="POST">
          @csrf
          @method('PUT')
          @if ($errors->any())
          <div class="alert alert-danger">
           <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            </div>
          @endif
          <div class="form-group">
              <label>{{__('ui.announcementTitle')}}</label>
              <input type="text" name="title" class="form-control"  aria-describedby="titolo annuncio" value="{{$announcement->title}}">
          </div>
          <div class="form-group py-2">
              <label>{{__('ui.announcementCategory')}}: </label>
              <span>{{$announcement->category->name}}</span>
          </div>
          <div class="form-group">
          <label>{{__('ui.announcementDescription')}}</label>
          <textarea class="form-control" name="description" id="" cols="80" rows="10">{{$announcement->description}}</textarea>
          </div>
          <div class="form-group ">
              <label>{{__('ui.announcementPrice')}}</label>
              <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text form-controlEuro">€</span>
                </div>
              <input type="number" name="price" class="form-control"  aria-describedby="prezzo annuncio" value="{{$announcement->price}}">
          </div>
          </div>
        <button type="submit" class="btn btn-success" >Salva modifiche</button>
      </form>
      {{-- FINE FORM --}}
      </div>
      <div class="ml-3 mb-2">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla modifiche</button>
    </div>
  </div>
</div>

    </x-layout>
<x-layout
title="{{$announcement->title}}"
>

<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead_detail mt-n5" style="background-image: url({{Storage::url($announcement->category->img)}});">
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

    </x-layout>
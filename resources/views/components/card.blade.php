<div class="card col-12 col-md-10 col-lg-5 offset-md-1 offset-lg-0 my-3 ">
    <div class="row py-2">
          <div class="col-6 d-flex flex-column justify-content-around">
            <img src="https://picsum.photos/200" class="img-fluid" alt="{{$title}}">

          </div>
        <div class="col-6">
          <h5 class="">{{$title}}</h5>
          <p>{{$description}}</p>
          <p class="card-text">{{$createdAt}}</p>
          <a href= "{{route('announcement.category', $category )}}" class="card-text">{{$name}}</a>
          <h5 class="lead">{{$price}}</h5>
          <a href="{{route('announcement.show', $announcement)}}" class="btn btn-primary">Dettaglio</a>
        </div>
    </div>
</div>
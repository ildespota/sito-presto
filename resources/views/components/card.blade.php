<div class="card col-12 col-md-10 col-lg-5 offset-md-1 offset-lg-0 my-3 card-box rounded-0">
    <div class="row py-2">
          <div class="col-12 col-md-6 d-flex flex-column justify-content-around">
            {{-- {{dd($image)}} --}}
            <img src="{{$image}}" class="img-fluid" alt="{{$title}}">

          </div>
        <div class="col-12 col-md-6 pt-4 pt-md-0">
          <h5 class="">{{$title}}</h5>
          <p>{{$description}}</p>
          <p class="card-text">{{$createdAt}}</p>
          <a href= "{{route('announcement.category', $category )}}" class="card-text">{{$name}}</a>
          <h5 class="lead">{{$price}}</h5>

          <div class="col d-flex justify-content-end">
          <a href="{{route('announcement.show', $announcement)}}" class="btn btn-custom2 rounded">{{__('ui.detail')}}</a>
        </div> 
      </div>
    </div>
</div>
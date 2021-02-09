<x-layout
    title="Cestino"
>

  <div class="container-fluid my-5">
    <div class="row">
      <div class="col-12">
      <h1 class="text-center">Cestino</h1>
      </div>
    </div>
    <div class="row justify-content-around mx-2 ">
     
        @foreach ($announcements as $announcement)
       <div class="card col-12 col-md-10 col-lg-5 offset-md-1 offset-lg-0 my-4 rounded-0">
        <form action="{{route('revisor.restore',$announcement->id)}}" method="POST">
          @method('PUT')
          @csrf
        <div class="row py-2">
              <div class="col-12 col-md-6 d-flex flex-column justify-content-around">
                <img src="{{$announcement->getCover()}}" class="img-fluid" alt="{{$announcement->title}}">
    
              </div>
            <div class="col-12 col-md-6 pt-4 pt-md-0">
              <h5 class="">{{$announcement->title}}</h5>
              <p>{{$announcement->description}}</p>
              <p class="card-text">{{$announcement->created_at->format('d-m-Y')}}</p>
              <p class="card-text">{{$announcement->category->name}}</p>
              <h5 class="lead">{{$announcement->price}}</h5>
              <!-- <a href="{{route('announcement.show', $announcement)}}" class="btn btn-custom2 rounded">Dettaglio</a> -->
          </div>
        </div>
        <button type="submit" class="btn btn-success my-2">Ripristina</button>
      </form>
    </div>
  
        @endforeach

      
    </div>
    <div class="row m-5 justify-content-center">
      <div class="">
        {!! $announcements->links() !!}
      </div>
    </div>
  </div>

</x-layout>
<x-layout title="ciao">
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
            <p class="card-text">{{$announcement->user->name}}</p>
            <a href= "{{route('announcement.category', $announcement->category) }}" class="card-text">{{$announcement->category->name}}</a>
            <a href="{{route('announcement.show', $announcement)}}" class="btn btn-primary">Dettaglio</a>
          </div>
        </div>
      </div>
        @endforeach

      
    </div>
  </div>
  
</x-layout>
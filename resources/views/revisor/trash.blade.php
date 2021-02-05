<x-layout
    title="Cestino"
>

  <div class="container-fluid my-5">
    <div class="row">
      <div class="col-12">
      <h1>Cestino</h1>
      </div>
    </div>
    <div class="row justify-content-around mx-2 ">
  
     
        @foreach ($announcements as $announcement)
       <form action="{{route('revisor.restore',$announcement->id)}}" method="POST">
       @method('PUT')
       @csrf
        <x-card
        announcement="{{$announcement->id}}"
        title="{{$announcement->title}}"
        description="{{$announcement->description}}"
        createdAt="{{$announcement->created_at->format('d-m-Y')}}"
        name="{{$announcement->category->name}}"
        price="{{$announcement->price}}"
        category="{{$announcement->category->id}}"
        />
        <button type="submit" class="btn btn-success">Ripristina</button>
        </form>
        @endforeach

      
    </div>
  </div>

</x-layout>
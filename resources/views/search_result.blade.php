<x-layout
    title="Risultati ricerca"
>

<h1 class="">I risultati della tua ricerca per: {{$q}}</h1>

  <div class="container-fluid my-5">
    <div class="row justify-content-around mx-2 ">
    
       @foreach ($announcements as $announcement)
            <x-card
            announcement="{{$announcement->id}}"
            title="{{$announcement->title}}"
            description="{{$announcement->description}}"
            createdAt="{{$announcement->created_at->format('d-m-Y')}}"
            name="{{$announcement->category->name}}"
            price="{{$announcement->price}}"
            category="{{$announcement->category->id}}"
            image="{{$announcement->getCover()}}"
            />        
        @endforeach

      
    </div>
  </div>

</x-layout>
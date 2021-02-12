<x-layout
    title="Risultati ricerca"
>

<h1 class="text-center mt-5">I risultati della tua ricerca per: {{$q}}</h1>

  <div class="container-fluid my-5">
    <div class="row justify-content-around mx-2 ">
    
       @foreach ($announcements as $announcement)
            <x-card
            announcement="{{$announcement->id}}"
            title="{{$announcement->title}}"
            createdAt="{{$announcement->created_at->format('d-m-Y')}}"
            name="{{$announcement->category->name}}"
            price="{{$announcement->price}}"
            category="{{$announcement->category->id}}"
            image="{{$announcement->getCover()}}"
            url="{{$announcement->url()}}"
            description="{{$announcement->preview($announcement->description)}}"
            />        
        @endforeach

      
    </div>
    {{-- <div class="row mt-4 justify-content-center">
      <div class="">
        {!! $announcements->appends(['q' => $q])->links() !!}
      </div>
    </div> --}}
  </div>

</x-layout>
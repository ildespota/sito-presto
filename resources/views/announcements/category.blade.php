<x-layout title="Categorie">
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
      />
      
      @endforeach

      
    </div>
    <div class="row mt-4 justify-content-center">
      <div class="">
        {!! $announcements->links() !!}
      </div>
    </div>
  </div>
  
</x-layout>
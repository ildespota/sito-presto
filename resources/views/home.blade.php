<x-layout
    title="Homepage"
>

<header class="masthead mt-n5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 col-md-6 box">
          <h1 class="category_title">Categoria</h1>
          <div>
            @if (Session::has('status'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{Session::get('status')}}</li>
                    </ul>
                </div>
            @endif
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui adipisci expedita corporis aperiam enim numquam vitae animi facilis odit, ad similique delectus ex a nostrum beatae modi amet repellat doloremque.</p>
          <p class="lead">A great starter layout for a landing page</p>
          <a class="btn btn-custom">Inserisci il tuo annuncio</a>
        </div>
      </div>
    </div>
  </header>

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
  </div>

</x-layout>
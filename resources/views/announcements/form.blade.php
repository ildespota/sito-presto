<x-layout
    title="Inserisci un nuovo annuncio"
>
<div class="container mt-5">
    <div class="row justify-content-between">
        <div class="col-12 col-md-4 box3">
            <h1>Inserisci un nuovo annuncio</h1>
            <h1><i class="fas fa-arrow-right"></i></h1>
        </div>
        <div class="col-12 col-md-7 mb-5">
            <form action="{{route('announcement.store')}}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                 <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  </div>
                @endif
                <div class="form-group">
                    <label>Titolo</label>
                    <input type="text" name="title" class="form-control"  aria-describedby="titolo annuncio" placeholder="titolo annuncio" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>Categoria</label>
                    <select name="category">
                        <option value="" class="form-control" selected="selected"></option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" class="form-control">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <label>Descrizione</label>
                <textarea class="form-control" name="description" id="" cols="80" rows="10">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="number" name="price" class="form-control"  aria-describedby="prezzo annuncio" placeholder="prezzo annuncio" value="{{old('price')}}">
                </div>
                <button type="submit" class="btn btn-custom">Inserisci</button>
            </form>
        </div>
        </div>
</div>

   
</x-layout>
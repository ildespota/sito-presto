<x-layout
    title="Inserisci un nuovo annuncio"
>
<div class="container mt-5">
    <div class="row justify-content-between">
        <div class="col-12 col-md-4 box3">
            <h1>Inserisci un nuovo annuncio</h1>
            <h1><i class="fas fa-arrow-right"></i></h1>
        </div>
        <div class="col-12 col-md-7">
            <form action="{{route('announcement.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Titolo</label>
                    <input type="text" name="title" class="form-control"  aria-describedby="titolo annuncio" placeholder="titolo annuncio" value="{{old('title')}}">
                
                </div>
                <div class="form-group">
                <label>description</label>
                <textarea class="form-control" name="description" id="" cols="80" rows="10">{{old('description')}}</textarea>
                </div>
                <button type="submit" class="btn btn-custom">Inserisci</button>
            </form>
        </div>
        </div>
</div>

   
</x-layout>
<x-layout
    title="Inserisci un nuovo annuncio"
>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Inserisci un nuovo annuncio</h1>
                    <form action="{{route('announcement.store')}}" method="POST">
                    @csrf
                <div class="form-group">
                    <label>Titolo</label>
                    <input type="text" name="title" class="form-control"  aria-describedby="titolo annuncio" placeholder="titolo annuncio" value="{{old('title')}}">
                
                </div>
                <div class="form-group">
                <label>description</label>
                <textarea name="description" id="" cols="30" rows="10">{{old('description')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Inserisci</button>
            </form>
        </div>
    </div>
</div>
   
</x-layout>
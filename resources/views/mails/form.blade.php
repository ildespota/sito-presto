<x-layout
    title="Richiedi di collaborare"
>
<div class="container mt-5">
    <div class="row justify-content-between">
        <div class="col-12 col-md-4 box3">
            <h1>Richiedi di collaborare</h1>
            <h1><i class="fas fa-arrow-right"></i></h1>
        </div>
        <div class="col-12 col-md-7 mb-5">
            <form action="{{route('revisor.submit')}}" method="POST">
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
                    <label>Numero di telefono</label>
                    <input type="text" name="number" class="form-control"  aria-describedby="Numero di telefono" placeholder="inserisci il tuo numero di telefono" value="{{old('number')}}">
                </div>

                <div class="form-group">
                    <label>Indirizzo</label>
                    <input type="text" name="address" class="form-control"  aria-describedby="Indirizzo" placeholder="inserisci il tuo Indirizzo" value="{{old('address')}}">
                </div>
                
                <div class="form-group">
                <label>Descrizione</label>
                <textarea class="form-control" name="body" id="" cols="80" rows="10">{{old('body')}}</textarea>
                </div>
               
                <button type="submit" class="btn btn-custom">Invia la richiesta</button>
            </form>
        </div>
        </div>
</div>

   
</x-layout>
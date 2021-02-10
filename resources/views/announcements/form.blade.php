<x-layout
    title="Inserisci un nuovo annuncio"
>
<div class="container mt-5">
    <div class="row justify-content-between">
        <div class="col-12 col-md-4 box3">
            <h1>{{__('ui.ads')}}</h1>
            <h1><i class="fas fa-arrow-right"></i></h1>
        </div>
        <div class="col-12 col-md-7 mb-5">
            <form action="{{route('announcement.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">

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
                    <label>{{__('ui.announcementTitle')}}</label>
                    <input type="text" name="title" class="form-control"  aria-describedby="titolo annuncio" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>{{__('ui.announcementCategory')}}</label>
                    <select name="category">
                        <option value="" class="form-control" selected="selected"></option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" class="form-control">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <label>{{__('ui.announcementDescription')}}</label>
                <textarea class="form-control" name="description" id="" cols="80" rows="10">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label>{{__('ui.announcementPrice')}}</label>
                    <input type="number" name="price" class="form-control"  aria-describedby="prezzo annuncio" value="{{old('price')}}">
                </div>

                <div class="form-group row">
                <label for="images">{{__('ui.announcementImage')}}</label>
                
                <div class="col-md-12">
                    <div class="dropzone" id="drophere"></div>
                    
                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                </div>


                <button type="submit" class="btn btn-custom">{{__('ui.announcementInsert')}}</button>
            </form>
        </div>
        </div>
</div>

   
</x-layout>
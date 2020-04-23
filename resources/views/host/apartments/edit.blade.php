@extends('layouts.app')

@section('content')

    <div class='container'>
        <div class="row">
            <div class="col-12">

                <form method='POST' action="{{route('host.update', $apartment->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name='title'  placeholder="inserisci un titolo" value="{{$apartment->title}}">
                        @error('title')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Indirizzo</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name='address'  placeholder="inserisci un indirizzo" value="{{$apartment->address}}">
                        @error('address')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input id="lat" type="hidden" name="lat" value="{{$apartment->lat}}">
                    <input id="lon" type="hidden" name="lon" value="{{$apartment->lon}}">


                    <div class="form-group">
                        <label for="rooms">stanze</label>
                        <input min="1" type="number" class="form-control @error('rooms') is-invalid @enderror" name='rooms'  placeholder="inserisci un numero di stanza" value="{{$apartment->rooms}}">
                        @error('rooms')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="beds">letti</label>
                        <input min="1" type="number" class="form-control @error('beds') is-invalid @enderror" name='beds'  placeholder="inserisci numero letti" value="{{$apartment->beds}}">
                        @error('beds')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bathroom">bagni</label>
                        <input min="1" type="number" class="form-control @error('bathroom') is-invalid @enderror" name='bathroom'  placeholder="inserisci numero bagni" value="{{$apartment->bathroom}}">
                        @error('bathroom')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="square_meters">metri quadri</label>
                        <input min="1" type="number" class="form-control @error('square_meters') is-invalid @enderror" name='square_meters'  placeholder="inserisci metri quadrati" value="{{$apartment->square_meters}}">
                        @error('square_meters')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name='description' rows="3">{{$apartment->description}}</textarea>
                        @error('description')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="main_img" >Immagine</label>
                        @isset($apartment->main_img)
                            <img src="{{asset('storage/' . $apartment->main_img)}}" style="width: 300px" alt="">
                        @endisset

                        <input type="file" class="form-control-file @error('main_img') is-invalid @enderror" name="main_img" accept="image/*">
                        @error('main_img')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label class="mr-4 text-bold" for="services">Servizi</label>
                        @foreach ($services as $service)
                        <input type="checkbox" name="services[]" value="{{$service->id}}"
                            {{($apartment->services->contains($service->id) ? 'checked' : '')}}>

                        <span class="mr-4">{{$service->name}}</span>
                        @endforeach
                    </div>

                    <div class="form-group">
                      <select name="published">
                        <option value="1" {{($apartment->published == 1) ? 'selected' : ''}}>Pubblicato</option>
                        <option value="0" {{($apartment->published == 0) ? 'selected' : ''}}>Non pubblicato</option>
                      </select>
                    </div>


                    <button type='submit'>Salva</button>

                </form>

            </div>
        </div>
    </div>

@endsection

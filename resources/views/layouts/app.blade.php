@include('layouts._head')

<body>
    <div id="app">
        @if (Request::is('/'))
        <header>
          <div class="container-fluid">
            @include('layouts._menu')
          </div>
          <div class="container">
            <div class="row mt-5 ml-5">
              <div class="col-11 offset-1">
                <div class="form-group box-search-index">
                  <h2 class="mb-4 font-weight-bold">Prenota Case ed <br> esperienze uniche.</h2>
                  <form method="POST" action="{{route('apartment.search')}}" >
                    @csrf
                    @method('POST')
                    <label class="small-text-search" for="search_input">DOVE</label>
                    <input id="search_input" type="text" placeholder="Aggiungi una città o un indirizzo" name="search_input">
                    <input id="lat" type="hidden" name="lat" value="">
                    <input id="lon" type="hidden" name="lon" value="">
                    <button id="search" type="submit">Cerca</button>
  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </header>
        @else
        @include('layouts._menu')
        @endif  

        
      <main class="py-4">
            @yield('content')
      </main>

      <footer>

      </footer>

    </div>
    <script src="{{asset('js/app.js')}}"></script> 
</body>
</html>

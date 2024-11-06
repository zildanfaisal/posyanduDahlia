<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posyandu Dahlia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary pt-4 pb-4">
        <div class="container">
          <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 70px; height:auto;">
          </div>
          <a class="navbar-brand" style="margin-left: 15px" href="/homePage">Posyandu Dahlia</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/homePage">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboardBalita">Data Balita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/dashboardIbuHamil">Data Ibu Hamil</a>
              </li>
            </ul>
            <div class="d-flex navbar-nav">
                {{-- <a class="nav-link me-2" href="#">Profile</a> --}}
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-link nav-link">Logout</button>
                </form>
            </div>
          </div>
        </div>
    </nav>

      <div class="container mt-4">
        @yield('content')
      </div>

      <footer class="text-center pt-4 pb-2 mt-4">
        <p>&#169; 2024 - Posyandu Dahlia</p>
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
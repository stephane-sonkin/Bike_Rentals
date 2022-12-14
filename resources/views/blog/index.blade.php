<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bikes</title>
    <link rel="stylesheet" href="{{ URL('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
  <div class="banner-area">
    <div>
      <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand fw-bolder" href="#">Bike Rentals</a>
          <div class="text-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="collapsibleNavbar">
              @if (Auth::user())
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-dark border-3 border-start border-dark" 
                  href="{{ route('dashboard') }}">Profile</a>
                </li>
              </ul>
              @endif
              @if (!Auth::user())
              <ul class="navbar-nav">
                <li class="nav-item me-5 ">
                  <a class="nav-link text-dark border-start border-dark border-3 px-3" 
                  href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark border-3 border-start border-dark px-3" 
                  href="{{ route('register') }}">Register</a>
                </li>
              </ul>
              @endif
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div class="content-area">
      <div class="content">
        
        <h1><b>Bikes Rentals</b></h1>
        <p>Online bike rental service</p>
        <button class="but" type="button"><a href="#articles">Click here</a></button>

      </div>
    </div>
  </div>
  <div id="articles">
    <div class="avail">
      <p>Available bikes</p>
    </div>
    <div class="row container">
      @foreach ($bikes as $bike)
      <div class="card border-none shadow-lg my-5 col-sm-4">
        <a href="{{ route('blog.show', $bike->id) }}">
          <img class="rounded-bottom card-img-top" src="{{ URL($bike->image_path) }}" 
          alt="Card image" style="height: 250px; width:500px">
          <div class="card-body">
            <h4 class="card-title fw-bolder">{{ $bike->brand }}</h4>
            <h3 class="card-title fw-bolder">{{ $bike->price }}$</h3>
            <p class="card-text">{{ $bike->description }}</p>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>

  <div>
    {{ $bikes->links() }}
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
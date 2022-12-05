<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
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
            {{-- @if (Route::has('login')) --}}
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                  @if (Auth::user())
                  {{-- @auth --}}
                  <li class="nav-item">
                    <a class="nav-link text-dark border-3 border-start border-dark" 
                    href="{{ route('dashboard') }}">Profile</a>
                  </li>
                  @endif
                  {{-- @else --}}
                  @if (!Auth::user())
                  <li class="nav-item me-5 ">
                    <a class="nav-link text-dark border-start border-dark border-3 px-3" 
                    href="{{ route('login') }}">Login</a>
                  </li>
                  {{-- @if (Route::has('register')) --}}
                  <li class="nav-item  ">
                    <a class="nav-link text-dark border-3 border-start border-dark px-3" 
                    href="{{ route('register') }}">Register</a>
                  </li>
                  @endif
                  {{-- @endauth --}}
              </div>
          </div>
        </div>
      </nav>
      </div>
        <div class="content-area">
          <div class="content">
            <h1><b>Bikes Rentals</b></h1>
            <p>Online bike rental service</p>   
            <button class="but" type="button"><a href="{{ route('blog.index') }}">See available bikes</a></button>
          </div>   
        </div>
    </div>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
          <div class="container-fluid">
            <a class="navbar-brand fw-bolder" href="#">Bike Rentals</a>
            <div class="text-end">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class=" collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link text-dark border-start border-dark border-2" 
                    href="{{ route('dashboard') }}">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark border-start border-dark border-2" 
                    href="{{ route('blog.index') }}">Go to bikes</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
      @if (session()->has('message'))
          
      <div class="border border-3 container-fluid">
          <h1 class="text-center py-5 px-5 text-success fw-bolder fs-1">
              {{ session()->get('message') }}
            </h1>
        </div>
        <div>
            <div class="mt-4 mx-3 p-5 text-white rounded border-dark border-2">
            <p class="text-center fw-bolder fs-3 text-dark">
                Your booking has been received and placed into our order processing system.
            </p>
            <p class="text-danger text-center">
                <b>WARNING!</b> Please do not reload this page without making a note of your <strong>order number</strong>. 
                Keep it in the event you need to comunicate with <br> us about your order.      
            </p>
        </div>
        @endif
    </div>
</body>
</html>
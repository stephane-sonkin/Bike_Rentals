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
  @if (session('key'))
<body>
    <div>
        <nav class="navbar navbar-expand-sm navbar-light">
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
          
        <div class="container mt-3">
          <div class="border border-2 bg-light rounded mx-5">
            <h1 class="text-center py-5 px-5 text-success fw-bold  fs-1">
              Booking Confirmed!
            </h1>
          </div>
        </div>
            <div class="mt-4 mx-3 p-5 text-white rounded border-dark border-2">
            <p class="text-center fw-bolder fs-3 text-dark">
              Thank you for using our bike rental system. We wish you a safe ride!
            </p>
            <p class="text-dark text-center fs-4">
              <span class="fw-bold fs-4">Your order Number :</span> 
              <span class="text-info">{{ session('key') }}</span>
            </p>
            <p class="text-dark text-center mt-3 mb-2">
              <small class="fs-5">
                Please read the following information about your order.
              </small>     
            </p>
        <div class="container">
          <div class="border pt-2 px-3 border-5 mx-5 pb-5">
            <p class="text-center text-warning px-5 fs-4 fw-bold mb-4">
                Your booking has been received and placed into our order processing system.
            </p>
            <p class="text-center px-5 text-dark fs-5">
              please make a note of your <strong>order number</strong> 
              now and keep it in the event you need to comunicate with us about your order.
            </p>
            <p class="text-center text-warning px-5 fs-4 fw-bold mb-4 mt-4">Invoice</p>
            <div class="lh-lg mt-5 px-5">
            <p class="fs-5 text-dark"><span class="fw-bold">Bike brand:</span> {{ session('brand') }}</p>
            <p class="fs-5 text-dark"><span class="fw-bold">Bike price per day:</span> {{ session('price') }}$</p>
            <p class="fs-5 text-dark"><span class="fw-bold">Start date:</span> {{ session('date') }}</p>
            <p class="fs-5 text-dark"><span class="fw-bold">Duration:</span> {{ session('duration') }} days</p>
            <p class="fs-5 text-dark"><span class="fw-bold">Total price:</span> {{ session('total') }}$</p>
            </div>
          </div>
        </div>
        <div class="container mt-5">
          <p class="text-center text-dark">Warning! <strong>Do not reload this page</strong> otherwise the above display will be lost.
            If you want a hardcopy of this page, please print it now.
          </p>
        </div>
      </div>  
    </body>
    @endif
</html>
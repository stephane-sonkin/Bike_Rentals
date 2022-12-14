<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $bike->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-4/5 mx-5 col-sm-10">
        <div class="pt-5">
            <a href="{{  URL::previous() }}"
                class="text-success text-decoration-none pb-3 py-5">
                < Back to previous page
            </a>
        </div>
    </div>
    <img class="container border-none shadow-lg my-5 w-75" src="{{ URL($bike->image_path) }}" 
        alt="image" style="height: 400px; width:100%">
    <div class="ms-5 container w-50">
      <h4 class=" fw-bolder">{{ $bike->brand }}</h4>
      <p class="">{{ $bike->description }}</p>
    </div>
    <div class="container text-center fw-bolder fs-3 pt-5 my-5 border-top boder-dark border-2">
      Rent this bike :
    </div>
      {{-- form div --}}
    <div class="container border border-3 w-50 mb-5">
      <div class="pb-5">
        @if ($errors->any())
          <div class="bg-danger text-light fw-bolder px-2 py-1">
            All fields need to be filled correctly.
          </div>
        @endif
      </div>
      <form 
        action="{{ route('blog.store', $bike->id) }}"
        method="POST">
        @csrf
        <div class="mb-3">
          <label for="date" class="form-label">Start date:</label>
          <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="mb-3">
          <label for="period" class="form-label">Duration:</label>
          <input type="number" class="form-control" id="period" placeholder="Number of days" name="period">
        </div>
        <button type="submit" class="mb-3" style="background-color: rgb(60, 185, 207); 
        color:white; padding:10px; border-radius:5px;">RENT NOW</button>
      </form>
    </div>
    <div class="container mb-5">
      <p class="text-center text-dark"><strong>Note : </strong>You will be charged with 
        <span class="text-danger">50$</span> for each day after the due end date.
      </p>
    </div>
</body>
</html>
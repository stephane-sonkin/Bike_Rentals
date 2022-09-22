<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet">
@vite('resources/css/app.css')
<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your profile
        </h2>
    </x-slot>

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible pb-5 mt-5 container">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Good!</strong> {{ session()->get('message') }}
      </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="fw-bolder text-center"><b>Your rentals</b></h1>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Start date</th>
                    <th>Duration</th>
                    <th>Brand</th>
                    <th>Total price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->rentals as $rental)
                    <tr>
                      <td>{{ $rental->start_date }}</td>
                      <td>For {{ $rental->duration }} days</td>
                      <td>{{ $rental->bike_brand }}</td>
                      <td>{{ $rental->bike_price * $rental->duration}}$</td>
                      <td>
                        <form action="{{ route('blog.destroy', $rental->id) }}"
                          method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="form-control text-light bg-danger"
                            type="submit">
                            Return
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
              </table>
        </div>
    </div>
</x-app-layout>

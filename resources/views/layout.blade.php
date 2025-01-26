<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Point of Sales System</title>
@include('liberies.styles')
</head>

<body>

  {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary"> --}}
  <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Point of Sales System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=" {{url('/catagory')}} ">Catagory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=" {{url('/brand')}} ">Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sales</a>
          </li>
        </ul>
      </div>
      <div>

        @if (Route::has('login'))
        @auth
        <a
          href="{{ url('/dashboard') }}"
          class="rounded-md px-3 py-2 text-blue ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white text-decoration-none">
          Dashboard
        </a>
        @else
        <a
          href="{{ route('login') }}"
          class="rounded-md px-3 py-2 text-info ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white text-decoration-none">
          Log in
        </a>

        @if (Route::has('register'))
        <a
          href="{{ route('register') }}"
          class="rounded-md px-3 py-2 text-info ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white text-decoration-none">
          Register
        </a>
        @endif
        @endauth
        @endif

      </div>
    </div>
  </nav>
  <div>
    @yield('content')
  </div>
  @include('liberies.scripts')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://unpkg.com/imask"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    @include('includes.header')
    <div class="container-fluid">
      <div class="row">
        @include('includes.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @include('includes.notifications')
          @yield('content')
        </main>
      </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
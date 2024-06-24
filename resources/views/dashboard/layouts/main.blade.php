<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="App Gereja">
    <meta name="author" content="Davidy Silalahi">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>App Gereja | Dashboard</title>
</head>
  <body>
    @include('dashboard.layouts.header')
    @include('partials.styles')
    @include('partials.scripts')

    <div class="container-fluid">
    <div class="row">
        @include('dashboard.layouts.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('container')
        </main>
    </div>
    </div>

    @include('dashboard.layouts.footer')
    <script src="/js/dashboard.js"></script>


  </body>
</html>

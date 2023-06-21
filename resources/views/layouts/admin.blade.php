<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="main_wrapper">

      <header >
        {{-- @include('admin.partial.header') --}}
        @include('admin.partial.headerNativo')
      </header>

      <div class="container-fluid row h-100">

        <div class="aside col-2 bg-dark text-white">
          @auth
              @include('admin.partial.asideLeft')
          @endauth
        </div>

        <main class="col overflow-scroll">
          @yield('content')</main>
        </div>

    </div>
</body>
</html>

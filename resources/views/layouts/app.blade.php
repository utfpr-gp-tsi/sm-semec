<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('shared/_favicon')

    <title>@include('shared/_full_title')</title>

    <!--Icons-->
    <script src="https://kit.fontawesome.com/826671e166.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset(mix('/assets/js/app.js')) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    

  </head>
  <body>
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row py-5 mt-5">
            <div class="col-lg-12 mx-auto p-4 mt-5">

              @include('shared/_flash')

              @yield('content')

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>

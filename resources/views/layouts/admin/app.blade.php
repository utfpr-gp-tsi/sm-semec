<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     
    <title>@include('shared/_full_title')</title>

     <!--Icons-->
     <script src="https://kit.fontawesome.com/826671e166.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/admin/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/vendor/tabler/css/tabler-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin/edit.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app" class="page">
    <div class="page-main">
      <div class="container-fluid m-0">
        <div class="row">
          
          @include('layouts/admin/_header')
          @include('layouts/admin/_sidebar')

          <div class="col-md-9 col-lg-10">

            @include('layouts/admin/_breadcrumbs')

            <div class="card" id="main-card">
              <div class="card-header">
                <h1 class="page-title mb-3">
                 @yield('title')
               </h1>
             </div>
             <div class="card-body">
              <div>
                @include('shared/_flash')
              </div>
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

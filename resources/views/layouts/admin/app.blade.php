    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>@yield('title')</title>

     <!--Icons-->
     <script src="https://kit.fontawesome.com/826671e166.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/vendor/tabler/css/tabler.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/home/home.css') }}" rel="stylesheet">
</head>
<body>
 <div id="app" class="page">
  <div class="page-main">
    <div class="container-fluid m-0">
      <div class="row">

        @include('layouts/admin/_header')

        @include('layouts/admin/_sidebar')

        <div class="col-md-9 col-lg-10">
          <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item active" aria-current="page">Página inicial</li></ol></nav>

          <div class="card" id="main-card">
            <div class="card-header">
              <h1 class="page-title mb-3">
                Dashboard
              </h1>
            </div>
            
            <div class="card-body">
              <div>
                @include('shared/_flash')
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
</div>
</body>
</html>

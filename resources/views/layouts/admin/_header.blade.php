<div class="container-fluid fixed-top header py-4">
  <div class="d-flex">
    <a class="header-brand ml-5" href="">
      <img src="{{ asset('assets/images/brasao.png') }}" class="header-brand-img " alt="logo-semec"> 
    </a>    
    <div class="d-flex order-lg-2 ml-auto">
      <div class="dropdown">
        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
          <span class="avatar" style=""></span>

          <span class="ml-2 d-none d-lg-block">
            <span class="text-default">  {{ Auth::user()->name }}</span>
            <small class="text-muted d-block mt-1">  {{ Auth::user()->email }}</small>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
          <a class="dropdown-item" href=""> <i class="dropdown-icon far fa-user"></i>  Meu Perfil </a>      
          <a class="dropdown-item" rel="nofollow" data-method="delete" href="{{ route('logout') }}" id="logout">
            <i class="dropdown-icon fas fa-sign-out-alt"></i>
            {{ __('Logout') }}
          </a>   
        </div>
      </div>

      <a href="#" class="header-toggler d-lg-none d-md-none ml-3" data-toggle="collapse" data-target="#headerMenuCollapse" aria-expanded="true">
        <i class= "header-toggler-icon"></i>
      </a>

    </div>
  </div>
</div>

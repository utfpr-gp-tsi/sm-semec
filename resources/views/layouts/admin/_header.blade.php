<div class="fixed-top header py-4">
  <div class="container-fluid">
    <div class="d-flex">

      <a class="header-brand" href="./index.html">
        <img src="{{ asset('assets/images/brasao-prefeitura.png') }}" class="header-brand-img" alt="tabler logo">
      </a>

      <span class="d-lg-block mt-1 text-muted font-weight-bold">
        SEMEC
      </span>

      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-image: url({{ asset('assets/images/default/default-user.png') }})"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">Jane Pearson</span>
              <small class="text-muted d-block mt-1">Administrator</small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon far fa-user"></i>Profile
            </a>
            </a>
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fas fa-sign-out-alt"></i>Sign out
            </a>
          </div>
        </div>
      </div>

      <a href="#" class="header-toggler d-md-none ml-3" data-toggle="collapse" data-target="#sidebarMenuCollapse" aria-expanded="true">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>

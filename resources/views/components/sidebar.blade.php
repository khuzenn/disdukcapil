<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="AdminLTE/dist/img/jambi.png" alt="Disdukcapil Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Disdukcapil Jambi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" name="search" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link @if(request()->is('/')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data-pengguna" class="nav-link @if(request()->is('data-pengguna')) active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data-outlet" class="nav-link @if(request()->is('data-outlet')) active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Data Outlet
              </p>
            </a>
          </li>
          <li class="nav-item @if(request()->is('purpose*') || request()->is('loket*') || request()->is('display*')) menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Setting Antrian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="purpose" class="nav-link @if(request()->is('purpose')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tujuan Loket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="loket" class="nav-link @if(request()->is('loket')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Loket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display" class="nav-link @if(request()->is('display')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Antarmuka</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">Pengaturan</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
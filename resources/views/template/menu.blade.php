<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
    <img src="{{asset('template/dist/img/logo2.png')}}" width="30%" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ucfirst(Auth::user()->name)}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview {{ Request::segment(1) === 'kabupaten' ? 'menu-open' : '' }} {{ Request::segment(1) === 'kelurahan' ? 'menu-open' : '' }} {{ Request::segment(1) === 'kecamatan' ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::segment(1) === 'kabupaten' ? 'active' : '' }} {{ Request::segment(1) === 'kelurahan' ? 'active' : '' }} {{ Request::segment(1) === 'kecamatan' ? 'active' : '' }}">
            <i class="nav-icon fa fa-building"></i>
            <p>
              Data Wilayah
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('kabupaten.index')}}" class="nav-link {{ Request::segment(1) === 'kabupaten' ? 'active' : '' }}">
                <i class="nav-icon fa fa-building"></i>
                <p>
                  Kabupaten
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('kecamatan.index')}}" class="nav-link {{ Request::segment(1) === 'kecamatan' ? 'active' : '' }}">
                <i class="nav-icon fa fa-briefcase"></i>
                <p>
                  Kecamatan
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('kelurahan.index')}}" class="nav-link {{ Request::segment(1) === 'kelurahan' ? 'active' : '' }}">
                <i class="nav-icon fas fa-map"></i>
                <p>
                  Kelurahan
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{route('tps.index')}}" class="nav-link {{ Request::segment(1) === 'tps' ? 'active' : '' }}">
            <i class="nav-icon fas fa-archway"></i>
            <p>
              TPS
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('paslon.index')}}" class="nav-link {{ Request::segment(1) === 'paslon' ? 'active' : '' }}">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Paslon
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('saksi.index')}}" class="nav-link {{ Request::segment(1) === 'saksi' ? 'active' : '' }}">
            <i class="nav-icon fas fa-address-book"></i>
            <p>
              Saksi
              <!-- <span class=" right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('perhitungan.index')}}" class="nav-link {{ Request::segment(1) === 'perhitungan' ? 'active' : '' }}">
            <i class="nav-icon fas fa-book-reader"></i>
            <p>
              Perhitungan
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('inbox.index')}}" class="nav-link {{ Request::segment(1) === 'inbox' ? 'active' : '' }}">
            <i class="nav-icon fa fa-envelope"></i>
            <p>
              Inbox
              <span class="badge badge-info right" id="countinbox"></span>
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('user.index')}}" class="nav-link {{ Request::segment(1) === 'user' ? 'active' : '' }}">
            <i class="nav-icon fa fa-user-circle"></i>
            <p>
              Pengguna
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-power-off"></i>
            <p>
              Keluar
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
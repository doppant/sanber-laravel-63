<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @auth
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          @else
            <a href="#" class="d-block">Guest</a>
          @endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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
                <a href="{{route('home')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                      Home
                    </p>
                </a>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Halaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('table') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Task Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('data-tables')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tables</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('cast.index') }}" class="nav-link">
              <i class="nav-icon fas fa-theater-masks"></i>
              <p>
              Cast
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cast.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Cast</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item">
            <a href="{{route('films.index')}}" class="nav-link {{ Request::is('films*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-film"></i>
                <p>Film</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('genres.index')}}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Genre
                </p>
            </a>
          </li>
          <br>
          @guest
          <li class="nav-item" style="text-align: center;">
            <a href="{{ route('login') }}" class="btn btn-primary btn-block">
              Login
            </a>
          </li>
          @endguest
          @auth
          <li class="nav-item" style="text-align: center;">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-block"
               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              Logout
            </a>
          </li>
          @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
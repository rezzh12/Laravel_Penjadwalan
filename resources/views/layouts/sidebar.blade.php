  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/jual ROG.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Penjadwalan Mapel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/Aorus.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
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
        <li class="nav-item">
                <a href="home" class="nav-link active">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> 
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="guru" class="nav-link active">
                  <i class="far fa-address-book nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="jurusan" class="nav-link active">
                  <i class="far fa-building nav-icon"></i>
                  <p>Data Jurusan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="kelas" class="nav-link active">
                  <i class="fas fa-university nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="mapel" class="nav-link active">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Data Mata Pelajaran</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="waktu" class="nav-link active">
                  <i class="far fa-bell nav-icon"></i>
                  <p>Data Waktu</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="jadwal" class="nav-link active">
                  <i class="far fa-bookmark nav-icon"></i>
                  <p>Data Jadwal</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
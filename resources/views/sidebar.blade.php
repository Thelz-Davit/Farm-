<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('index') }}" class="brand-link">
        <span class="brand-text font-weight-light">RancaOrayFarm</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Pemesanan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('pemesanan/create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Formulir Pemesanan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pemesanan/table') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Pemesanan
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>
                            Sapi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('sapi/create') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Formulir Sapi</p>
                          </a>
                      </li>
                        <li class="nav-item">
                            <a href="{{ url('sapi/table') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Sapi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Pengeluaran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('pengeluaran/table') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pengeluaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pengeluaran/create') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Formulir Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

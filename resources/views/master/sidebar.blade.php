<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Aduin.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info"><a href="#" class="d-block">{{auth()->user()->nama}}</a></div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Menu Dashbord -->
                <li class="nav-item">
                    <a href="{{ route('master.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashbord</p>
                    </a>
                </li>
                <!-- End Menu Dashbord -->

                <!-- Menu Pengaduan  -->
                <li class="nav-item">
                    <a href="{{ route('pengaduan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Pengaduan</p>
                    </a>
                </li>
                <!-- End Menu Pengaduan -->

                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 4 || auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
                <!-- Barang  -->
                <li class="nav-item">
                    <a href="{{ route('barang.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Barang</p>
                    </a>
                </li>
                <!-- End Menu Account -->

                <!-- Ruangan  -->
                <li class="nav-item">
                    <a href="{{ route('ruangan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-person-booth"></i>
                        <p>Ruangan</p>
                    </a>
                </li>
                <!-- End Menu Account -->
                @endif

                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 5 || auth()->user()->role_id == 6)
                <li class="nav-item">
                    <a href="{{ route('pengadu.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>Pengadu</p>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a href={{ route('admin.index') }} class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>Admin</p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href={{ route('logout') }} class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>Keluar</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>




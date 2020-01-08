<!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Aduin | Pengaduan</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
@include('master/header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('master/sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
            @yield('content')

            <!-- table barang-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">

                                        <h3 class="card-title">Tabel Pengaduan</h3>
                                    </div>
                                    <form class="form-inline ml-3" action="{{ route('pengaduan.search') }}"
                                          method="GET">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-navbar" type="search"
                                                   placeholder="Search" name="search" aria-label="Search"
                                                   style="background-color: #F2F4F6; border: none;">
                                            <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit"
                                                        style="background-color: #F2F4F6" ;>
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div><!-- /.card-header -->

                            <div class="card-body p-0">
                                <table class="table table-striped" id="datatable">
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nama</th>
                                        <th>Ruangan</th>
                                        <th>Barang</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    @foreach($pengaduan as $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->ruangan }}</td>
                                        <td>{{ $value->barang }}</td>
                                        <td>{{ $value->keterangan }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td>{{ $value->tindakan }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('pengaduan.edit', $value->pengaduan_id) }}" class="btn btn-primary btn-sm">Lihat</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $pengaduan->links() }}
                                </ul>
                            </div>
                        </div><!-- /.card -->
                    </div><!---/.md-6 -->
                </div>
                <!-- end table barang -->

            </div><!-- /.container-fluid -->
        </div> <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
@include('master/footer')
<!-- ./. Footer -->

</div><!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

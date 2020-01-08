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

    <title>Admin Aduin | Pengadu</title>

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
<!-- ./. Sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
            @yield('content')
            <!-- table akun-->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title">Tabel Pengadu</h3>
                                    </div>
                                    <div class="col-md-6" style="margin-bottom: 10px; padding-left: 80px;">
                                        <!-- Search -->
                                        <form class="form-inline ml-3" action="{{ route('pengadu.search') }}"
                                              method="GET">
                                            <div class="input-group input-group-sm">
                                                <input class="form-control form-control-navbar" type="search"
                                                       placeholder="Cari nim" name="search"
                                                       style="background-color:#F2F4F6; border:none; margin-left:50px;">
                                                <div class="input-group-append">
                                                    <button class="btn btn-navbar" type="submit"
                                                            style="background-color:#F2F4F6;">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-5">
                                        <a href="{{route ('pengadu.register') }}" class="btn btn-primary btn-sm float-right">Tambah
                                            Pengadu</a>
                                    </div>
                                </div>

                            </div><!-- /.card-header -->

                            <div class="card-body p-0">
                                <table class="table table-striped" id="datatable">
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>

                                    @foreach($pengadu as $value)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $value->nim }}</td>
                                            <td>{{ $value->nama }}</td>
                                            <td>{{ $value->prodi }}</td>
                                            <td>{{ $value->status }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('pengadu.edit', $value->id) }}" class="btn btn-success btn-sm edit">Edit</a>

                                                <a href="javascript:void(0)"
                                                   onclick="$(this).parent().find('form').submit()"
                                                   class="btn btn-danger btn-sm">Aktifasi</a>
                                                <form action="{{ route('pengadu.aktifasi', $value->id) }}">
                                                    {{method_field('patch')}}
                                                    {{csrf_field()}}

                                                    <input type="hidden" class="form-control" id="status" name="status" value="Aktif">
                                                </form>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $pengadu->links() }}
                                </ul>
                            </div>
                        </div><!-- /.card -->
                    </div><!---/.md-8-->
                    <div class="col-md-2"></div>
                </div>
                <!-- end table barang -->

            </div><!-- /.container-fluid -->
        </div> <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



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
  
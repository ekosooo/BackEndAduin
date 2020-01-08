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

    <title>Admin Aduin | Admin</title>

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
                                <h3 class="card-title">Tabel Admin
                                    <a href="{{route ('admin.register') }}" class="btn btn-primary btn-sm float-right">Tambah
                                        Admin</a>
                                </h3>
                            </div><!-- /.card-header -->

                            <div class="card-body p-0">
                                <table class="table table-striped" id="datatable">
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nip</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Role</th>
                                        <th class="text-center">Action</th>
                                    </tr>

                                    @foreach($admin as $value)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $value->nip }}</td>
                                            <td>{{ $value->nama }}</td>
                                            <td>{{ $value->jabatan }}</td>
                                            <td>{{ $value->role }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.edit', $value->user_id) }}" class="btn btn-success btn-sm edit">Edit</a>

                                                <a href="javascript:void(0)"
                                                   onclick="$(this).parent().find('form').submit()"
                                                   class="btn btn-danger btn-sm">DELETE</a>
                                                <form action={{route('admin.destroy', $value->user_id) }} method="POST">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $admin->links() }}
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
  
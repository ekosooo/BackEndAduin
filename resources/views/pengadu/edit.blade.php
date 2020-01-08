<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Aduin | Edit</title>

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

                {{-- Row Input Register--}}
                <div class="row">
                    <div class="col-md-3"></div>
                    {{-- Form Input Register--}}
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Pengadu</h3>
                            </div>
                            <!-- /.card-header -->
                            @foreach($data as $value)
                            <!-- form start -->
                            <form action="{{ route('pengadu.update', $value->id) }}" method="POST">
                                {{method_field('patch')}}
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nim / Nip</label>
                                        <input type="text" class="form-control" id="nim" name="nim"
                                               placeholder="Enter nim" value="{{ $value->nim  }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                               placeholder="Enter nama" value="{{ $value->nama  }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Prodi</label>
                                        <select class="form-control" name="prodi">
                                            <option {{old('prodi',$value->prodi)=="Teknik Elektronika"? 'selected':''}} value="Teknik Elektronika">Teknik Elektronika</option>
                                            <option {{old('prodi',$value->prodi)=="Teknik Listrik"? 'selected':''}} value="Teknik Listrik">Teknik Listrik</option>
                                            <option {{old('prodi',$value->prodi)=="Teknik Informatika"? 'selected':''}} value="Teknik Informatika">Teknik Informatika</option>
                                        </select>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputEmail1">Password</label>--}}
{{--                                        <input type="password" class="form-control" id="password" name="password"--}}
{{--                                               placeholder="Enter password" value="{{ $value->password  }}">--}}
{{--                                    </div>--}}
                                </div>
                                <!-- /.card-body -->
                                @endforeach
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-3"></div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
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
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>


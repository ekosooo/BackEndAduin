<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Aduin | Register</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<div class="hold-transition sidebar-mini">
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
                    <div class="col-md-2"></div>
                    {{-- Form Input Register--}}
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail Pengaduan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <!-- form start -->
                                <div class="col-md-7">
                                    @foreach($data as $value)
                                    <form action="{{route('pengaduan.update', $value->pengaduan_id)}}" method="post">
                                        {{method_field('patch')}}
                                        {{csrf_field()}}

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nim / Nip</label>
                                                <input type="text" class="form-control" id="nim" name="nim"
                                                       disabled value="{{ $value->nim }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                       disabled value="{{ $value->nama }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ruangan</label>
                                                <input type="text" class="form-control" id="ruangan" name="ruangan"
                                                       disabled value="{{ $value->ruangan }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Barang</label>
                                                <input type="text" class="form-control" id="barang" name="barang"
                                                       disabled value="{{ $value->barang }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                          rows="3" disabled name="keterangan">{{ $value->keterangan }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Tindakan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                          rows="3" name="tindakan">{{ $value->tindakan }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Status</label>
                                                <select class="form-control" id="status_id" name="status_id">
                                                    @foreach($data1 as $status)
                                                        <option value="{{ $status->id }}" {{ ( $value->status_id == $status->id) ? 'selected' : '' }}> {{ $status->status }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </form>
                                    @endforeach
                                </div>

                                @foreach($data as $value)
                                <div class="col-md-5">
                                    <div class="form-group" style="margin-top: 50px;">
                                        <img src="{{ asset('images/' . $value->gambar) }}"  height="260px" width="260px"/>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-2"></div>
            </div>
            {{--                End Row Input Register--}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->



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


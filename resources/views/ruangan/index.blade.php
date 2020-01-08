<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Aduin | Ruangan</title>

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

            <!-- table barang-->
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6"><h3 class="card-title">Tabel Ruangan</h3></div>
                                    <div class="col-md-6">
                                        <!-- Search -->
                                        <form class="form-inline ml-3" action="{{ route('ruangan.search') }}"
                                              method="GET">
                                            <div class="input-group input-group-sm">
                                                <input class="form-control form-control-navbar" type="search"
                                                       placeholder="Cari Ruangan" name="search"
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
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary btn-sm float-right"
                                                data-toggle="modal" data-target="#tambah-modal"
                                                style="margin-top:10px;">Tambah Ruangan
                                        </button>
                                    </div>
                                </div>
                            </div><!-- /.card-header -->

                            <div class="card-body p-0">
                                <table class="table table-striped" id="datatable">
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Ruangan</th>
                                        <th>Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <!-- ambil data dari database untuk ditampilkan -->
                                    @foreach($ruangan as $value)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $value->ruangan }}</td>
                                            <td>{{ $value->kategori }}</td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-success btn-sm edit" data-toggle="modal"
                                                   data-target="#edit-modal" data-ruangan="{{ $value->ruangan }}"
                                                   data-id="{{ $value->id }}" data-kategori="{{ $value->kategori }}">Edit</a>
                                                <a href="javascript:void(0)"
                                                   onclick="$(this).parent().find('form').submit()"
                                                   class="btn btn-danger btn-sm">DELETE</a>
                                                <form action={{route('ruangan.destroy', $value->id) }} method="POST">
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
                                    {{ $ruangan->links() }}
                                </ul>
                            </div>
                        </div><!-- /.card -->
                    </div><!---/.md-6 -->
                    <div class="col-md-3">
                    </div>
                </div>
                <!-- end table barang -->

            </div><!-- /.container-fluid -->
        </div> <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal   -->
    <!-- Modal Tambah Barang -->
    <div class="modal fade" id="tambah-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('ruangan.store') }}" method="post">
                        {{csrf_field()}}
                        <label>Nama Ruangan</label>
                        <input type="text" class="form-control" name="ruangan" id="ruangan"></input>
                        <label for="exampleFormControlSelect1">Kategori Ruangan</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option>Bengkel</option>
                            <option>LAB</option>
                            <option>Teori</option>
                            <option>Lain-lain</option>
                        </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End Modal Tambah Barang -->

    <!-- Modal Edit Barang -->
    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('ruangan.update', 'test') }}" method="post">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <label>Nama Ruangan</label>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="text" class="form-control" name="ruangan" id="ruangan"></input>
                        <label for="exampleFormControlSelect1">Kategori Ruangan</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option>Bengkel</option>
                            <option>LAB</option>
                            <option>Teori</option>
                            <option>Lain-lain</option>
                        </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End Modal Tambah Barang -->
    <!-- End Modal -->

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>


<script>
    $('#edit-modal').on('show.bs.modal', function (event) {
        console.log('Modal Opened');
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var ruangan = button.data('ruangan')
        var kategori = button.data('kategori')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #ruangan').val(ruangan);
        modal.find('.modal-body #kategori').val(kategori);
    })
</script>
</body>
</html>
			
@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Sapi</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table_sapi" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipe</th>
                                    <th>Status Kesehatan</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sapi as $item)    
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->tipe}}</td>
                                    <td>{{ $item->status_kesehatan}}</td>
                                    <td>Rp. {{ $item->harga_jual}}</td>
                                    <td>{{ $item->harga_beli}}</td>
                                    <td><img class="img-fluid img-thumbnail" src="{{ asset($item->foto) }}" alt="" style="max-width: 100px;"></td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ url('sapi/edit/' . $item->id) }}" class="btn btn-warning mr-1"><i class="right fas fa-pen"></i></a>
                                            <form action="{{ url('sapi/delete/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Are you Sure?')"><i class="right fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
  $(function() {
      $("#table_sapi").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#table_sapi_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
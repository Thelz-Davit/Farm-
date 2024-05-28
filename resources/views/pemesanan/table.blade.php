@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pemesanan</h1>
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
                        <table id="table_pemesanan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No Telp</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>Sapi</th>
                                    <th>Status Pembayaran</th>
                                    <th>Pembayaran</th>
                                    <th>PIC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesan as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_pelanggan }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->alamat_pengiriman }}</td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                                data-target="#modal-default-{{ $item->id_sapi }}" data-id="{{ $item->id_sapi }}">
                                                Detail
                                            </button>
                                        </td>
                                        <td>{{ $item->status_pembayaran }}</td>
                                        <td>{{ $item->pembayaran }}</td>
                                        <td>{{ $item->admin }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ url('pemesanan/edit/' . $item->id) }}"
                                                    class="btn btn-warning mr-1"><i class="right fas fa-pen"></i></a>
                                                <form action="{{ url('pemesanan/delete/' . $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are you Sure?')"><i
                                                            class="right fas fa-trash"></i></button>
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
            @foreach ($sapi as $item)
            <div class="modal fade" id="modal-default-{{$item->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ID SAPI : {{$item->id}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid img-thumbnail mb-2" src="{{ asset($item->foto) }}" alt="" style="max-width: 100px;">
                            <p>Tipe Sapi : {{ $item->tipe }}</p>
                            <p>Status Kesehatan : {{ $item->status_kesehatan }}</p>
                            <p>Harga Jual : {{ $item->harga_jual }}</p>
                            <p>Harga Beli : {{ $item->harga_beli }}</p>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            @endforeach
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
  $(function() {
      $("#table_pemesanan").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#table_pemesanan_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection

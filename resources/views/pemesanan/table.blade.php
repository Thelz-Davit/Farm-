@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Table</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
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
                        <table id="table_pesanan" class="table table-bordered table-striped">
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
                                            {{ $item->id_sapi }}
                                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                                data-target="#modal-default" data-id="{{ $item->id_sapi }}">
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
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        $(document).ready(function() {
            $('#modal-default').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract info from data-* attributes

                // AJAX request to fetch data
                $.ajax({
                    url: '/pemesanan/table/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Populate modal fields with data
                        console.log(data)
                        var modal = $('#modal-default');
                        modal.find('.modal-title').text('Detail for Order ID ' + data.id);
                        modal.find('.modal-body').html(
                            '<p>Nama Pelanggan: ' + data + '</p>' +
                            '<p>Nomor Telepon: ' + data.status_kesehatan + '</p>' +
                            '<p>Alamat Pengiriman: ' + data.harga_jual + '</p>' +
                            '<p>Sapi: ' + data.harga_beli + '</p>' +
                        );
                    },
                    error: function() {
                        alert('Error retrieving data');
                    }
                });
            });
        });
    </script>
@endsection

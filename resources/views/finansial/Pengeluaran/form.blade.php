@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formulir Pengeluaran</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Tambah Informasi Keterangan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="create" method="POST">
                    {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                    <label>Jenis Pengeluaran</label>
                    <select class="form-control" name="jenis_pengeluaran">
                        <option value="" disabled selected>Pilih Jenis Pengeluaran</option>
                        <option value="Pakan">Pakan</option>
                        <option value="Obat">Obat</option>
                        <option value="Utilitas">Utilitas</option>
                        <option value="Perawatan dan Perbaikan">Perawatan dan Perbaikan</option>
                        <option value="Transportasi">Transportasi dan Pengiriman</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan">
                    </div>
                    <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" class="form-control" name="cost" placeholder="Masukan Cost">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
</div>
@endsection
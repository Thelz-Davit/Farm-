@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                <h3 class="card-title">Edit Pengeluaran</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('pengeluaran/edit/'. $pengeluaran->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Jenis Pengeluaran</label>
                        <select class="form-control" name="jenis_pengeluaran">
                            <option value="" disabled selected>Pilih Jenis Pengeluaran</option>
                            <option value="Pakan" {{ $pengeluaran->jenis_pengeluaran == 'Pakan' ? 'selected' : '' }}>Pakan</option>
                            <option value="Obat" {{ $pengeluaran->jenis_pengeluaran == 'Obat' ? 'selected' : '' }}>Obat</option>
                            <option value="Utilitas" {{ $pengeluaran->jenis_pengeluaran == 'Utilitas' ? 'selected' : '' }}>Utilitas</option>
                            <option value="Perawatan dan Perbaikan" {{ $pengeluaran->jenis_pengeluaran == 'Perawatan dan Perbaikan' ? 'selected' : '' }}>Perawatan dan Perbaikan</option>
                            <option value="Transportasi" {{ $pengeluaran->jenis_pengeluaran == 'Transportasi' ? 'selected' : '' }}>Transportasi dan Pengiriman</option>
                            <option value="Lainnya" {{ $pengeluaran->jenis_pengeluaran == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan" value="{{ $pengeluaran->keterangan}}">
                        </div>
                        <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="number" class="form-control" name="cost" placeholder="Masukan Cost" value="{{ $pengeluaran->cost}}">
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
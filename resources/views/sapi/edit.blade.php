@extends('layout')
@section('content')
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
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Edit Sapi</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('sapi/edit/'. $sapi->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tipe Sapi</label>
                      <select class="form-control" name="tipe">
                        <option value="" disabled selected>Pilih Tipe Sapi</option>
                        <option value="Limosin" {{ $sapi->tipe == 'Limosin' ? 'selected' : '' }}>Limosin</option>
                        <option value="Simental" {{ $sapi->tipe == 'Simental' ? 'selected' : '' }}>Simental</option>
                        <option value="Brahman" {{ $sapi->tipe == 'Brahman' ? 'selected' : '' }}>Brahman</option>
                        <option value="Bali"{{ $sapi->tipe == 'Bali' ? 'selected' : '' }}>Bali</option>
                        <option value="Madura"{{ $sapi->tipe == 'Madura' ? 'selected' : '' }}>Madura</option>
                        <option value="Jawa"{{ $sapi->tipe == 'Jawa' ? 'selected' : '' }}>Jawa</option>
                        <option value="Malboro"{{ $sapi->tipe == 'Malboro' ? 'selected' : '' }}>Malboro</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_kesehatan" value="Sehat" {{ $sapi->status_kesehatan == 'Sehat' ? 'checked' : '' }}>
                        <label class="form-check-label">Sehat</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_kesehatan" value="Tidak Sehat" {{ $sapi->status_kesehatan == 'Tidak Sehat' ? 'checked' : '' }}>
                        <label class="form-check-label">Tidak Sehat</label>
                      </div>
                  </div>
                    <div class="form-group">
                      <label for="tipeSapi">Harga Jual</label>
                      <input type="text" class="form-control" name="harga_jual" placeholder="Masukan Tipe Sapi" value="{{ $sapi->harga_jual}}">
                    </div>
                    <div class="form-group">
                      <label for="tipeSapi">Harga Beli</label>
                      <input type="text" class="form-control" name="harga_beli" placeholder="Masukan Tipe Sapi" value="{{ $sapi->harga_beli}}">
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputFile">Foto</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div> --}}
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
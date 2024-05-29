@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Formulir Registrasi Sapi</h1>
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
                        <h3 class="card-title">Tambah Sapi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="create" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tipe Sapi</label>
                                <select class="form-control" name="tipe">
                                    <option value="" disabled selected>Pilih Tipe Sapi</option>
                                    <option value="Limosin">Limosin</option>
                                    <option value="Simental">Simental</option>
                                    <option value="Brahman">Brahman</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Madura">Madura</option>
                                    <option value="Jawa">Jawa</option>
                                    <option value="Malboro">Malboro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_kesehatan" value="Sehat"
                                        checked>
                                    <label class="form-check-label">Sehat</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_kesehatan"
                                        value="Tidak Sehat">
                                    <label class="form-check-label">Tidak Sehat</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_beli">Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual"
                                    placeholder="Masukan Harga Jual">
                            </div>
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="number" class="form-control" name="harga_beli"
                                    placeholder="Masukan Harga Beli">
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="foto" name="foto">
                                        {{-- <label class="" for="foto">Choose file</label> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                    @if (session('success'))
                        <div>
                            <strong>{{ session('success') }}</strong>
                            <img src="{{ asset('img/' . session('foto')) }}" alt="Uploaded Image">
                        </div>
                    @endif

                    @if (session('error'))
                        <div>
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

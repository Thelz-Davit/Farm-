@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pemasukan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pemasukan</li>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Keterangan</th>
                                    <th>Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($something as $item)     --}}
                                <tr>
                                    <td>Debug</td>
                                    {{-- <td>{{ $item->id}}</td>
                                    <td>{{ $item->tipe}}</td>
                                    <td>{{ $item->status_kesehatan}}</td>
                                    <td>{{ $item->harga_jual}}</td>
                                    <td>{{ $item->harga_beli}}</td>
                                    <td>{{ $item->foto}}</td>
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
                                </tr> --}}
                                {{-- @endforeach --}}
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
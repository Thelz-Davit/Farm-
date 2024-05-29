@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Formulir Pemesanan Sapi</h1>
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
                        <h3 class="card-title">Tambah Pemesanan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="create" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan"
                                    placeholder="Masukan Nama Pelanggan">
                            </div>
                            <div class="form-group">
                                <label for="nama_pelanggan">Nomor Telepon</label>
                                <input type="number" class="form-control" name="telp"
                                    placeholder="Masukan Nomor Pelanggan">
                            </div>
                            <div class="form-group">
                                <label for="nama_pelanggan">Alamat Pengiriman</label>
                                <input type="textarea" class="form-control" name="alamat_pengiriman"
                                    placeholder="Masukan Alamat Pengiriman">
                            </div>
                            <div class="form-group">
                                <label>Pilihan Sapi</label>
                                <select class="form-control" name="id_sapi" id=id_sapi>
                                    <option value="" disabled selected>Pilih Tipe Sapi</option>
                                    @foreach ($sapi as $item)
                                        <option value="{{ $item->id }}" data-price="{{ $item->harga_jual }}">
                                            {{ $item->id }} - {{ $item->tipe }} - Rp.{{ $item->harga_jual }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_pembayaran">Jenis Pembayaran</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_pembayaran" value="Tunai"
                                        checked>
                                    <label class="form-check-label">Tunai</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_pembayaran" value="Transfer">
                                    <label class="form-check-label">Transfer</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pembayaran">Pembayaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    {{-- <input type="number" class="form-control" name="pembayaran" id="pembayaran"> --}}
                                    <input type="text" class="form-control" name="formatted_pembayaran" id="pembayaran">
                                    <input type="hidden" name="pembayaran" id="raw_pembayaran">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sisa_pembayaran">Sisa Pembayaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="sisa_pembayaran" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="admin" value="{{ Auth::user()->name }}">
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
    <script>
        const pembayaranInput = document.getElementById('pembayaran');
        const rawPembayaranInput = document.getElementById('raw_pembayaran');
        const sapiSelect = document.getElementById('id_sapi');
        const sisaPembayaranInput = document.getElementById('sisa_pembayaran');

        let hargaJual = 0;

        sapiSelect.addEventListener('change', function() {
            const selectedOption = sapiSelect.options[sapiSelect.selectedIndex];
            hargaJual = parseInt(selectedOption.getAttribute('data-price'));
            updateSisaPembayaran();
        });

        pembayaranInput.addEventListener('input', function(e) {
            // Get the raw value by removing any non-digit characters
            let rawValue = e.target.value.replace(/\D/g, '');

            // Add dots as thousands separators for display purposes
            let formattedValue = rawValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            // let formattedValue = new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(rawValue);

            // Update the visible input value with the formatted value
            e.target.value = formattedValue;

            // Update the hidden input with the raw numeric value
            rawPembayaranInput.value = parseInt(rawValue);
            updateSisaPembayaran();
        });

        function updateSisaPembayaran() {
            let pembayaran = parseInt(rawPembayaranInput.value) || 0;
            let sisaPembayaran = hargaJual - pembayaran;
            sisaPembayaranInput.value = sisaPembayaran.toLocaleString('id-ID');
        }
    </script>
@endsection

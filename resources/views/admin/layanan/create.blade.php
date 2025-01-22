@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Tambah Data Layanan</h3>
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form id="layananForm" action="{{ route('admin.layanan.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="NoBilling">Nomor Billing</label>
                <select name="NoBilling" class="form-control" id="NoBilling" required>
                    <option value="">--PILIH NO BILLING--</option>
                    @foreach($NoBilling as $nbl)
                        <option value="{{ $nbl->NoBilling }}">{{ $nbl->NoBilling }} - {{ $nbl->NamaCust }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="SID">SID</label>
                <input type="text" name="SID" id="SID" class="form-control" value="{{ old('SID') }}" required>
            </div>

            <div class="form-group">
                <label for="ProdName">Nama Produk</label>
                <input type="text" name="ProdName" id="ProdName" class="form-control" value="{{ old('ProdName') }}" required>
            </div>
            
            <div class="form-group">
                <label for="Bandwidth">Bandwidth</label>
                <input type="text" name="Bandwidth" id="Bandwidth" class="form-control" value="{{ old('Bandwidth') }}" required>
            </div>

            <div class="form-group">
                <label for="Satuan">Satuan</label>
                <select name="Satuan" id="Satuan" class="form-control" required>
                    <option value="">--Pilih Satuan--</option>
                    <option value="MBPS" {{ old('Satuan') == 'MBPS' ? 'selected' : '' }}>MBPS</option>
                    <option value="PAKET" {{ old('Satuan') == 'PAKET' ? 'selected' : '' }}>PAKET</option>
                    <option value="UNIT" {{ old('Satuan') == 'UNIT' ? 'selected' : '' }}>UNIT</option>
                    <option value="ORANG" {{ old('Satuan') == 'ORANG' ? 'selected' : '' }}>ORANG</option>
                </select>
            </div>            

            <div class="form-group">
                <label for="Jumlah">Jumlah</label>
                <input type="number" name="Jumlah" id="Jumlah" class="form-control" value="{{ old('Jumlah') }}" required>
            </div>

            <div class="form-group">
                <label for="NilaiLayanan">Nilai Layanan</label>
                <input type="number" name="NilaiLayanan" id="NilaiLayanan" class="form-control" value="{{ old('NilaiLayanan') }}" required>
            </div>

            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <input type="text" name="Deskripsi" id="Deskripsi" class="form-control" value="{{ old('Deskripsi') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const satuanSelect = document.getElementById('Satuan');
                const bandwidthInput = document.getElementById('Bandwidth');

                satuanSelect.addEventListener('change', function () {
                    if (this.value !== 'MBPS') {
                        bandwidthInput.value = '-';
                        bandwidthInput.setAttribute('readonly', true);
                    } else {
                        bandwidthInput.value = '';
                        bandwidthInput.removeAttribute('readonly');
                    }
                });
            });
        </script>
@endsection


@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Tambah Data Layanan</h3>
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.layanan.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="NoBilling">Nomor Billing</label>
                <select name="NoBilling" class="form-control" id="NoBilling" required>
                    <option value="">--PILIH NO BILLING--</option>
                    @foreach($NoBilling as $nbl)
                        <option value="{{ $nbl->NoBilling }}">{{ $nbl->NoBilling }}</option>
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
                <input type="number" name="Bandwidth" id="Bandwidth" class="form-control" value="{{ old('Bandwidth') }}" required>
            </div>

            <div class="form-group">
                <label for="Satuan">Satuan</label>
                <input type="text" name="Satuan" id="Satuan" class="form-control" value="{{ old('Satuan') }}" required>
            </div>

            <div class="form-group">
                <label for="NilaiLayanan">Nilai Layanan</label>
                <input type="number" name="NilaiLayanan" id="NilaiLayanan" class="form-control" value="{{ old('NilaiLayanan') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
@endsection

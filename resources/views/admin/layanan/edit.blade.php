@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Edit Data Layanan</h3>
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.layanan.update', $layanan->SID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="NoBilling">Nomor Billing</label>
                <select name="NoBilling" class="form-control" id="NoBilling" required>
                    <option value="">--PILIH NO BILLING--</option>
                    @foreach($NoBilling as $nbl)
                        <option value="{{ $nbl->NoBilling }}" 
                            @if($nbl->NoBilling == $layanan->NoBilling) selected @endif>
                            {{ $nbl->NoBilling }} - {{ $nbl->NamaCust }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="SID">SID</label>
                <input type="text" name="SID" id="SID" class="form-control" value="{{ old('SID', $layanan->SID) }}" readonly>
            </div>

            <div class="form-group">
                <label for="ProdName">Nama Produk</label>
                <input type="text" name="ProdName" id="ProdName" class="form-control" value="{{ old('ProdName', $layanan->ProdName) }}" required>
            </div>
            
            <div class="form-group">
                <label for="Bandwidth">Bandwidth</label>
                <input type="number" name="Bandwidth" id="Bandwidth" class="form-control" value="{{ old('Bandwidth', $layanan->Bandwidth) }}" required>
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
                <label for="NilaiLayanan">Nilai Layanan</label>
                <input type="number" name="NilaiLayanan" id="NilaiLayanan" class="form-control" value="{{ old('NilaiLayanan', $layanan->NilaiLayanan) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
</div>
@endsection

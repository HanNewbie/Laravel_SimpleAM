@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Tambah Data Kontrak</h3>
        <a href="{{ route('admin.kontrak.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.kontrak.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="NoKontrak">Nomor Kontrak</label>
                <input type="text" name="NoKontrak" id="NoKontrak" class="form-control" value="{{ old('NoKontrak') }}" required>
            </div>
            
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
                <label for="FirstDate">First Date</label>
                <input type="date" name="FirstDate" id="FirstDate" class="form-control" value="{{ old('FirstDate') }}" required>
            </div>

            <div class="form-group">
                <label for="EndDate">End Date</label>
                <input type="date" name="EndDate" id="EndDate" class="form-control" value="{{ old('EndDate') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
@endsection

@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Tambah Data Customer</h3>
        <a href="{{ route('admin.customer.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.customer.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="NamaCust">Nama Customer</label>
                <input type="text" name="NamaCust" id="NamaCust" class="form-control" value="{{ old('NamaCust') }}" required>
            </div>

            <div class="form-group">
                <label for="NoBilling">Nomor Billing</label>
                <input type="text" name="NoBilling" id="NoBilling" class="form-control" value="{{ old('NoBilling') }}" required>
            </div>

            <div class="form-group">
                <label for="NIPNAS">NIPNAS</label>
                <input type="text" name="NIPNAS" id="NIPNAS" class="form-control" value="{{ old('NIPNAS') }}" required>
            </div>
            
            <div class="form-group">
                <label for="AlamatCust">Alamat Customer</label>
                <input type="text" name="AlamatCust" id="AlamatCust" class="form-control" value="{{ old('AlamatCust') }}" required>
            </div>

            <div class="form-group">
                <label for="NamaPIC">Nama PIC</label>
                <input type="text" name="NamaPIC" id="NamaPIC" class="form-control" value="{{ old('NamaPIC') }}" required>
            </div>

            <div class="form-group">
                <label for="NoHPPIC">Nomor HP PIC</label>
                <input type="text" name="NoHPPIC" id="NoHPPIC" class="form-control" value="{{ old('NoHPPIC') }}" required>
            </div>

            <div class="form-group">
                <label for="NIKAM">Pilih NIKAM</label>
                <select name="NIKAM" id="NIKAM" class="form-control" required>
                    <option value="">-- Pilih NIKAM --</option>
                    @foreach($nikamOptions as $option)
                        <option value="{{ $option->NIKAM }}">{{ $option->NamaAM }}</option>
                    @endforeach
                </select>
            </div>            

            <div class="form-group">
                <label for="EmailCust">Email Customer</label>
                <input type="text" name="EmailCust" id="EmailCust" class="form-control" value="{{ old('EmailCust') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
@endsection

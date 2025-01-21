@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Edit Data Customer</h3>
        <a href="{{ route('admin.customer.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.customer.update', $datacustomer->NoBilling) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="NamaCust">Nama datacustomer</label>
                <input type="text" name="NamaCust" id="NamaCust" class="form-control" value="{{ old('NamaCust', $datacustomer->NamaCust) }}" required>
            </div>

            <div class="form-group">
                <label for="NoBilling">Nomor Billing</label>
                <input type="text" name="NoBilling" id="NoBilling" class="form-control" value="{{ old('NoBilling', $datacustomer->NoBilling) }}" required readonly>
            </div>

            <div class="form-group">
                <label for="NIPNAS">NIPNAS</label>
                <input type="text" name="NIPNAS" id="NIPNAS" class="form-control" value="{{ old('NIPNAS', $datacustomer->NIPNAS) }}" required>
            </div>
            
            <div class="form-group">
                <label for="AlamatCust">Alamat datacustomer</label>
                <input type="text" name="AlamatCust" id="AlamatCust" class="form-control" value="{{ old('AlamatCust', $datacustomer->AlamatCust) }}" required>
            </div>

            <div class="form-group">
                <label for="NamaPIC">Nama PIC</label>
                <input type="text" name="NamaPIC" id="NamaPIC" class="form-control" value="{{ old('NamaPIC', $datacustomer->NamaPIC) }}" required>
            </div>

            <div class="form-group">
                <label for="NoHPPIC">Nomor HP PIC</label>
                <input type="text" name="NoHPPIC" id="NoHPPIC" class="form-control" value="{{ old('NoHPPIC', $datacustomer->NoHPPIC) }}" required>
            </div>

            <div class="form-group">
                <label for="NIKAM">Pilih AM</label>
                <select name="NIKAM" id="NIKAM" class="form-control" required>
                    <option value="">-- Pilih AM --</option>
                    @foreach($nikamOptions as $option)
                        <option value="{{ $option->NIKAM }}" {{ old('NIKAM', $datacustomer->NIKAM) == $option->NIKAM ? 'selected' : '' }}>
                            {{ $option->NamaAM }}
                        </option>
                    @endforeach
                </select>
            </div>            

            <div class="form-group">
                <label for="EmailCust">Email data Customer</label>
                <input type="text" name="EmailCust" id="EmailCust" class="form-control" value="{{ old('EmailCust', $datacustomer->EmailCust) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection

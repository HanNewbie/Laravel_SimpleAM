@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Edit Data Manager</h3>
        <a href="{{ route('admin.manager.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.manager.update', $accountmanager->NIKAM) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="NIKAM">NIK AM</label>
                <input type="text" id="NIKAM" class="form-control" value="{{ $accountmanager->NIKAM }}" readonly>
            </div>

            <div class="form-group">
                <label for="NamaAM">Nama</label>
                <input type="text" name="NamaAM" id="NamaAM" class="form-control" value="{{ old('NamaAM', $accountmanager->NamaAM) }}" required>
            </div>

            <div class="form-group">
                <label for="IdSegmen">ID Segmen</label>
                <select name="IdSegmen" id="IdSegmen" class="form-control" required>
                    <option value="1" {{ $accountmanager->IdSegmen == 'DES' ? 'selected' : '' }}>DBS (1)</option>
                    <option value="2" {{ $accountmanager->IdSegmen == 'DBS' ? 'selected' : '' }}>DGS (2)</option>
                    <option value="3" {{ $accountmanager->IdSegmen == 'DGS' ? 'selected' : '' }}>DES (3)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="NoHP">No HP</label>
                <input type="text" name="NoHP" id="NoHP" class="form-control" value="{{ old('NoHP', $accountmanager->NoHP) }}" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email', $accountmanager->Email) }}" required>
            </div>

            <div class="form-group">
                <label for="IdTelegram">ID Telegram</label>
                <input type="text" name="IdTelegram" id="IdTelegram" class="form-control" value="{{ old('IdTelegram', $accountmanager->IdTelegram) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection

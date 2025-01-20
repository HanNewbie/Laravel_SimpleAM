@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Tambah Data Manager</h3>
        <a href="{{ route('admin.manager.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.manager.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="NIKAM">NIKAM</label>
                <input type="text" name="NIKAM" id="NIKAM" class="form-control" value="{{ old('NIKAM') }}" required>
            </div>

            <div class="form-group">
                <label for="NamaAM">Nama</label>
                <input type="text" name="NamaAM" id="NamaAM" class="form-control" value="{{ old('NamaAM') }}" required>
            </div>

            <div class="form-group">
                <label for="IdSegmen">Segmen</label>
                <select name="IdSegmen" class="form-control" id="IdSegmen" required>
                    <option value="">--PILIH SEGMEN--</option>
                    @foreach($segmen as $sgm)
                        <option value="{{ $sgm->IdSegmen }}">{{ $sgm->NamaSegmen }}</option>
                    @endforeach
                </select>
            </div>         

            <div class="form-group">
                <label for="NoHP">No HP</label>
                <input type="text" name="NoHP" id="NoHP" class="form-control" value="{{ old('NoHP') }}" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email') }}" required>
            </div>

            <div class="form-group">
                <label for="IdTelegram">ID Telegram</label>
                <input type="text" name="IdTelegram" id="IdTelegram" class="form-control" value="{{ old('IdTelegram') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
@endsection

@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Dashboard</h3>
        <form action="{{ url()->current() }}" method="GET" class="d-flex align-items-center gap-2">
            <label for="segmen" class="form-label mb-0">Filter Segmen:</label>
            <select name="segmen" id="segmen" class="form-select form-select-sm w-auto">
                <option value="">Semua</option>
                <option value="DBS" {{ request('segmen') == 'DBS' ? 'selected' : '' }}>DBS</option>
                <option value="DGS" {{ request('segmen') == 'DGS' ? 'selected' : '' }}>DGS</option>
                <option value="DES" {{ request('segmen') == 'DES' ? 'selected' : '' }}>DES</option>
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
        </form>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>SEGMEN</th>
                        <th>Nama AM</th>
                        <th>Nama Customer</th>
                        <th>No HP</th>
                        <th>SID</th>
                        <th>NO Billing</th>
                        <th>Layanan</th>
                        <th>Alamat</th>
                        <th>Nama PIC</th>
                        <th>Masa Kontrak</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $dt)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dt->NamaSegmen}}</td>
                            <td>{{$dt->NamaAM}}</td>
                            <td>{{$dt->NamaCust}}</td>
                            <td>{{$dt->NoHP}}</td>
                            <td>{{$dt->SID}}</td>
                            <td>{{$dt->NoBilling}}</td>
                            <td>{{$dt->ProdName}}</td>
                            <td>{{$dt->AlamatCust}}</td>
                            <td>{{$dt->NamaPIC}}</td>
                            <td>{{$dt->FirstDate}} - {{$dt->EndDate}} </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

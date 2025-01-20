@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Layanan</h3>
        {{-- <a href="{{route('admin.cars.create')}}" class="btn btn-primary">Tambah Data</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Billing</th>
                        <th>SID</th>
                        <th>Product Name</th>
                        <th>Bandwith</th>
                        <th>Satuan</th>
                        <th>Nilai Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanan as $lyn)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$lyn->NoBilling}}</td>
                            <td>{{$lyn->SID}}</td>
                            <td>{{$lyn->ProdName}}</td>
                            <td>{{$lyn->Bandwidth}}</td>
                            <td>{{$lyn->Satuan}}</td>
                            <td>{{$lyn->NilaiLayanan}}</td>
                            {{-- <a href="{{route('admin.cars.edit', $car->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <form onclick="return confirm('Yakin dihapus?')" class="d-inline" action="{{route('admin.cars.destroy', $car->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> 
                            </td> --}}
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

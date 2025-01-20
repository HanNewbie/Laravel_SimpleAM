@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Kontrak</h3>
        {{-- <a href="{{route('admin.cars.create')}}" class="btn btn-primary">Tambah Data</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nomor Kontrak</th>
                        <th>Nomor Billing</th>
                        <th>First Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kontrak as $ktk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ktk->Id}}</td>
                            <td>{{$ktk->NoKontrak}}</td>
                            <td>{{$ktk->NoBilling}}</td>
                            <td>{{$ktk->FirstDate}}</td>
                            <td>{{$ktk->EndDate}}</td>
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

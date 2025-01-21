@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Kontrak</h3>
        <a href="{{route('admin.kontrak.create')}}" class="btn btn-primary ms-auto">Tambah Data</a>
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
                        <th>Aksi</th>
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
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.kontrak.edit', $ktk->Id) }}" class="btn btn-warning btn-sm" style="margin-right: 10px;">Edit</a>
                                     <button 
                                            type="button" 
                                            class="btn btn-danger btn-sm delete-button" 
                                            data-id="{{ $ktk->Id }}">Delete</button>
                                     <form 
                                            id="delete-form-{{ $ktk->Id }}" 
                                            action="{{ route('admin.kontrak.destroy', $ktk->Id) }}" 
                                            method="POST" 
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                     </form>
                                </div>
                            </td>

                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const deleteButtons = document.querySelectorAll('.delete-button');
                                    deleteButtons.forEach(button => {
                                        button.addEventListener('click', function () {
                                            const orderId = this.getAttribute('data-id');
                                            Swal.fire({
                                                title: "Yakin dihapus?",
                                                text: "Data yang dihapus tidak dapat dikembalikan!",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Ya, Hapus!",
                                                cancelButtonText: "Batal"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.getElementById(`delete-form-${orderId}`).submit();
                                                    Swal.fire({
                                                        title: "Berhasil Dihapus!",
                                                        text: "Data Berhasil Dihapus",
                                                        icon: "success"
                                                    });
                                                }
                                            });
                                        });
                                    });
                                });
                            </script>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                    @endforelse
                </tbody>
                <style>
                    .table-bordered tbody tr:nth-child(odd) {
                        background-color: #f3f3f3; /* Warna abu muda */
                    }
                
                    .table-bordered tbody tr:nth-child(even) {
                        background-color: #ffffff; /* Warna putih */
                    }
                </style>
            </table>
        </div>
    </div>
</div>
@endsection

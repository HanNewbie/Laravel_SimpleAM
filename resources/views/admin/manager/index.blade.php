@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Manager</h3>
        <a href="{{route('admin.manager.create')}}" class="btn btn-primary ms-auto">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIKAM</th>
                        <th>Nama</th>
                        <th>SEGMEN</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>ID Telegram</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($accountmanager as $mng)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$mng->NIKAM}}</td>
                            <td>{{$mng->NamaAM}}</td>
                            <td>{{$mng->segmen->NamaSegmen}}</td>
                            <td>{{$mng->NoHP}}</td>
                            <td>{{$mng->Email}}</td>
                            <td>{{$mng->IdTelegram}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.manager.edit', $mng->NIKAM) }}" class="btn btn-warning btn-sm" style="margin-right: 10px;">Edit</a>
                                     <button 
                                            type="button" 
                                            class="btn btn-danger btn-sm delete-button" 
                                            data-id="{{ $mng->NIKAM }}">Delete</button>
                                     <form 
                                            id="delete-form-{{ $mng->NIKAM }}" 
                                            action="{{ route('admin.manager.destroy', $mng->NIKAM) }}" 
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
                                <td colspan="10" class="text-center">Data Kosong</td>
                            </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

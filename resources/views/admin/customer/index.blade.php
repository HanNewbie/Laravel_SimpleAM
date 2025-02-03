@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Customer</h3>
        <a href="{{route('admin.customer.create')}}" class="btn btn-primary ms-auto">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>No Billing</th>
                        <th>NIPNAS</th>
                        <th>Alamat Customer</th>
                        <th>Nama PIC</th>
                        <th>No HP PIC</th>
                        <th>Email Customer</th>
                        <th>Nama AM</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($datacustomer as $cust)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cust->NamaCust}}</td>
                            <td>{{$cust->NoBilling}}</td>
                            <td>{{$cust->NIPNAS}}</td>
                            <td>{{$cust->AlamatCust}}</td>
                            <td>{{$cust->NamaPIC}}</td>
                            <td>{{$cust->NoHPPIC}}</td>
                            <td>{{$cust->EmailCust}}</td>
                            <td>{{$cust->accountManager->NamaAM ?? 'NULL' }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('admin.customer.edit', $cust->NoBilling) }}" class="btn btn-warning btn-sm" style="margin-right: 10px;">Edit</a>
                                     <button 
                                            type="button" 
                                            class="btn btn-danger btn-sm delete-button" 
                                            data-id="{{ $cust->NoBilling }}">Delete</button>
                                     <form 
                                            id="delete-form-{{ $cust->NoBilling }}" 
                                            action="{{ route('admin.customer.destroy', $cust->NoBilling) }}" 
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

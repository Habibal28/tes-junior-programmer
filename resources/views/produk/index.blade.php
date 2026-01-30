@extends('layouts.app')

@section('title', 'Manajemen Produk')

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<!-- Styling biar nyatu sama Tailwind / Stisla -->
<style>
    table.dataTable {
        border-collapse: collapse !important;
        font-size: 0.875rem;
    }

    table.dataTable thead th {
        background-color: #f8fafc;
        color: #64748b;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        padding: 14px 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    table.dataTable tbody td {
        padding: 14px 16px;
        border-bottom: 1px solid #f1f5f9;
    }

    table.dataTable tbody tr:hover {
        background-color: #f9fafb;
    }

    .dataTables_filter input {
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 6px 10px;
        font-size: 0.875rem;
    }

    .dataTables_paginate .paginate_button {
        padding: 6px 12px;
        margin: 0 2px;
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
    }

    .dataTables_paginate .paginate_button.current {
        background: #137fec !important;
        color: white !important;
        border-color: #137fec;
    }

    .dataTables_info {
        font-size: 0.75rem;
        color: #64748b;
    }
</style>
@endpush

@section('content')

<!-- Breadcrumb & Heading -->
<div class="mb-8">
    <div class="flex items-center text-sm text-slate-500 mb-3">
        <span>Dashboard</span>
        <span class="mx-2">/</span>
        <span class="text-slate-900 font-semibold">Manajemen Produk</span>
    </div>

    <h1 class="text-2xl font-bold text-slate-900">
        Daftar Semua Produk
    </h1>
</div>

<!-- Card -->
<div class="bg-white rounded-xl shadow border border-slate-100 overflow-hidden">

    <!-- Toolbar -->
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <p class="font-semibold text-slate-700">
            Data Produk
        </p>

        <a href="{{ route('produk.create') }}"
            class="bg-primary text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-600 transition">
            Tambah Produk
        </a>
    </div>

    <!-- Table -->
    <div class="p-6">
        <table id="produkTable" class="display w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($produk as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td class="font-semibold text-slate-900">
                        {{ $item->nama_produk }}
                    </td>

                    <td>{{ $item->kategori->nama_kategori }}</td>

                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

                    <td>{{ ucfirst($item->status->nama_status) }}</td>

                    <td>
                        <div class="flex items-center gap-2">

                            <a href="{{ route('produk.edit', $item->id_produk) }}" class="inline-flex px-3 py-1.5 rounded-md text-sm font-semibold
                                      text-blue-600 bg-blue-50
                                      hover:bg-blue-600 hover:text-white transition">
                                Edit
                            </a>

                            <button type="button" class="btn-delete inline-flex px-3 py-1.5 rounded-md text-sm font-semibold
                                           text-red-600 bg-red-50
                                           hover:bg-red-600 hover:text-white transition"
                                data-action="{{ route('produk.destroy', $item->id_produk) }}">
                                Hapus
                            </button>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {

    $('#produkTable').DataTable({
        pageLength: 10,
        lengthChange: false,
        ordering: true,
        language: {
            search: "Cari:",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            },
            emptyTable: "Belum ada data produk"
        }
    });

    $(document).on('click', '.btn-delete', function () {
        const actionUrl = $(this).data('action');

        Swal.fire({
            title: 'Yakin hapus produk?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('delete-form');
                form.action = actionUrl;
                form.submit();
            }
        });
    });

});
</script>
@endpush
@extends('layouts.app')

@section('title', 'Dashboard - Produk Bisa Dijual')

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<style>
    /* DataTables base */
    table.dataTable {
        border-collapse: collapse !important;
        width: 100%;
        font-size: 0.875rem;
    }

    table.dataTable thead th {
        background-color: #f9fafb;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        padding: 12px 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    table.dataTable tbody td {
        padding: 14px 16px;
        border-bottom: 1px solid #f1f5f9;
    }

    table.dataTable tbody tr:hover {
        background-color: #f9fafb;
    }

    /* Search */
    .dataTables_filter input {
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        padding: 6px 10px;
        margin-left: 6px;
    }

    /* Pagination */
    .dataTables_paginate .paginate_button {
        padding: 6px 10px;
        margin: 0 2px;
        border-radius: 0.375rem;
        border: 1px solid #e5e7eb;
        color: #374151 !important;
    }

    .dataTables_paginate .paginate_button.current {
        background: #6777ef !important;
        color: white !important;
        border-color: #6777ef;
    }

    .dataTables_paginate .paginate_button:hover {
        background: #eef2ff !important;
        color: #1f2937 !important;
    }

    /* Info text */
    .dataTables_info {
        font-size: 0.75rem;
        color: #6b7280;
    }
</style>

@endpush

@section('content')

<div class="flex items-center gap-2 mb-4">
    <span class="text-primary text-sm font-medium">
        Dashboard
    </span>
    <span class="text-gray-400 text-sm">/</span>
    <span class="text-gray-500 text-sm font-medium">
        Produk Bisa Dijual
    </span>
</div>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">
        Produk Bisa Dijual
    </h1>
    <p class="text-gray-500 text-sm mt-1">
        Daftar produk yang saat ini aktif dan tersedia untuk dijual
    </p>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">

    <div class="flex justify-between items-center mb-4">
        <h3 class="font-bold text-gray-800">
            List Produk Aktif
        </h3>

        <a href="{{ route('produk.index') }}" class="text-sm font-semibold text-primary hover:underline">
            Kelola Produk
        </a>
    </div>

    <table id="produkDashboardTable" class="display w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produk as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->kategori->nama_kategori }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
            $('#produkDashboardTable').DataTable({
                pageLength: 10,
                lengthChange: false,
                ordering: true,
                language: {
                    search: "Cari:",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    emptyTable: "Tidak ada produk yang bisa dijual"
                }
            });
        });
</script>
@endpush
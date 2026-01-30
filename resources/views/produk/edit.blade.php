@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<!-- Breadcrumb -->
<div class="mb-6">
    <div class="flex items-center text-sm text-slate-500 mb-2">
        <a href="{{ route('produk.index') }}" class="hover:text-primary">
            Manajemen Produk
        </a>
        <span class="mx-2">/</span>
        <span class="text-slate-900 font-semibold">
            Edit Produk
        </span>
    </div>

    <h1 class="text-2xl font-bold text-slate-900">
        Edit Produk
    </h1>
    <p class="text-sm text-slate-500 mt-1">
        Perbarui data produk di bawah ini
    </p>
</div>

<!-- Card -->
<div class="bg-white rounded-xl shadow-sm border border-slate-200 max-w-3xl">

    <!-- Header -->
    <div class="border-b border-slate-100 px-8 py-6">
        <h2 class="text-lg font-bold text-slate-900">
            Form Edit Produk
        </h2>
        <p class="text-sm text-slate-500 mt-1">
            Pastikan perubahan data sudah benar
        </p>
    </div>

    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" class="p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">
                Nama Produk <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="w-full h-11 rounded-lg border border-slate-300 px-4
                          focus:ring-2 focus:ring-primary/20 focus:border-primary
                          @error('nama_produk') border-red-500 @enderror" placeholder="Contoh: iPhone 15 Pro">
            @error('nama_produk')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Harga <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-slate-300 bg-slate-50 text-slate-500 text-sm">
                        Rp
                    </span>
                    <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" class="w-full h-11 rounded-r-lg border border-slate-300 px-4
                                  focus:ring-2 focus:ring-primary/20 focus:border-primary
                                  @error('harga') border-red-500 @enderror" placeholder="0">
                </div>
                @error('harga')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Kategori <span class="text-red-500">*</span>
                </label>
                <select name="kategori_id" class="w-full h-11 rounded-lg border border-slate-300 px-4
                               focus:ring-2 focus:ring-primary/20 focus:border-primary
                               @error('kategori_id') border-red-500 @enderror">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $item)
                    <option value="{{ $item->id_kategori }}" {{ old('kategori_id', $produk->kategori_id) ==
                        $item->id_kategori ?
                        'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                    @endforeach
                </select>
                @error('kategori_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-1">
                Status <span class="text-red-500">*</span>
            </label>
            <select name="status_id" class="w-full h-11 rounded-lg border border-slate-300 px-4
                           focus:ring-2 focus:ring-primary/20 focus:border-primary
                           @error('status_id') border-red-500 @enderror">
                <option value="">Pilih Status</option>
                @foreach ($status as $item)
                <option value="{{ $item->id_status }}" {{ old('status_id', $produk->status_id) == $item->id_status ?
                    'selected' : ''
                    }}>
                    {{ ucfirst($item->nama_status) }}
                </option>
                @endforeach
            </select>
            @error('status_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-slate-100">
            <a href="{{ route('produk.index') }}" class="h-11 px-6 flex items-center rounded-lg border border-slate-300
                      text-slate-600 font-semibold hover:bg-slate-50 transition">
                Batal
            </a>

            <button type="submit" class="h-11 px-8 rounded-lg bg-primary text-white font-bold
                           hover:bg-primary/90 transition">
                Update Produk
            </button>
        </div>

    </form>
</div>

@endsection
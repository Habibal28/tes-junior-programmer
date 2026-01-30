<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = Produk::with(['kategori', 'status'])
            ->whereHas('status', function ($q) {
                $q->where('status.nama_status', 'bisa dijual');
            })
            ->orderBy('nama_produk')
            ->get();

        return view('dashboard', compact('produk'));
    }
}
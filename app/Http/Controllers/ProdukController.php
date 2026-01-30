<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
   
    public function index()
    {
        $produk = Produk::with(['kategori', 'status'])
            ->orderBy('nama_produk')
            ->get();

        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $status   = Status::orderBy('nama_status')->get();

        return view('produk.create', compact('kategori', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'status_id'   => 'required|exists:status,id_status',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'kategori_id' => $request->kategori_id,
            'status_id'   => $request->status_id,
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk   = Produk::findOrFail($id);
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $status   = Status::orderBy('nama_status')->get();

        return view('produk.edit', compact('produk', 'kategori', 'status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'status_id'   => 'required|exists:status,id_status',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'kategori_id' => $request->kategori_id,
            'status_id'   => $request->status_id,
        ]);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
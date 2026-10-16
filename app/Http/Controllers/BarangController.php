<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Menampilkan seluruh daftar inventaris barang
     */
    public function index(Request $request)
    {
        $kataKunci = $request->query('search');

        $stokBarang = Product::with('category')
            ->when($kataKunci, function ($query, $kataKunci) {
                return $query->where('name', 'like', "%{$kataKunci}%");
            })
            ->paginate(5);

        return view('products.index', compact('stokBarang'));
    }

    /**
     * Menampilkan formulir tambah data barang
     */
    public function create()
    {
        $kategoriList = Category::all();
        return view('products.create', compact('kategoriList'));
    }

    /**
     * Menyimpan data barang baru ke basis data
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ]);

        Product::create($validasi);

        return redirect()->route('inventaris.index')
            ->with('success', 'Data barang berhasil ditambahkan ke sistem.');
    }

    /**
     * Menampilkan formulir ubah data barang
     */
    public function edit(Product $inventari)
    {
        $kategoriList = Category::all();
        return view('products.edit', [
            'product'      => $inventari,
            'kategoriList' => $kategoriList,
        ]);
    }

    /**
     * Memperbarui data barang yang tersimpan
     */
    public function update(Request $request, Product $inventari)
    {
        $validasi = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ]);

        $inventari->update($validasi);

        return redirect()->route('inventaris.index')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Menghapus data barang dari inventaris
     */
    public function destroy(Product $inventari)
    {
        $inventari->delete();

        return redirect()->route('inventaris.index')
            ->with('success', 'Data barang berhasil dihapus.');
    }
}
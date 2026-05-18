<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeShop;

class CoffeeShopController extends Controller
{
    // =========================
    // 👤 USER (HOME)
    // =========================
    public function userIndex(Request $request)
    {
        $query = CoffeeShop::query();

        // SEARCH
        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // FILTER KATEGORI
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $coffeeShops = $query->latest()->get();

        return view('user.home', compact('coffeeShops'));
    }

    // =========================
    // 👨‍💼 ADMIN CRUD
    // =========================

    // 📄 LIST DATA
    public function index()
    {
        $coffeeShops = CoffeeShop::latest()->get();

        return view('admin.coffee.index', compact('coffeeShops'));
    }

    // ➕ FORM TAMBAH
    public function create()
    {
        return view('admin.coffee.create');
    }

    // 💾 SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'harga_min' => 'required|numeric',
            'harga_max' => 'required|numeric',
            'kategori' => 'required',
            'suasana' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'menu_link' => 'nullable|url',
            'sosmed_instagram' => 'nullable|url',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        // UPLOAD FOTO
        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('coffee', 'public');
        }

        // SIMPAN DATABASE
        CoffeeShop::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'harga_min' => $request->harga_min,
            'harga_max' => $request->harga_max,
            'kategori' => $request->kategori,
            'suasana' => $request->suasana,
            'foto' => $foto,
            'menu_link' => $request->menu_link,
            'sosmed_instagram' => $request->sosmed_instagram,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()
            ->route('coffee.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // ✏️ FORM EDIT
    public function edit($id)
    {
        $coffee = CoffeeShop::findOrFail($id);

        return view('admin.coffee.edit', compact('coffee'));
    }

    // 🔄 UPDATE DATA
    public function update(Request $request, $id)
    {
        $coffee = CoffeeShop::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'harga_min' => 'required|numeric',
            'harga_max' => 'required|numeric',
            'kategori' => 'required',
            'suasana' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'menu_link' => 'nullable|url',
            'sosmed_instagram' => 'nullable|url',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        // FOTO LAMA
        $foto = $coffee->foto;

        // UPDATE FOTO BARU
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('coffee', 'public');
        }

        // UPDATE DATABASE
        $coffee->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'harga_min' => $request->harga_min,
            'harga_max' => $request->harga_max,
            'kategori' => $request->kategori,
            'suasana' => $request->suasana,
            'foto' => $foto,
            'menu_link' => $request->menu_link,
            'sosmed_instagram' => $request->sosmed_instagram,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()
            ->route('coffee.index')
            ->with('success', 'Data berhasil diupdate');
    }

    // 🗑️ DELETE
    public function destroy($id)
    {
        $coffee = CoffeeShop::findOrFail($id);

        $coffee->delete();

        return redirect()
            ->route('coffee.index')
            ->with('success', 'Data berhasil dihapus');
    }

    // 🔍 DETAIL USER
    public function show($id)
    {
        $coffee = CoffeeShop::with('reviews.user')->findOrFail($id);

        return view('user.detail', compact('coffee'));
    }
}
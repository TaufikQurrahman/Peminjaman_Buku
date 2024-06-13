<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    //index
    public function index()
    {
        $pinjam = Pinjam::paginate(10);
        return view('pages.pinjam.index', compact('pinjam'));
    }

    //create
    public function create()
    {
        $buku = Buku::all();
        $user = User::all();
        return view('pages.pinjam.create', compact('buku','user'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required', 
            'id_user' => 'required', 
            'tanggal_peminjaman' => 'required', 
            'status_peminjaman' => 'required', 
        ]);

        Pinjam::create([
            'id_buku' => $request->id_buku,
            'id_user' => $request->id_user,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'status_peminjaman' => $request->status_peminjaman,
        ]);

        return redirect()->route('pinjam.index')->with('success', 'Data Peminjaman created successfully');
    }

    //edit
    public function edit(Pinjam $pinjam)
    {
        $buku = Buku::all();
        $user = User::all();
        return view('pages.pinjam.edit', compact('pinjam','buku','user'));
    }

    //update
    public function update(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'id_buku' => 'required', 
            'id_user' => 'required', 
            'tanggal_peminjaman' => 'required', 
            'tanggal_pengembalian' => 'required', 
            'status_peminjaman' => 'required', 
        ]);

        $pinjam->update([
            'id_buku' => $request->id_buku,
            'id_user' => $request->id_user,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status_peminjaman' => $request->status_peminjaman,
        ]);

        return redirect()->route('pinjam.index')->with('success', 'Data Peminjaman updated successfully');
    }

    //destroy
    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjam.index')->with('success', 'Data Peminjaman deleted successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BukuController extends Controller
{
    //index buku
    public function index()
    {
        $buku = Buku::paginate(10);
        return view('pages.buku.index', compact('buku'));
    }

    //create
    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.buku.create', compact('kategori'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 
            'penulis' => 'required', 
            'jenis_buku' => 'required', 
            'tahun_terbit' => 'required', 
        ]);

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jenis_buku' => $request->jenis_buku,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku created successfully');
    }

    //edit
    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('pages.buku.edit', compact('buku','kategori'));
    }

    //update
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required', 
            'penulis' => 'required', 
            'jenis_buku' => 'required', 
            'tahun_terbit' => 'required', 
        ]);

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jenis_buku' => $request->jenis_buku,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku updated successfully');
    }

    //destroy
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku deleted successfully');
    }
}
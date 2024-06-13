<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KategoriController extends Controller
{
    //index
    public function index()
    {
        //search by name, pagination 10
        $kategori = Kategori::where('kategori', 'like', '%' . request('kategori') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        // $kategori = Kategori::all();
        return view('pages.kategori.index', compact('kategori'));
    }

    //create
    public function create()
    {
        return view('pages.kategori.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        Kategori::create([
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully');
    }

    //edit
    public function edit(Kategori $kategori)
    {
        return view('pages.kategori.edit', compact('kategori'));
    }

    //update
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        $kategori->update([
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully');
    }

    //destroy
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully');
    }
}

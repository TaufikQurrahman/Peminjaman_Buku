<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;

class HomeController extends Controller
{
    //index
    public function index()
    {
        $pinjam = Pinjam::where('id_user', auth()->user()->id)
        ->orderBy('id', 'desc')
        ->paginate(10);
        $count = $this->hitungBukuYangDipinjam();  

        return view('pages.dashboard', compact('pinjam','count'));
    }

    public function hitungBukuYangDipinjam()
    {
        $count = Pinjam::where('status_peminjaman', 'Masih Di Pinjam')->count();

        return $count;
    }
}
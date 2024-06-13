<?php
use Illuminate\Support\Facades\Auth;
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}"><i class="fa-solid fa-book" style="color: #183153;"></i> Pinjam Buku </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item ">
                <a href="{{ route('kategori.index') }}" class="nav-link ">
                    <i class="fa-solid fa-layer-group" style="color: #183153;"></i><span>Kategori Buku</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('buku.index') }}" class="nav-link ">
                    <i class="fa-solid fa-database" style="color: #183153;"></i><span>Master Buku</span></a>
            </li>
            <?php if( Auth::user()->role == "admin") {?>
            <li class="nav-item ">
                <a href="{{ route('pinjam.index') }}" class="nav-link ">
                    <i class="fa-solid fa-hand-holding-hand" style="color: #183153;"></i><span>Data Peminjaman
                    </span></a>
            </li>
            <?php } ?>
    </aside>
</div>
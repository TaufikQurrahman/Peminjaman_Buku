@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Peminjaman</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Data Peminjaman</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Peminjaman</h2>
            <div class="card">
                <form action="{{ route('pinjam.store') }}" method="POST">
                    @csrf
                    <!-- CSRF token for security -->
                    <div class="card-header">
                        <h4>Tambah Data Peminjaman Buku</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <select name="id_user" class="form-control @error('id_user') is-invalid @enderror">
                                <option value="">Pilih User</option>
                                @foreach ($user as $i_user)
                                <option value="{{ $i_user->id }}">{{ $i_user->name }}</option>
                                @endforeach
                            </select>
                            @error('id_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="id_buku" class="form-control @error('id_buku') is-invalid @enderror">
                                <option value="">Pilih Buku</option>
                                @foreach ($buku as $i_buku)
                                <option value="{{ $i_buku->id }}">{{ $i_buku->judul }}</option>
                                @endforeach
                            </select>
                            @error('id_buku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Peminjaman</label>
                            <input type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror"
                                name="tanggal_peminjaman">
                            @error('tanggal_peminjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pengembalian</label>
                            <input type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                                name="tanggal_pengembalian">
                            @error('tanggal_pengembalian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status Peminjaman</label>
                            <select name="status_peminjaman"
                                class="form-control @error('status_peminjaman') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="Masih DI Pinjam">Masih DI Pinjam</option>
                                <option value="Sudah Di Kembalikan">Sudah Di Kembalikan</option>
                            </select>
                            @error('status_peminjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
@endpush
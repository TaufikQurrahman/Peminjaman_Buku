@extends('layouts.app')

@section('title', 'Edit User')

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
                <h1>Advanced Forms</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kategori</h2>
                <div class="card">
                    <form action="{{ route('pinjam.update', $pinjam->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Spoof the form method as PUT -->
                        <div class="card-header">
                            <h4>Update Data Peminjaman Buku</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Peminjam</label>
                                <select name="id_user" class="form-control @error('id_user') is-invalid @enderror">
                                    <option value="">Pilih User</option>
                                    @foreach ($user as $i_user)
                                        <option value="{{ $i_user->id }}"
                                            {{ $i_user->id == old('id_user', $pinjam->id_user) ? 'selected' : '' }}>
                                            {{ $i_user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- Prefill with existing value -->
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
                                        <option value="{{ $i_buku->id }}"
                                            {{ $i_buku->id == old('id_buku', $pinjam->id_buku) ? 'selected' : '' }}>
                                            {{ $i_buku->judul }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- Prefill with existing value -->
                                @error('id_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Peminjaman</label>
                                <input type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror"
                                    name="tanggal_peminjaman"
                                    value="{{ old('tanggal_peminjaman', $pinjam->tanggal_peminjaman) }}">
                                <!-- Prefill with existing value -->
                                @error('tanggal_peminjaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pengembalian</label>
                                <input type="date"
                                    class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                                    name="tanggal_pengembalian"
                                    value="{{ old('tanggal_pengembalian', $pinjam->tanggal_pengembalian) }}">
                                <!-- Prefill with existing value -->
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
                                    <option value="Masih DI Pinjam"
                                        {{ 'Masih DI Pinjam' == old('status_peminjaman', $pinjam->status_peminjaman) ? 'selected' : '' }}>
                                        Masih DI Pinjam
                                    </option>
                                    <option value="Sudah Di Kembalikan"
                                        {{ 'Sudah Di Kembalikan' == old('status_peminjaman', $pinjam->status_peminjaman) ? 'selected' : '' }}>
                                        Sudah Di Kembalikan
                                    </option>
                                </select>

                                <!-- Prefill with existing value -->
                                @error('status_peminjaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush

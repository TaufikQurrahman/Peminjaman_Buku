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
            <h1>Form Edit Buku</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Master Buku</h2>



            <div class="card">
                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Spoof the form method as PUT -->
                    <div class="card-header">
                        <h4>Update Buku</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                value="{{ old('judul', $buku->judul) }}">
                            <!-- Prefill with existing value -->
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori Buku</label>
                            <select name="jenis_buku" class="form-control @error('jenis_buku') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kat)
                                <option value="{{ $kat->id }}"
                                    {{ $kat->id == old('jenis_buku', $buku->jenis_buku) ? 'selected' : '' }}>
                                    {{ $kat->kategori }}
                                </option>
                                @endforeach
                            </select>
                            @error('jenis_buku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Penulis Buku</label>
                            <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                                name="penulis" value="{{ old('penulis', $buku->penulis) }}">
                            <!-- Prefill with existing value -->
                            @error('penulis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="date" class="form-control @error('tahun_terbit') is-invalid @enderror"
                                name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                            <!-- Prefill with existing value -->
                            @error('tahun_terbit')
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
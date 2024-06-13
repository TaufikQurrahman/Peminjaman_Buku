@extends('layouts.app')

@section('title', 'Users')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Peminjaman</h1>
            <div class="section-header-button">
                <a href="{{ route('pinjam.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah
                    Peminjaman</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Data Peminjaman</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <h2 class="section-title">Data Peminjaman</h2>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                                <h4 class="text-custom">All Posts</h4>
                            </div> --}}
                        <div class="card-body">

                            <div class="float-right">
                                <form method="GET" action="{{ route('pinjam.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="name">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>Nama Peminjam</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>Jenis Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($pinjam as $i_pinjam)
                                    {{print_r($i_pinjam)}}
                                    <tr>
                                        <td>{{ $i_pinjam->user->name }}
                                        </td>
                                        <td>{{ $i_pinjam->buku->judul }}
                                        </td>
                                        <td>{{ $i_pinjam->buku->penulis }}
                                        </td>
                                        <td>{{ $i_pinjam->buku->jenis->kategori }}
                                        </td>
                                        <td>{{ $i_pinjam->tanggal_peminjaman }}
                                        </td>
                                        <td>{{ $i_pinjam->tanggal_pengembalian }}
                                        </td>
                                        <td>{{ $i_pinjam->status_peminjaman }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href='{{ route('pinjam.edit', $i_pinjam->id) }}'
                                                    class="btn btn-sm btn-custom btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>

                                                <form action="{{ route('pinjam.destroy', $i_pinjam->id) }}"
                                                    method="POST" class="ml-2">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- @dump($i_pinjam) -->
                                    <!-- Dump data ini -->
                                    @endforeach


                                </table>
                            </div>
                            <div class="float-right">
                                {{ $pinjam->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
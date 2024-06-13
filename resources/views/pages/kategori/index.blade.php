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
            <h1>Kategori Buku</h1>
            <?php if( auth()->user()->role == "admin") {?>
            <div class="section-header-button">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah
                    Kategori</a>
            </div>
            <?php } ?>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kategori Buku</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <h2 class="section-title">Data Kategori</h2>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                                <h4 class="text-custom">All Posts</h4>
                            </div> --}}
                        <div class="card-body">

                            <div class="float-right">
                                <form method="GET" action="{{ route('kategori.index') }}">
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

                                        <th>Kategori</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <?php if( auth()->user()->role == "admin") {?>
                                        <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                    @foreach ($kategori as $i_kategori)
                                    <tr>

                                        <td>{{ $i_kategori->kategori }}
                                        </td>
                                        <td>{{ $i_kategori->created_at }}</td>
                                        <td>
                                            {{ $i_kategori->updated_at }}
                                        </td>
                                        <?php if( auth()->user()->role == "admin") {?>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href='{{ route('kategori.edit', $i_kategori->id) }}'
                                                    class="btn btn-sm btn-custom btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>

                                                <form action="{{ route('kategori.destroy', $i_kategori->id) }}"
                                                    method="POST" class="ml-2">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    @endforeach


                                </table>
                            </div>
                            <div class="float-right">
                                {{ $kategori->withQueryString()->links() }}
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
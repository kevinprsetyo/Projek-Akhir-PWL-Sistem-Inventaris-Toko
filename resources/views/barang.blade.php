@extends('layouts.main')
@section('title','Data Barang | Sistem Inventaris')
@section('content')
    <!-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary font-weight-bold mb-0"><i class="bi bi-box-seam"></i> Data Barang</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
        </nav>
    </div> -->

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Stok Barang</h6>
            <a href="barang/addform" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg mr-1"></i> Tambah Barang
            </a>
        </div>
        <div class="card-body">
            @if(session('alert'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-left-success" role="alert">
                <i class="bi bi-check-circle-fill mr-2"></i> <strong>Success!</strong> {{session('alert')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="table-responsive">
                <form method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" name="tanggal_awal" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="tanggal_akhir" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="supplier" class="form-control" placeholder="Supplier">
                        </div>
                        <div class="col-md-3">
                            <select name="stok" class="form-control">
                                <option value="">Semua Stok</option>
                                <option value="habis">Stok Habis</option>
                                <option value="tersedia">Stok Tersedia</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button formaction="/barang/export/pdf" class="btn btn-danger btn-sm">
                            Export PDF
                        </button>
                        <button formaction="/barang/export/excel" class="btn btn-success btn-sm">
                            Export Excel
                        </button>
                    </div>
                </form>
                <table id="example" class="table table-hover table-bordered" style="width:100%;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th>Nama Barang</th>
                            <th width="10%">Stok</th>
                            <th width="15%">Harga</th>
                            <th>Supplier</th>
                            <th class="text-center">Poster</th>
                            <th class="text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($br as $idx => $m)
                        <tr>
                            <td class="text-center align-middle font-weight-bold">{{$idx+1}}</td>
                            <td class="align-middle text-capitalize">{{$m->namabarang}}</td>
                            <td class="align-middle">
                                <span class="badge badge-{{ $m->stok > 10 ? 'success' : 'danger' }} px-2 py-1">
                                    {{$m->stok}} Unit
                                </span>
                            </td>
                            <td class="align-middle font-weight-bold text-dark">Rp {{ number_format($m->harga, 0, ',', '.') }}</td>
                            <td class="align-middle text-muted">{{$m->supplier}}</td>
                            <td class="text-center align-middle">
                                <div class="p-1 border rounded d-inline-block bg-white">
                                    @if($m->poster)
                                    <img src="{{ asset('storage/' . $m->poster) }}" width="60" height="60" alt="{{ $m->namabarang }}" class="rounded" style="object-fit: cover;">
                                    @else
                                    <img src="/storage/poster/noimage.jpg" alt="No Image" width="60" height="60" class="rounded" style="object-fit: cover;">
                                    @endif
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group" role="group">
                                    <a href="barang/editForm/{{ $m->id }}" class="btn btn-warning btn-sm text-white" data-toggle="tooltip" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="barang/deleteBarang/{{ $m->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin akan menghapus data ini?')" data-toggle="tooltip" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

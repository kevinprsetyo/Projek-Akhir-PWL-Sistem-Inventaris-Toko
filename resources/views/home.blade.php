@extends('layouts.main')
@section('title','Dashboard | Sistem Inventaris')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron bg-white shadow-sm border-0" style="border-radius: 12px;">
                <h1 class="display-4 text-primary font-weight-bold">
                    <i class="bi bi-house-door-fill"></i> Selamat Datang!
                </h1>
                <p class="lead text-muted">Aplikasi Sistem Informasi Inventaris Barang Toko.</p>
                <hr class="my-4">
                <p>Halo, <strong>{{ Auth::user()->name }}</strong>. Anda login sebagai Admin.</p>
                <div class="mt-4">
                    <a class="btn btn-primary btn-lg shadow-sm" href="/barang" role="button">
                        <i class="bi bi-box-seam"></i> Kelola Barang
                    </a>
                    <a class="btn btn-outline-secondary btn-lg ml-2" href="/users" role="button">
                        <i class="bi bi-people"></i> Kelola User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary"><i class="bi bi-info-circle"></i> Informasi Sistem</h5>
                    <p class="card-text text-muted">
                        Gunakan menu navigasi di sebelah kiri untuk mengakses fitur pengelolaan data barang dan pengguna sistem.
                        Pastikan untuk melakukan backup data secara berkala.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary"><i class="bi bi-shield-check"></i> Status Keamanan</h5>
                    <p class="card-text text-muted">
                        Anda terakhir login pada sesi ini. Jangan lupa untuk <strong>Logout</strong> setelah selesai menggunakan sistem untuk menjaga keamanan data.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
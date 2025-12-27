@extends('layouts.main')
@section('title','Ubah Password | Sistem Inventaris')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-primary font-weight-bold mb-0"><i class="bi bi-shield-lock"></i> Ubah Password</h3>
            </div>

            @if (session('alert'))
                <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill mr-2"></i> <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Formulir Ganti Password</h6>
                </div>
                <div class="card-body">
                    <form action="/save-pass" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="password_lama" class="font-weight-bold">Password Lama</label>
                            <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Verifikasi password saat ini" required>
                        </div>
                        <div class="form-group">
                            <label for="password_baru" class="font-weight-bold">Password Baru</label>
                            <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="Masukkan password baru" required>
                            <small class="text-muted">Minimal 8 karakter disarankan.</small>
                        </div>
                        <div class="form-group mt-4 text-right">
                             <a href="/home" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-circle mr-1"></i> Simpan Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

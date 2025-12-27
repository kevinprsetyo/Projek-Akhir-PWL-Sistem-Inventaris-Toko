@extends('layouts.main')
@section('title','Tambah User | Sistem Inventaris')
@section('content')
    
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
             <h6 class="m-0 font-weight-bold text-primary">Formulir User Baru</h6>
        </div>
        <div class="card-body">
            <form action="/users/addData" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group hover-input">
                    <label for="name" class="font-weight-bold text-dark">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Masukkan nama lengkap user" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6 hover-input">
                        <label for="email" class="font-weight-bold text-dark">Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6 hover-input">
                        <label for="password" class="font-weight-bold text-dark">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Tentukan password login" required>
                        </div>
                    </div>
                </div>

                <div class="form-group hover-input">
                    <label for="foto" class="font-weight-bold text-dark">Foto Profil</label>
                    <div class="custom-file">
                        <input type="file" name="foto" id="foto" class="custom-file-input" accept="image/*">
                        <label class="custom-file-label" for="foto">Pilih file foto...</label>
                    </div>
                    <small class="text-muted">Format yang didukung: JPG, JPEG, PNG.</small>
                </div>

                <div class="form-group mt-4 text-right">
                     <a href="/users" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm"><i class="bi bi-save mr-1"></i> Simpan User</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e){
            var fileName = document.getElementById("foto").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>

    <style>
        .hover-input:hover label {
            color: #4e73df !important;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
    </style>
@endsection
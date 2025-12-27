@extends('layouts.main')
@section('title','Tambah Barang | Sistem Inventaris')
@section('content')

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
             <h6 class="m-0 font-weight-bold text-primary">Formulir Barang Baru</h6>
        </div>
        <div class="card-body">
            <form action="/barang/addData" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namabarang" class="font-weight-bold">Nama Barang</label>
                            <input type="text" name="namabarang" id="namabarang" class="form-control" placeholder="Contoh: Laptop Acer Nitro 5" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supplier" class="font-weight-bold">Supplier</label>
                            <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Contoh: PT. Elektronik Jaya" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stok" class="font-weight-bold">Stok Awal</label>
                            <input type="number" name="stok" id="stok" class="form-control" placeholder="0" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold">Harga Satuan (Rp)</label>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="0" min="0" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Deskripsi singkat barang..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="poster" class="font-weight-bold">Foto Barang</label>
                    <div class="custom-file">
                         <input type="file" name="poster" id="poster" class="custom-file-input" accept="image/*">
                         <label class="custom-file-label" for="poster">Pilih file gambar...</label>
                    </div>
                    <small class="text-muted">Format: JPG, PNG, JPEG.</small>
                </div>

                <div class="form-group mt-4 text-right">
                    <a href="/barang" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-success px-4"><i class="bi bi-save mr-1"></i> Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script to update custom file label name -->
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e){
            var fileName = document.getElementById("poster").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
@endsection

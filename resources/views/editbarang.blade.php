@extends('layouts.main')
@section('title','Edit Barang | Sistem Inventaris')
@section('content')
   

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
             <h6 class="m-0 font-weight-bold text-primary">Edit data: {{ $br->namabarang }}</h6>
        </div>
        <div class="card-body">
            <form action="/barang/saveEdit/{{ $br->id }}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namabarang" class="font-weight-bold">Nama Barang</label>
                            <input type="text" name="namabarang" id="namabarang" class="form-control" required value="{{ $br->namabarang }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supplier" class="font-weight-bold">Supplier</label>
                            <input type="text" name="supplier" id="supplier" class="form-control" required value="{{ $br->supplier }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stok" class="font-weight-bold">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control" required value="{{ $br->stok }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" required value="{{ $br->harga }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ $br->description ?? $br->deskripsi ?? '' }}</textarea>
                    <!-- Note: Adjusted to support 'description' or 'deskripsi' depending on column name variation in controller/model if any. Based on view file it used 'description' input name but 'deskripsi' might be in DB. Keeping name='description' as per original file. -->
                </div>

                <div class="form-group">
                    <label class="font-weight-bold d-block">Foto Saat Ini</label>
                    <div class="mb-3">
                        @if($br->poster)
                            <img src="{{ asset('storage/' . $br->poster) }}" width="120" height="120" alt="{{ $br->namabarang }}" class="img-thumbnail rounded">
                        @else
                            <img src="/storage/poster/noimage.jpg" alt="No Image" width="120" height="120" class="img-thumbnail rounded">
                        @endif
                    </div>
                    <label for="poster" class="font-weight-bold">Ganti Foto (Opsional)</label>
                    <div class="custom-file">
                        <input type="file" name="poster" id="poster" class="custom-file-input" accept="image/*">
                        <label class="custom-file-label" for="poster">Pilih file gambar baru...</label>
                    </div>
                </div>

                <div class="form-group mt-4 text-right">
                    <a href="/barang" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save mr-1"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e){
            var fileName = document.getElementById("poster").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
@endsection

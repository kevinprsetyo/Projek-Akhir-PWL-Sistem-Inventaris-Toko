<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hasil Pencarian | Sistem Inventaris</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            min-height: 100vh;
        }
        .public-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 15px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            color: white;
            margin-bottom: 30px;
        }
        .item-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            overflow: hidden;
            background: white;
            height: 100%;
        }
        .item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .card-img-wrapper {
            height: 200px;
            position: relative;
            background-color: #eee;
        }
        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .price-tag {
            font-weight: 700;
            color: #2a5298;
            font-size: 1.1rem;
        }
        .supplier-badge {
            font-size: 0.8rem;
            background-color: #e9ecef;
            color: #555;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-block;
        }
    </style>
  </head>
  <body>
    <!-- Public Header -->
    <header class="public-header">
        <div class="container d-flex justify-content-between align-items-center">
            <h4 class="mb-0 font-weight-bold"><a href="/search" class="text-white text-decoration-none"><i class="bi bi-box-seam-fill mr-2"></i>SISTEM INVENTARIS</a></h4>
            <div>
                 <a href="/search" class="btn btn-outline-light btn-sm rounded-pill px-3"><i class="bi bi-search mr-1"></i> Cari Lagi</a>
            </div>
        </div>
    </header>

    <div class="container pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="font-weight-bold text-dark border-left pl-3" style="border-width: 4px !important; border-color: #4e73df !important;">Hasil Pencarian</h4>
        </div>

        <div class="row">
            @if($br->isEmpty())
                <div class="col-12 text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-journal-x text-muted" style="font-size: 4rem; opacity: 0.5;"></i>
                    </div>
                    <h4 class="text-muted font-weight-bold">Tidak ada barang ditemukan</h4>
                    <p class="text-muted mb-4">Coba cari dengan kata kunci lain atau periksa ejaan Anda.</p>
                    <a href="/search" class="btn btn-primary rounded-pill px-4 shadow-sm">Kembali ke Pencarian</a>
                </div>
            @else
                @foreach($br as $q)
                <div class="col-md-4 mb-4">
                    <div class="item-card">
                        <div class="card-img-wrapper">
                            @if($q->poster)
                            <img src="{{ asset('storage/' . $q->poster) }}" alt="{{ $q->namabarang }}">
                            @else
                            <img src="/storage/poster/noimage.jpg" alt="No Image">
                            @endif
                            <span class="badge badge-{{ $q->stok > 10 ? 'success' : 'danger' }} position-absolute shadow-sm" style="top: 15px; right: 15px; font-size: 0.85rem;">
                                Stok: {{ $q->stok }}
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-dark mb-1 text-truncate" title="{{ $q->namabarang }}">{{ $q->namabarang }}</h5>
                            <div class="mb-3">
                                <span class="supplier-badge"><i class="bi bi-shop mr-1"></i> {{ $q->supplier }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="price-tag">Rp {{ number_format($q->harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
  </body>
</html>

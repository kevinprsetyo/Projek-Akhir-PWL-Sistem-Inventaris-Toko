<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pencarian Barang | Sistem Inventaris</title>

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
            display: flex;
            flex-direction: column;
        }
        .public-header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 15px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            color: white;
        }
        .search-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .search-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            background: white;
            width: 100%;
            max-width: 600px;
            padding: 40px;
        }
        .search-input {
            height: 60px;
            border-radius: 30px;
            padding-left: 50px;
            font-size: 1.1rem;
            background-color: #f8f9fa;
            border: 2px solid #eaecf4;
            transition: all 0.3s;
        }
        .search-input:focus {
            background-color: #fff;
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #b7b9cc;
            font-size: 1.3rem;
        }
        .btn-search {
            border-radius: 30px;
            padding: 12px 40px;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 1rem;
            transition: transform 0.2s;
        }
        .btn-search:hover {
            transform: translateY(-2px);
        }
    </style>
  </head>
  <body>
    <!-- Public Header -->
    <header class="public-header">
        <div class="container d-flex justify-content-between align-items-center">
            <h4 class="mb-0 font-weight-bold"><i class="bi bi-box-seam-fill mr-2"></i>SISTEM INVENTARIS</h4>
            @if(Route::has('login'))
                <div>
                     @auth
                        <a href="{{ url('/home') }}" class="text-white small font-weight-bold">Dashboard <i class="bi bi-arrow-right"></i></a>
                    @else
                        <a href="{{ url('/') }}" class="text-white small font-weight-bold">Login Admin</a>
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <div class="search-container">
        <div class="search-card text-center">
            <div class="mb-4">
                <div class="bg-light d-inline-block rounded-circle p-4 mb-3">
                    <i class="bi bi-search text-primary" style="font-size: 3rem;"></i>
                </div>
                <h3 class="font-weight-bold text-dark">Pencarian Barang</h3>
                <p class="text-muted">Cari stok, harga, dan ketersediaan barang dengan mudah.</p>
            </div>
            
            <form action="/hasil" method="get">
                @csrf
                <div class="form-group position-relative mb-4">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" name="q" class="form-control search-input" placeholder="Masukkan nama barang..." required autofocus>
                </div>
                <button type="submit" class="btn btn-primary btn-search shadow-sm">
                    Cari Barang
                </button>
            </form>
        </div>
    </div>

    <!-- Simple Footer -->
    <footer class="text-center py-4 text-muted small">
        &copy; {{ date('Y') }} Sistem Inventaris Toko. All rights reserved.
    </footer>

  </body>
</html>

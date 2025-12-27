<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
    
    <title>@yield('title')</title>

    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
        overflow-x: hidden;
      }
      
      /* Styling header */
      .app-header {
        height: 60px; /* Slimmer height */
        display: flex;
        align-items: center;
        padding: 0 25px;
        background: #ffffff !important; /* Clean white background */
        border-bottom: 1px solid #e3e6f0;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05); /* Very soft shadow */
        z-index: 1000;
      }
      
      .app-title-container {
        display: flex;
        align-items: center;
        color: #1e3c72; /* Darker corporate color text */
        margin-left: 25px;
      }
      
      .app-title {
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: 0.3px;
        line-height: 1.2;
      }
      
      .app-icon {
        font-size: 1.4rem;
        margin-right: 12px;
        color: #2a5298;
      }
      
      .app-subtitle {
        font-size: 0.75rem;
        color: #858796;
        font-weight: 400;
        margin-left: 10px;
        padding-left: 10px;
        border-left: 1px solid #d1d3e2;
        display: none; /* Hide on very small screens, show on md */
      }
      
      @media (min-width: 768px) {
        .app-subtitle {
          display: block;
        }
      }

      /* Sidebar */
      .sidebar-container {
        background-color: #ffffff;
        box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        min-height: 100vh;
        z-index: 900;
        padding-top: 20px;
      }

      .nav-pills .nav-link {
        color: #5a5c69;
        border-radius: 6px;
        margin-bottom: 5px;
        padding: 10px 15px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.2s;
      }
      
      .nav-pills .nav-link:hover {
        background-color: #eaecf4;
        color: #2a5298;
      }
      
      .nav-pills .nav-link.active {
        background: #2a5298; /* Solid corporate blue */
        color: white;
        box-shadow: 0 3px 6px rgba(42, 82, 152, 0.25);
      }
      
      .nav-pills .nav-link i {
        margin-right: 8px;
        font-size: 1rem;
        width: 20px;
        text-align: center;
      }

      /* Content Area */
      .main-content {
        padding: 25px;
      }

      .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
      }
      
      .card-body {
        padding: 20px;
      }

      /* User Dropdown */
      .dropdown-toggle-custom {
        display: flex;
        align-items: center;
        background: transparent;
        border: none;
        padding: 5px 10px;
        color: #5a5c69;
        font-weight: 500;
        font-size: 0.9rem;
        border-radius: 30px;
        transition: background 0.2s;
      }

      .dropdown-toggle-custom:hover, .dropdown-toggle-custom:focus {
        background-color: #eaecf4;
        text-decoration: none;
        color: #2a5298;
      }

      .dropdown-menu {
        border: none;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        border-radius: 8px;
        margin-top: 10px;
      }
      
      .dropdown-item {
        padding: 8px 16px;
        font-size: 0.85rem;
        color: #3a3b45;
      }
      
      .dropdown-item:hover {
        background-color: #eaecf4;
        color: #2a5298;
      }
      
      .dropdown-item i {
        margin-right: 8px;
        color: #b7b9cc;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
        <!-- Header -->
        <div class="row no-gutters">
            <div class="col-md-12 app-header">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <!-- Brand / Title -->
                    <div class="app-title-container">
                        <i class="bi bi-box-seam-fill app-icon"></i>
                        <span class="app-title">SISTEM INVENTARIS BARANG TOKO</span>
                    </div>

                    <!-- User Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle-custom dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline">{{ Auth::check() ? Auth::user()->name : 'User' }}</span>
                            <img src="{{ 
                                Auth::user()->foto
                                ? asset('storage/'.Auth::user()->foto)
                                : asset('/storage/poster/noimage.jpg') }}" 
                                class="rounded-circle" width="32" height="32" style="object-fit: cover; border: 2px solid #eaecf4;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
                             <h6 class="dropdown-header">
                                User Profile
                            </h6>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person fa-sm fa-fw mr-2"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="/changepass">
                                <i class="bi bi-key fa-sm fa-fw mr-2"></i>
                                Ubah Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="/logout">
                                <i class="bi bi-box-arrow-right fa-sm fa-fw mr-2"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <!-- Body -->
        <div class="row no-gutters">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar-container">
                <div class="nav flex-column nav-pills px-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <small class="text-uppercase text-muted font-weight-bold mb-2 mt-2 px-3" style="font-size: 0.75rem;">Menu Utama</small>
                    <a class="nav-link {{ (($key ?? '') == 'home') ? 'active':'' }}" href="/home" role="tab">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                    <a class="nav-link {{ (($key ?? '') == 'barang') ? 'active':'' }}" href="/barang" role="tab">
                        <i class="bi bi-box-seam"></i> Data Barang
                    </a>
                    
                    <div class="dropdown-divider my-2"></div>
                    
                    <small class="text-uppercase text-muted font-weight-bold mb-2 mt-2 px-3" style="font-size: 0.75rem;">Administrator</small>
                    <a class="nav-link {{ (($key ?? '') == 'users') ? 'active':'' }}" href="/users" role="tab">
                        <i class="bi bi-people"></i> Pengguna
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content bg-light">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
    <script>new DataTable('#example');</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

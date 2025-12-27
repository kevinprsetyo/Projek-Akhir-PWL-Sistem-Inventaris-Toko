<!doctype html>
<html lang="en">
  <head>
    <title>Login | Sistem Inventaris</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
      }
      
      .login-container {
        width: 100%;
        max-width: 420px;
        padding: 15px;
      }

      .login-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        border: none;
        padding: 40px 30px;
      }
      
      .login-header {
        text-align: center;
        margin-bottom: 30px;
      }
      
      .login-header h3 {
        font-weight: 600;
        color: #1e3c72;
        margin-bottom: 10px;
      }
      
      .login-header p {
        color: #6c757d;
        font-size: 0.95rem;
      }
      
      .form-group label {
        font-weight: 500;
        color: #495057;
        font-size: 0.9rem;
      }
      
      .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        height: auto;
        border: 1px solid #ced4da;
        background-color: #f8f9fa;
        transition: all 0.3s;
      }
      
      .form-control:focus {
        box-shadow: 0 0 0 3px rgba(30, 60, 114, 0.1);
        border-color: #1e3c72;
        background-color: #fff;
      }
      
      .btn-login {
        background: linear-gradient(to right, #1e3c72, #2a5298);
        border: none;
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
        transition: transform 0.2s, box-shadow 0.2s;
      }
      
      .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 60, 114, 0.4);
        background: linear-gradient(to right, #162c54, #203f75);
      }
      
      .btn-login:active {
        transform: translateY(0);
      }
      
      .system-logo {
        width: 60px;
        height: 60px;
        background: #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: #1e3c72;
        font-size: 28px;
      }

      .footer-text {
        text-align: center;
        margin-top: 25px;
        color: #adb5bd;
        font-size: 0.8rem;
      }
    </style>
  </head>

  <body>
    <div class="login-container">
      <div class="login-card">
        <div class="login-header">
            <div class="system-logo">
                <i class="bi bi-box-seam-fill"></i>
            </div>
            <h3>Sistem Inventaris</h3>
            <p>Silakan masuk untuk melanjutkan</p>
        </div>

        <form action="/ceklogin" method="post">
          @csrf
          <div class="form-group mb-4">
            <label for="email">Email Address</label>
            <div class="input-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
            </div>
          </div>

          <div class="form-group mb-4">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-login">
            MASUK
          </button>
        </form>
        
        <div class="footer-text">
            &copy; 2025 Inventory Management System
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

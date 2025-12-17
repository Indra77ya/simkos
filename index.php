<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Akses</title>
    <style>
        /* Reset dasar & Font */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Latar belakang halaman */
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Kartu Container */
        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Typography */
        h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }

        p {
            color: #666;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        /* Gaya Tombol */
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        /* Tombol Admin (Aksen Gelap/Elegan) */
        .btn-admin {
            background-color: #2c3e50;
            color: white;
            border: 2px solid #2c3e50;
        }

        .btn-admin:hover {
            background-color: #34495e;
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.3);
        }

        /* Tombol Tenant (Aksen Terang/Bersih) */
        .btn-tenant {
            background-color: white;
            color: #2c3e50;
            border: 2px solid #e2e8f0;
        }

        .btn-tenant:hover {
            border-color: #2c3e50;
            background-color: #f8fafc;
        }

        /* Footer kecil */
        .footer {
            margin-top: 2rem;
            font-size: 0.75rem;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Selamat Datang</h1>
        <p>Silakan pilih portal masuk Anda</p>

        <div class="btn-group">
            <a href="http://localhost/admin/" class="btn btn-admin">
                Masuk sebagai <strong>Admin</strong>
            </a>
            
            <a href="http://localhost/tenant/" class="btn btn-tenant">
                Masuk sebagai <strong>Tenant</strong>
            </a>
        </div>

        <div class="footer">
            &copy; <?php echo date("Y"); ?> Sistem Manajemen Properti
        </div>
    </div>

</body>
</html>
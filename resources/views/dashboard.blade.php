<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .info-box {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            height: 200px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .info-box h3 {
            margin-bottom: 15px;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            padding-bottom: 10px;
        }
        .welcome-box {
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            background: linear-gradient(135deg,rgb(255, 0, 0) 0%,rgb(174, 32, 32) 100%);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .welcome-box h1,
        .welcome-box .lead {
            color: white; /* Explicitly set text color to white */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3); /* Optional: adds slight shadow for better readability */
        }

        .box-1 {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
        }
        .box-2 {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }
        .box-3 {
            background: linear-gradient(135deg, #f46b45 0%, #eea849 100%);
            color: white;
        }
        .box-4 {
            background: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);
            color: white;
        }
        .icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Welcome Box -->
    <div class="welcome-box">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>Welcome, {{ auth()->user()->name }}!</h1>
                <p class="lead">Selamat Datang di E-Telmed</p>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <!-- Info Boxes Row -->
    <div class="row">
        <!-- Box 1: Jadwal Konsultasi -->
        <div class="col-md-3">
            <div class="info-box box-1">
                <div class="icon">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h3>Jadwal Konsultasi</h3>
                <p>Lihat jadwal konsultasi Anda</p>
                <a href="#" class="btn btn-light btn-sm mt-2">Lihat Jadwal</a>
            </div>
        </div>
        
        <!-- Box 2: Data Dokter -->
        <div class="col-md-3">
            <div class="info-box box-2">
                <div class="icon">
                    <i class="bi bi-people"></i>
                </div>
                <h3>Data Dokter</h3>
                <p>Informasi lengkap tentang dokter</p>
                <a href="{{ route('doctors.index') }}" class="btn btn-light btn-sm mt-2">Lihat Dokter</a>
            </div>
        </div>
        
        <!-- Box 3: Data Obat -->
        <div class="col-md-3">
            <div class="info-box box-3">
                <div class="icon">
                    <i class="bi bi-capsule"></i>
                </div>
                <h3>Data Obat</h3>
                <p>Daftar obat dan informasinya</p>
                <a href="#" class="btn btn-light btn-sm mt-2">Lihat Obat</a>
            </div>
        </div>
        
        <!-- Box 4: Artikel kesehatan -->
        <div class="col-md-3">
            <div class="info-box box-4">
                <div class="icon">
                    <i class="bi bi-journals"></i>
                </div>
                <h3>Artikel Kesehatan</h3>
                <p>Baca Artikel Kesehatan disini!</p>
                <a href="#" class="btn btn-light btn-sm mt-2">Lihat Artikel</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
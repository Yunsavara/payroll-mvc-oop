<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Halaman Perusahaan' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .navbar-fixed {
            z-index: 1030;
        }
        
        .main-content {
            padding-top: 80px; 
            padding-bottom: 80px; 
        }
        
        @media (max-width: 576px) {
            .main-content {
                padding-top: 100px; 
            }
        }
        
        @media print {
            .no-print-area {
                display: none !important;
            }
            
            body {
                margin: 0 !important;
                padding: 0 !important;
            }
            
            .main-content {
                padding: 0 !important;
            }
            
            .container-fluid {
                padding: 0 !important;
                margin: 0 !important;
            }
            
            header, footer {
                display: none !important;
            }
            
            .card {
                border: none !important;
                box-shadow: none !important;
            }
            
            .card-header {
                background-color: #007bff !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .table-bordered {
                border: 1px solid #000 !important;
            }
            
            .table-bordered td, .table-bordered th {
                border: 1px solid #000 !important;
            }
            
            .table-secondary {
                background-color: #f8f9fa !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .table-success {
                background-color: #d4edda !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            @page {
                margin: 0;
                size: A4;
            }
        }
    </style>
  </head>
  <body>
    
    <header class="fixed-top no-print-area navbar-fixed">
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Penggajian</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php?controller=perusahaan&action=index">Perusahaan</a>
                        <a class="nav-link" href="index.php?controller=karyawan&action=index">Karyawan</a>
                        <a class="nav-link" href="index.php?controller=keterangan-gaji&action=index">Penggajian</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="main-content">
        <div class="container-fluid">
            <?= $content ?>
        </div>
    </main>

    <footer class="fixed-bottom bg-warning text-center py-2 no-print-area">
        <small>Copyright &copy; 2025 Yuniko Satria Ivantara</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
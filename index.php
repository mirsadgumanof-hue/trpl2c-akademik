<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Politeknik Negeri Padang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" aria-current="page" href="index.php?p=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="index.php?p=program_studi">Program Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="index.php?p=mahasiswa">Data Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php 
            $page = isset($_GET['p']) ? $_GET['p'] : 'home';
            if($page == 'home') include('home.php');
            if($page == 'mahasiswa') include('Mahasiswa/list.php');
            if($page == 'create') include('Mahasiswa/create.php');
            if($page == 'edit') include('Mahasiswa/edit.php');
            if($page == 'program_studi') include('Program-Studi/list.php');
            if($page == 'tambah') include('Program-Studi/create.php');
            if($page == 'ubah') include('Program-Studi/edit.php');
        ?>
    </div>
    <footer class="bg-dark text-white mt-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
				
                    <p class="mb-3">
                        Politeknik Negeri Padang<br>
                        Jl. Kampus PNP, Limau Manis, Padang<br>
                        Sumatera Barat, Indonesia 25163
                    </p>
                    <div class="mb-2">
                        <strong>Email:</strong> jti@pnpadang.ac.id
                    </div>
                    <div class="mb-2">
                        <strong>Telepon:</strong> (0751) 123456
                    </div>
                </div>

                <!-- Program Studi -->
                <div class="col-lg-2 col-md-6">
                    <h6>OUR ACADEMY</h6>
                        <ul>
                            <li>Mikrotik Academy</li>
                            <li>RedHat Academy</li>
                            <li>Oracle Academy</li>
                            <li>AWS Educate</li>
                            <li>Cisco Networking Academy</li>
                            <li>Microsoft IT Academy</li>
                        </ul>
                </div>

                <!-- Tautan Cepat -->
                <div class="col-lg-3 col-md-6">
                    <h6>USEFULL LINKS</h6>
                        <ul>
                            <li>Academy</li>
                            <li>Akreditasi</li>
                            <li>Fasilitas</li>
                            <li>Jurnal</li>
                            <li>Saran dan Masukan</li>
                        </ul>      
                </div>

                <!-- Media Sosial -->
                <div class="col-lg-3 col-md-6">
                        <div class="card-body">
                            <h6>FOLLOW US</h6>
                            <i class="fa-brands fa-facebook me-3"></i>
                            <i class="fa-brands fa-instagram me-3"></i>
                            <i class="fa-brands fa-youtube me-3"></i>
                        </div>
                        <br>
                    <div>
                        <h6 class="text-uppercase fw-bold mb-2">Peta Kampus</h6>
                        <a href="#" class="btn btn-outline-light btn-sm">Lihat Peta</a>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <!-- Copyright -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2025 Jurusan Teknologi Informasi - Politeknik Negeri Padang. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Developed by <strong>Muhammad Irsyad Gumanof</strong></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
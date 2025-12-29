<?php  
// session | cookies
session_start();
//cek login sudah atau belum
if(!isset($_SESSION['login'])) {
    header("Location:login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Akademik</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
            <div class="container">
                <a class="navbar-brand" href="#"><b>Akademik</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=mahasiswa">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=prodi">Program Studi</a>
                        </li>
                    </ul>
                    <div class="ms-auto">
                        <a href="logout.php" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin logout?')">Logout</a>
                    </div>
                </div>
        </nav>
        <div class="container my-4">
            <?php
            $page = $_GET['page'] ?? 'home';

            switch ($page) {
                case 'home':
                    include 'home.php';
                    break;
                case 'mahasiswa':
                    include 'Mahasiswa/list.php';
                    break;
                case 'mahasiswa_create':
                    include 'Mahasiswa/create.php';
                    break;
                case 'mahasiswa_update':
                    include 'Mahasiswa/update.php';
                    break;
                case 'prodi':
                    include 'program_studi/list.php';
                    break;
                case 'prodi_create':
                    include 'program_studi/create.php';
                    break;
                case 'prodi_update':
                    include 'program_studi/update.php';
                    break;
                default:
                    include 'home.php';
            }
            ?>    
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>

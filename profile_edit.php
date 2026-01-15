<?php
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$data  = $db->query("SELECT * FROM pengguna WHERE email='$email'");
$user  = $data->fetch_assoc();

$aksi = $_GET['aksi'] ?? '';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Edit Profil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5" style="max-width:700px;">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center mb-3">Edit Profil</h4>
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger">
                            <?php
                                if ($_GET['error'] == 'password') {
                                    echo "Password minimal 6 karakter";
                                } elseif ($_GET['error'] == 'nama') {
                                    echo "Nama tidak boleh kosong";
                                }
                            ?>
                        </div>
                    <?php endif; ?>

                    <form action="proses.php" method="post">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?= $user['email']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
                        </div>
                        <button type="submit" name="update_profil"class="btn btn-primary w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

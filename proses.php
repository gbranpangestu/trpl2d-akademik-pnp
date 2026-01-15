<?php 
require 'koneksi.php';

$aksi = $_GET['aksi'] ?? '';

// =====================
// MAHASISWA
// =====================

// Create mahasiswa
if (isset($_POST['submit_mahasiswa'])) {
    $nim        = $_POST['nim'];
    $nama_mhs   = $_POST['nama_mhs'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $alamat     = $_POST['alamat'];
    $prodi_id   = $_POST['prodi_id'];

    $query = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, prodi_id)
                VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat', '$prodi_id')";

    if ($db->query($query)) {
        header("Location:index.php?page=mahasiswa");
        exit;
    } else {
        echo mysqli_error($db);
    }
}

// Delete mahasiswa
elseif ($aksi === 'hapus_mahasiswa') {
    $nim = $_GET['nim'];

    if ($db->query("DELETE FROM mahasiswa WHERE nim = '$nim'")) {
        header("Location:index.php?page=mahasiswa");
        exit;
    } else {
        echo "Gagal Menghapus Data Mahasiswa";
    }
}

// Update mahasiswa
elseif (isset($_POST['Update_mahasiswa'])) {
    $nim       = $_GET['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];
    $prodi_id  = $_POST['prodi_id'];

    $update = $db->query(
        "UPDATE mahasiswa SET nama_mhs  = '$nama_mhs', tgl_lahir = '$tgl_lahir', alamat    = '$alamat', prodi_id  = '$prodi_id' WHERE nim = '$nim'"
    );

    if ($update) {
        header("Location:index.php?page=mahasiswa");
        exit;
    } else {
        echo "Maaf, data gagal diubah<br>";
        echo mysqli_error($db);
    }
}


// =====================
// PRODI
// =====================

// Create prodi
elseif (isset($_POST['submit_prodi'])) {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO prodi (nama_prodi, jenjang, keterangan) VALUES ('$nama_prodi', '$jenjang', '$keterangan')";

    if ($db->query($query)) {
        header("Location:index.php?page=prodi");
        exit;
    } else {
        echo "Gagal Menyimpan Data Prodi";
    }
}

// Delete prodi
elseif ($aksi === 'hapus_prodi') {
    $id = $_GET['id'];

    if ($db->query("DELETE FROM prodi WHERE id = '$id'")) {
        header("Location:index.php?page=prodi");
        exit;
    } else {
        echo "Gagal Menghapus Data Prodi";
    }
}

// Update prodi
elseif (isset($_POST['Update_prodi'])) {
    $id = $_GET['id'];

    if ($db->query( "UPDATE prodi SET nama_prodi = '$_POST[nama_prodi]', jenjang = '$_POST[jenjang]', keterangan = '$_POST[keterangan]' WHERE id = '$id'" )) 
        {
        header("Location:index.php?page=prodi");
        exit;
    } else {
        echo "Maaf, data gagal diubah";
    }
}

// =====================
// EDIT PROFIL
// =====================
elseif (isset($_POST['update_profil'])) {

    session_start();
    require 'koneksi.php';

    $email = $_SESSION['email'];
    $nama  = $_POST['nama_lengkap'];
    $pass  = $_POST['password'];

    // VALIDASI
    if (empty($nama)) {
        header("Location: index.php?page=profil&error=nama");
        exit;
    }

    if (!empty($pass) && strlen($pass) < 6) {
        header("Location: index.php?page=profil&error=password");
        exit;
    }

    // UPDATE
    if (!empty($pass)) {
        $pass = md5($pass);
        $update = $db->query("UPDATE pengguna SET nama_lengkap='$nama', password='$pass' WHERE email='$email'" );
    } else {
        $update = $db->query("UPDATE pengguna  SET nama_lengkap='$nama' WHERE email='$email'" );
    }

    if ($update) {
        $_SESSION['nama_lengkap'] = $nama;
        header("Location: index.php?page=home");
        exit;
    } else {
        echo "Gagal update profil";
    }
}


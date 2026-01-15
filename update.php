<?php
require 'koneksi.php';
$nim = $_GET['nim'];
$edit = $db->query("SELECT * FROM mahasiswa WHERE nim = $nim");
$data = mysqli_fetch_array($edit);
?>

<h1>Edit Data Mahasiswa</h1>
<form method="post" action="proses.php?nim=<?php echo $_GET['nim'] ?>">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama_mhs" value="<?php echo $data['nama_mhs']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"><?php echo $data['alamat']; ?></textarea>
    </div>

    <input type="submit" name="Update" class="btn btn-info btn-md" value="Update">
    <a href="index.php?page=mahasiswa" class="btn btn-secondary btn-md">Kembali</a>



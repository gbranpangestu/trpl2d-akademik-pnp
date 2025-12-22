<?php
require 'koneksi.php';
$nim = $_GET['nim'];

$edit = $db->query("SELECT * FROM mahasiswa WHERE nim = '$nim'");
$data = mysqli_fetch_assoc($edit);

$prodi = $db->query("SELECT id, nama_prodi, jenjang FROM prodi");
?>

<h1>Edit Data Mahasiswa</h1>
<form method="post" action="/web_programming/Akademik/proses.php?nim=<?= $nim ?>">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama_mhs" value="<?= $data['nama_mhs']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Program Studi</label>
        <select name="prodi_id" class="form-select">
            <?php while ($p = mysqli_fetch_assoc($prodi)) : ?>
                <option value="<?= $p['id']; ?>"
                    <?= ($data['prodi_id'] == $p['id']) ? 'selected' : '' ?>>
                    <?= $p['nama_prodi']; ?> (<?= $p['jenjang']; ?>)
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"><?= $data['alamat']; ?></textarea>
    </div>

    <input type="submit" name="Update_mahasiswa" class="btn btn-info" value="Update">
    <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
</form>

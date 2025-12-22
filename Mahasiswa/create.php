<?php
require 'koneksi.php';

$prodi = $db->query("SELECT id, nama_prodi, jenjang FROM prodi");
?>

<h1>Input Mahasiswa</h1>
<form action="/web_programming/Akademik/proses.php" method="post">

    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim">
    </div>
    <div class="mb-3">
        <label for="nama_mhs" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama_mhs" placeholder="Full Name" name="nama_mhs">
    </div>
    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
    </div>
    <div class="mb-3">
        <label class="form-label">Program Studi</label>
        <select name="prodi_id" class="form-select" required>
            <option value="">-- Pilih Prodi --</option>

            <?php while($p = mysqli_fetch_assoc($prodi)) : ?>
                <option value="<?= $p['id']; ?>">
                    <?= $p['nama_prodi']; ?> (<?= $p['jenjang']; ?>)
                </option>
            <?php endwhile; ?>

        </select>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
    </div>
    <div class="d-flex gap-2">
        <input type="submit" class="btn btn-info btn-md" name="submit_mahasiswa">
        <input type="reset" class="btn btn-secondary btn-md" name="reset">
        <a href = 'index.php?page=mahasiswa' class = "btn btn-dark btn-md ms-auto">Lihat Data</a>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>



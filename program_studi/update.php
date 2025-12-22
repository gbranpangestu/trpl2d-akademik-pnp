<?php
require 'koneksi.php';
$id = $_GET['id'];
$edit = $db->query("SELECT * FROM prodi WHERE id = $id");
$data = mysqli_fetch_array($edit);
?>

<h1>Edit Data Program Studi</h1>
<form method="post" action="/web_programming/Akademik/proses.php?id=<?php echo $_GET['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Nama Program Studi</label>
        <input type="text" class="form-control" name="nama_prodi" value="<?php echo $data['nama_prodi']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Jenjang</label>
        <select name="jenjang" class="form-select" required>
            <option value="">-- Pilih Jenjang --</option>
            <option value="D2" <?php if ($data['jenjang'] == 'D2') echo 'selected'; ?>>
                D2
            </option>
            <option value="D3" <?php if ($data['jenjang'] == 'D3') echo 'selected'; ?>>
                D3
            </option>
            <option value="D4" <?php if ($data['jenjang'] == 'D4') echo 'selected'; ?>>
                D4
            </option>
            <option value="S2" <?php if ($data['jenjang'] == 'S2') echo 'selected'; ?>>
                S2
            </option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">keterangan</label>
        <textarea class="form-control" name="keterangan" rows="4"><?php echo $data['keterangan']; ?></textarea>
    </div>

    <input type="submit" name="Update_prodi" class="btn btn-info btn-md" value="Update">
    <a href="index.php?page=prodi" class="btn btn-secondary btn-md">Kembali</a>



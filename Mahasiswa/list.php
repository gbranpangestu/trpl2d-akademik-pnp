<h1>List Data Mahasiswa</h1>
    <a href = 'index.php?page=mahasiswa_create' class = "btn btn-info">Input Mahasiswa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require 'koneksi.php';
            $tampil = $db->query("SELECT m.nim, m.nama_mhs, m.tgl_lahir, m.alamat, p.nama_prodi, p.jenjang FROM mahasiswa m 
                                    LEFT JOIN prodi p ON m.prodi_id = p.id");
            $no=1;
            //looping data tamu
            while($data = mysqli_fetch_assoc($tampil)){
            ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['nim'] ?></td>
                    <td><?= $data['nama_mhs'] ?></td>
                    <td><?= $data['tgl_lahir'] ?></td>
                    <td>
                        <?= $data['nama_prodi']; ?> (<?= $data['jenjang']; ?>)
                    </td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                        <a href="/web_programming/Akademik/proses.php?aksi=hapus_mahasiswa&nim=<?= $data['nim'] ?>" class="btn btn-info" name="Delete" >Delete</a>
                        <a href="index.php?nim=<?php echo $data['nim'] ?>&page=mahasiswa_update" class="btn btn-secondary"">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        
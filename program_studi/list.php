<h1>List Data Program Studi</h1>
    <a href = 'index.php?page=prodi_create' class = "btn btn-info">Input Program Studi</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Jenjang</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require 'koneksi.php';
            $tampil = $db->query("SELECT * FROM prodi");
            $no=1;
            //looping data tamu
            while($data = mysqli_fetch_assoc($tampil)){
            ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['nama_prodi'] ?></td>
                    <td><?= $data['jenjang'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td>
                        <a href="/web_programming/Akademik/proses.php?aksi=hapus_prodi&id=<?= $data['id'] ?>" class="btn btn-primary" name="Delete" >Delete</a>
                        <a href="index.php?id=<?php echo $data['id'] ?>&page=prodi_update" class="btn btn-secondary"">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        
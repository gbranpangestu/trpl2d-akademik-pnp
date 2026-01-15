<h1>List Data Mahasiswa</h1>
    <a href = 'index.php?page=create' class = "btn btn-info">Input Mahasiswa</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require 'koneksi.php';
            $tampil = $db->query("SELECT * FROM mahasiswa");
            $no=1;
            //looping data tamu
            while($data = mysqli_fetch_assoc($tampil)){
            ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['nim'] ?></td>
                    <td><?= $data['nama_mhs'] ?></td>
                    <td><?= $data['tgl_lahir'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td>
                        <a href="proses.php?aksi=hapus&nim=<?= $data['nim'] ?>" class="btn btn-info" name="Delete" >Delete</a>
                        <a href="index.php?nim=<?php echo $data['nim'] ?>&page=update" class="btn btn-secondary"">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        
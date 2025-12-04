<?php 
require 'koneksi.php';

//Create data
if(isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    
    $query = "INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,alamat) VALUES ('$nim','$nama','$tgl_lahir','$alamat')";
    
    $sql = $db->query($query); //eksekusi query
    
    if($sql){
        header("location:index.php?page=mahasiswa");
    } else{
        echo "Gagal Menyimpan Data! <br>";
    }
} 

//delete
if(isset($_GET['aksi']) == 'hapus') {
    $nim = $_GET['nim'];
    
    $hapus = $db->query("DELETE FROM mahasiswa WHERE nim = $nim");
    
    if ($hapus) {
        header("location:index.php?page=mahasiswa");
    } else {
        echo "Gagal Menghapus Data";
    }
}

//Update
if (isset($_POST['Update'])) {
    
    $nim = $_GET['nim'];
    $update = $db->query("UPDATE mahasiswa SET nama_mhs='$_POST[nama_mhs]', tgl_lahir='$_POST[tgl_lahir]', alamat='$_POST[alamat]' WHERE nim = $nim");
    if ($update) {
        header("Location:index.php?page=mahasiswa");
    } else {
        echo "Maaf, data gagal diubah ";
    }
}




?>
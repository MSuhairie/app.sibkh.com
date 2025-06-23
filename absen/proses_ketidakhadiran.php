<?php

$status = $_POST['status'];
$tgl_absen = $_POST['tgl_absen'];
$ket = $_POST['ket'];

$query = mysqli_query($koneksi, "INSERT INTO tb_absen (status, tgl_absen, ket, id_user) 
VALUES ('$status', '$tgl_absen', '$ket', '$_SESSION[id_user]')");

if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='./';</script>";
} else {
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='./';</script>";
}

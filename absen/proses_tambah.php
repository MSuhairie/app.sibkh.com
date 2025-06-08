<?php

$status = $_POST['status'];
$tgl_absen = $_POST['tgl_absen'];
$chekin = $tgl_absen . ' ' . $_POST['chekin'] . ':00';
$chekout = $tgl_absen . ' ' . $_POST['chekout'] . ':00';
$ket = $_POST['ket'];

$query = mysqli_query($koneksi, "INSERT INTO tb_absen (status, tgl_absen, ket, id_user, chekin, chekout) 
VALUES ('$status', '$tgl_absen', '$ket', '$_SESSION[id_user]', '$chekin', '$chekout')");

if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=absen/index';</script>";
} else {
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=absen/tambah';</script>";
}

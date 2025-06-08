<?php

$id_absen = $_POST['id_absen'];
$status = $_POST['status'];
$tgl_absen = $_POST['tgl_absen'];
$chekin = $_POST['chekin'];
$chekout = $_POST['chekout'];

$query = mysqli_query($koneksi, "UPDATE tb_absen SET status='$status', tgl_absen='$tgl_absen', chekin='$chekin', chekout='$chekout', id_user='$_SESSION[id_user]' WHERE id_absen='$id_absen'");

if($query) {
	echo "<script>alert('Data Berhasil Diubah');window.location.href='?page=absen/index';</script>";
} else {
	echo "<script>alert('Data Gagal Diubah');window.location.href='?page=absen/ubah';</script>";
}
<?php

$id_user = $_SESSION['id_user'];
$tgl_absen = $_POST['tgl_absen'];
$chekout = $_POST['chekout'];

$query = mysqli_query($koneksi, "UPDATE tb_absen SET chekout='$chekout', id_user='$id_user' WHERE tgl_absen='$tgl_absen' AND id_user='$id_user'");

if($query) {
	echo "<script>alert('Berhasil ChekOut');window.location.href='./';</script>";
} else {
	echo "<script>alert('Gagal ChekOut');window.location.href='./';</script>";
}
<?php

$status = $_POST['status'];
$chekin = $_POST['chekin'];
$tgl_absen = $_POST['tgl_absen'];

$query = mysqli_query($koneksi, "INSERT INTO tb_absen (status, chekin, id_user, tgl_absen) 
	VALUES ('$status', '$chekin', '$_SESSION[id_user]', '$tgl_absen')");

if($query) {
	echo "<script>alert('Berhasil ChekIn');window.location.href='./';</script>";
} else {
	echo "<script>alert('Gagal ChekIn');window.location.href='./';</script>";
}
<?php

$id_absen = $_GET['id_absen'];

$query = mysqli_query($koneksi, "UPDATE tb_absen SET statusenabled='f' WHERE id_absen='$id_absen'");

if($query) {
	echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=absen/index';</script>";
} else {
	echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=absen/index';</script>";
}
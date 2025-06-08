<?php

$id_user = $_GET['id_user'];

$query = mysqli_query($koneksi, "UPDATE tb_user SET statusenabled='f' WHERE id_user='$id_user'");

if($query) {
	echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=user/index';</script>";
} else {
	echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=user/index';</script>";
}
<?php

$id_user = $_POST['id_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$jabatan = $_POST['jabatan'];

if($password <> "") {
	$query = mysqli_query($koneksi, "UPDATE tb_user SET nama_lengkap='$nama_lengkap', username='$username', password='$password', jabatan='$jabatan' WHERE id_user='$id_user'");
}else {
	$query = mysqli_query($koneksi, "UPDATE tb_user SET nama_lengkap='$nama_lengkap', username='$username', jabatan='$jabatan' WHERE id_user='$id_user'");
}

if($query) {
	if($id_user == $_SESSION['id_user']) {
		echo "<script>alert('Data Berhasil Diubah');window.location.href='./';</script>";
	}
	echo "<script>alert('Data Berhasil Diubah');window.location.href='?page=user/index';</script>";
} else {
	echo "<script>alert('Data Gagal Diubah');window.location.href='?page=user/ubah';</script>";
}
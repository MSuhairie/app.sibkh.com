<?php

$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$jabatan = $_POST['jabatan'];

$query = mysqli_query($koneksi, "INSERT INTO tb_user (nama_lengkap, username, password, jabatan) 
	VALUES ('$nama_lengkap', '$username', '$password', '$jabatan')");

if($query) {
	echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=user/index';</script>";
} else {
	echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=user/tambah';</script>";
}
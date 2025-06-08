<?php

$kegiatan = $_POST['kegiatan'];
$tgl = $_POST['tgl'];

$query = mysqli_query($koneksi, "INSERT INTO tb_kegiatan (kegiatan, tgl, id_user) 
	VALUES ('$kegiatan', '$tgl', '$_SESSION[id_user]')");

if($query) {
	echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=kegiatan/tambah';</script>";
} else {
	echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=kegiatan/tambah';</script>";
}
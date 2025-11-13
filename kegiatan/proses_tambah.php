<?php

$kegiatan = $_POST['kegiatan'];
$tgl = $_POST['tgl'];
$size = $_POST['size'];

$gambar = $_FILES['gambar']['name'];
$namafile = uniqid() . $gambar;
$namaSementara = $_FILES['gambar']['tmp_name'];

$terupload = move_uploaded_file($namaSementara, 'img/' . $namafile);

$query = mysqli_query($koneksi, "INSERT INTO tb_kegiatan (kegiatan, tgl, id_user, gambar, size) 
	VALUES ('$kegiatan', '$tgl', '$_SESSION[id_user]', '$namafile', 'size')");

if($query) {
	echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=kegiatan/tambah';</script>";
} else {
	echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=kegiatan/tambah';</script>";
}
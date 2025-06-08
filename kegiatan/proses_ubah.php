<?php

$id_kegiatan = $_POST['id_kegiatan'];
$kegiatan = $_POST['kegiatan'];
$tgl = $_POST['tgl'];

$query = mysqli_query($koneksi, "UPDATE tb_kegiatan SET kegiatan='$kegiatan', tgl='$tgl', id_user='$_SESSION[id_user]' WHERE id_kegiatan='$id_kegiatan'");

if($query) {
	echo "<script>alert('Data Berhasil Diubah');window.location.href='?page=kegiatan/index';</script>";
} else {
	echo "<script>alert('Data Gagal Diubah');window.location.href='?page=kegiatan/ubah';</script>";
}
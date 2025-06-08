<?php

$id_kegiatan = $_GET['id_kegiatan'];

$query = mysqli_query($koneksi, "UPDATE tb_kegiatan SET statusenabled='f' WHERE id_kegiatan='$id_kegiatan'");

if($query) {
	echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=kegiatan/index';</script>";
} else {
	echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=kegiatan/index';</script>";
}
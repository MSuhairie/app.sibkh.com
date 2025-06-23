<?php

session_start();

if($_SESSION == NULL){
    echo "<script>
    alert('Harap Login Terlebih Dahulu')
    window.location.href='auth/login.php'
    </script>";
}

// if($_SESSION == NULL){
//     echo "<script>
//     alert('Maaf Lagi Maintenance !!')
//     window.location.href=''
//     </script>";
// }

date_default_timezone_set("Asia/Jakarta");

// Array nama hari dalam bahasa Indonesia
$nama_hari = array(
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
);

// Array nama bulan dalam bahasa Indonesia
$nama_bulan = array(
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
);

include "koneksi.php"; 
include "layout/header.php";
include "layout/sidebar.php";
include "layout/topbar.php";
include "content.php";
include "layout/footer.php";


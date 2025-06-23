<?php
session_start();
require_once "phpqrcode/qrlib.php"; // file dari phpqrcode

// Data QR
$data = $_SESSION['nip'] ?? $_SESSION['nama_lengkap'];

// File sementara QR
$tempDir = "phpqrcode/";
$filename = $tempDir . "qr_".md5($data).".png";

// Buat QR code
QRcode::png($data, $filename, QR_ECLEVEL_H, 10, 2);

// Gabungkan dengan logo
$QR = imagecreatefrompng($filename);
$logo = imagecreatefrompng('assets/img/jasmed.png');

// Dapatkan ukuran QR dan Logo
$qrWidth = imagesx($QR);
$qrHeight = imagesy($QR);
$logoWidth = imagesx($logo);
$logoHeight = imagesy($logo);

// Hitung posisi tengah
$logo_qr_width = $qrWidth / 3;
$scale = $logoWidth / $logo_qr_width;
$logo_qr_height = $logoHeight / $scale;
$fromWidth = ($qrWidth - $logo_qr_width) / 2;

// Tempelkan logo ke tengah QR
imagecopyresampled(
    $QR, $logo,
    $fromWidth, $fromWidth, // Posisi (x, y)
    0, 0, // Mulai dari sudut logo
    $logo_qr_width, $logo_qr_height,
    $logoWidth, $logoHeight
);

// Tampilkan hasil akhir
header('Content-Type: image/png');
imagepng($QR);

// Bersihkan
imagedestroy($QR);
imagedestroy($logo);
?>
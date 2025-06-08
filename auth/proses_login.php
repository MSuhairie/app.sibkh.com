<?php

include "../koneksi.php";

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);  

	$user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");

	if (mysqli_num_rows($user) > 0) {
		$data = mysqli_fetch_array($user);

		session_start();
			$_SESSION['id_user'] 	  = $data['id_user'];
			$_SESSION['username'] 	  = $data['username'];
			$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
			$_SESSION['jabatan'] 	  = $data['jabatan'];

			echo "<script>
			alert('Login Berhasil ".$_SESSION['nama_lengkap']."')
			window.location='../index.php'
			</script>";
		
	} else {
		echo "<script>
		alert('Username dan Password Salah')
		window.location='login.php'
		</script>";
	}

}
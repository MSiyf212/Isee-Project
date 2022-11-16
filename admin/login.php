<?php
ob_start();
session_start();

include "koneksi.php";
$login = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query ($mysqli, "SELECT * FROM admin WHERE password_admin = '$password' AND email_admin = '$login' ");
$data = mysqli_fetch_array($sql);
$row = mysqli_num_rows($sql);

if ($row > 0){
    $_SESSION['email'] = $data['email_admin'];
    $_SESSION['username'] = $data['username_admin'];
    $_SESSION['foto'] = $data['foto_admin'];
    $_SESSION['status'] = 'login';
    header("location:halaman_admin.php");
	
}else{
    ?>
    <script>
        alert("Email/Password Salah!");
        window.location.href = "index.php";
    </script>
    <?php
}

?>
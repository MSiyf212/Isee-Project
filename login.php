<?php
    ob_start();
    include "koneksi.php";
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email' AND password = '$password' ");
    $cek = mysqli_num_rows($sql);
    $data_login = mysqli_fetch_array($sql);

    if($cek > 0){
        session_start();
        $_SESSION['email'] = $data_login['email'];
        $_SESSION['username'] = $data_login['username'];
        $_SESSION['foto'] = $data_login['foto'];
        $_SESSION['tanggal_daftar'] = $data_login['tanggal_daftar'];
        header("location:https://www.instagram.com/miftahulhuda520/");
    }else{
        
        ?>
        <script>
            alert("email/password salah!");
            window.location.href = "index.php";
        </script>
        <?php
    }

?>
<?php
session_start();
ob_start();
include "koneksi.php";
include "funfiction.php";
    
if(isset($_POST['type']) && $_POST['type'] == 'view'){
    $query = mysqli_query($mysqli, "SELECT * FROM user");
    $no = 1;
    $cek = mysqli_num_rows($query);
    if($cek > 0){
        while ($row = mysqli_fetch_array($query)) {
            echo "<tr>
                    <td>".$no."</td>";
                    if($row['foto'] == ''){
                        echo "<td><i>Tidak Ada Foto</i></td>";
                    }else{
                        echo "<td><img src = 'foto_user/".$row['foto']."' width='70px' height='70px'/></td>";
                    }
            echo   "<td>".$row['username']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['tanggal_daftar']."</td>
                    <td>
                        <a href='#' onclick='form_edit(".$row['id_user'].")' id='tzy' data-toggle='modal' data-target='#edit' class='btn btn-success btn-small'><i class='fas fa-edit'></i></a>
                        <a href='#' onclick='form_delete(".$row['id_user'].")' class='btn btn-danger btn-small'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>";
            $no++;
        }
    }else{
        echo "<tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>        
        </tr>";
    }
}

if(isset($_GET['type']) && $_GET['type'] == 'tambah'){
    $username = $_POST['username'];
    $email = $_POST['email'];        
    $password = md5($_POST['password']);
    $nama_file     = $_FILES['foto']['name'];
    $ukuran_file   = $_FILES['foto']['size'];
    $tipe_file     = $_FILES['foto']['type'];
    $tmp_file      = $_FILES['foto']['tmp_name'];
    $path          = "foto_user/".$nama_file;
    move_uploaded_file($tmp_file, $path);
    $sql = mysqli_query($mysqli, "INSERT INTO user (username, email, foto, password) VALUES ('$username', '$email', '$nama_file', '$password')");
}

if(isset($_POST['user_id'])){
    $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$_POST[user_id]' ");
    $data = mysqli_fetch_array($sql);
    echo form("Username", "text", "username", "username", "Username", $data['username'], "form-control", "", "required");
    echo form("Email", "email", "email", "email", "Email", $data['email'], "form-control", "", "required");
    echo form("Password", "password", "password", "password", "Password", "", "form-control", "", "required");
    echo form_file_edit("Upload Foto", "foto_user/", $data['foto'], "70px", "70px", "file", 'foto', 'foto', "Foto", "image/*");
    echo hidden_form("id", "id", $data['id_user']);
}

if(isset($_GET['type']) && $_GET['type'] == 'edit'){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];          
    $password = md5($_POST['password']);
    $nama_file     = $_FILES['foto']['name'];
    $ukuran_file   = $_FILES['foto']['size'];
    $tipe_file     = $_FILES['foto']['type'];
    $tmp_file      = $_FILES['foto']['tmp_name'];
    $path          = "foto_user/".$nama_file;                    

    if($password == ''){
        if($nama_file == ''){
            $sql = mysqli_query($mysqli, "UPDATE user SET username = '$username', email = '$email' WHERE id_user = '$id'");
        }else{
            move_uploaded_file($tmp_file, $path);
            $sql = mysqli_query($mysqli, "UPDATE user SET username = '$username', email = '$email', foto = '$nama_file' WHERE id_user = '$id'");
        }
    }else{
        if($nama_file == ''){
          $sql = mysqli_query($mysqli, "UPDATE user SET username = '$username', email = '$email', password = '$password' WHERE id_user = '$id'");
        }else{
          move_uploaded_file($tmp_file, $path);
          $sql = mysqli_query($mysqli, "UPDATE user SET username = '$username', email = '$email', foto = '$nama_file', password = '$password' WHERE id_user = '$id'");
        }
    }
}

if(isset($_GET['hapus'])){
    $sql = mysqli_query($mysqli, "DELETE FROM user WHERE id_user = '$_GET[hapus]'");
}

?>
                  
            
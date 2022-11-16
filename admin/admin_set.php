<?php
ob_start();
include "koneksi.php";
include "funfiction.php";
    
if(isset($_POST['type']) && $_POST['type'] == 'view'){
    $query = mysqli_query($mysqli, "SELECT * FROM admin");
    $no = 1;
    $cek = mysqli_num_rows($query);
    if($cek > 0){
        while ($row = mysqli_fetch_array($query)) {
            echo "<tr>
                    <td>".$no."</td>";
                    if($row['foto_admin'] == ''){
                        echo "<td><i>Tidak Ada Foto</i></td>";
                    }else{
                        echo "<td><img src = 'foto_admin/".$row['foto_admin']."' width='70px' height='70px' alt='Foto Error'/></td>";
                    }
            echo    "<td>".$row['username_admin']."</td>
                    <td>".$row['email_admin']."</td>
                    <td>
                        <a href='#' onclick='form_edit(".$row['id_admin'].")' id='tzy' data-toggle='modal' data-target='#edit' class='btn btn-success btn-small'><i class='fas fa-edit'></i></a>
                        <a href='#' onclick='form_delete(".$row['id_admin'].")' class='btn btn-danger btn-small'><i class='fas fa-trash'></i></a>
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
    $password = $_POST['password'];
    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $tipe_file = $_FILES['foto']['type'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    $path = "foto_admin/".$nama_file;
    move_uploaded_file($tmp_file, $path);
    $sql = mysqli_query($mysqli, "INSERT INTO admin (username_admin, email_admin, password_admin, foto_admin) VALUES ('$username', '$email', '$password', '$nama_file')");
}

if(isset($_POST['admin_id'])){
    $sql = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin = '$_POST[admin_id]'");
    $data = mysqli_fetch_array($sql);
    echo form("Username", "text", "username", "username", "Username", $data['username_admin'], "form-control", '', "");
    echo form("Email", "text", "email", "email", "Email", $data['email_admin'], "form-control", '', "");
    echo form("Password", "password", "password", "password", "Password", '', 'form-control', '', "");
    echo form_file_edit("Upload Foto", "foto_admin/", $data['foto_admin'], "70px", "70px", "file", 'foto', 'foto', "Foto", "image/*");
    echo hidden_form("id", "id", $data['id_admin']);
}

if(isset($_GET['type']) && $_GET['type'] == 'edit'){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_file     = $_FILES['foto']['name'];
    $ukuran_file   = $_FILES['foto']['size'];
    $tipe_file     = $_FILES['foto']['type'];
    $tmp_file      = $_FILES['foto']['tmp_name'];
    $path          = "foto_admin/".$nama_file;
        
    if($password == ''){
        if($nama_file == ''){
            $sql = mysqli_query($mysqli, "UPDATE admin SET username_admin = '$username', email_admin = '$email' WHERE id_admin = '$id'");
        }else{
            move_uploaded_file($tmp_file, $path);
            $sql = mysqli_query($mysqli, "UPDATE admin SET username_admin = '$username', email_admin = '$email', foto_admin = '$nama_file' WHERE id_admin = '$id'");
        }
    }else{
        if($nama_file == ''){
            $sql = mysqli_query($mysqli, "UPDATE admin SET username_admin = '$username', email_admin = '$email', password_admin = '$password' WHERE id_admin = '$id'");
        }else{
            move_uploaded_file($tmp_file, $path);
            $sql = mysqli_query($mysqli, "UPDATE admin SET username_admin = '$username', email_admin = '$email', password_admin = '$password', foto_admin = '$nama_file' WHERE id_admin = '$id'");
        }
    }
}

if(isset($_GET['hapus'])){
    $sql = mysqli_query($mysqli, "DELETE FROM admin WHERE id_admin = '$_GET[hapus]'");
}

?>
                  
            
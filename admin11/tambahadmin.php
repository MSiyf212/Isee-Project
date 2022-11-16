<?php
    include "header.php";
    include "navbar.php";
    include "sidebar.php";

    ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Tambah Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <?php
        include "../koneksi.php";
        if(isset($_POST['email'])){
            $foto = $_FILES['foto']['name'];
            $fotos = $_FILES['foto']['tmp_name'];
            $path = "foto/".$foto;
            move_uploaded_file($fotos, $path);
            $sql = mysqli_query($connect, "INSERT INTO admin (email_admin, username_admin, password_admin, foto_admin) VALUES ('$_POST[email]', '$_POST[username]', '$_POST[password]', '$foto')");
            if($sql){
                echo "<div class='alert alert-success mt-3'>Berhasil Menambah Data...</div>";
            }else{
                echo "<div class='alert alert-danger mt-3'>Gagal Menambah Data...</div>";
            }
        }

    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label><br>
                    <input type="file" name="foto" id="exampleInputFile">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="gas" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <?php

    include "footer.php";
?>
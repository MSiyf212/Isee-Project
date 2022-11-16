<!DOCTYPE html>
<html lang="en">

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
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <button type="button" class="btn btn-success mb-2"><a class="text-white" href="tambahadmin.php">Tambah Admin</a></button>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Foto</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    include "../koneksi.php";
                    $sql = mysqli_query($connect, "SELECT * FROM admin");
                    $no = 1;
                    while($data = mysqli_fetch_array($sql)){
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['email_admin']; ?></td>
                          <td><?php echo $data['username_admin']; ?></td>
                          <td><?php echo $data['password_admin']; ?></td>
                          <td><?php echo "<img src='foto/".$data['foto_admin']."' height='100px' width='100px'>" ?></td>
                          <td><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                      <?php
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include "footer.php"; ?>

<?php 
  include 'funfiction.php';
  echo '<script src="ajax/admin.js"></script>';
  echo '<div class="content-wrapper">';
  echo header_content("Admin", "#");
  $label = array("Foto", "Username", "Email", "Action");
  echo content("#tambah", "Tambah Admin", $label);
  echo '</div>';

  //Tambah Data Pop Up
  echo modal_tambah_body("tambah", "Tambah Admin", "admintambah");
  echo form("Username", "text", "username", "username", "Username", "", "form-control", "", "required");
  echo form("Email", "email", "email", "email", "nama@example.com", "", "form-control", "", "required");
  echo form("Password", "password", "password", "password", "Password", "", "form-control", "", "required");
  echo form("Upload Foto", "file", "foto", "foto", "Foto", "", "", "<br>", "required");
  echo modal_tambah_footer("tambah()");
  //End Tambah Data

  //Pop Up Edit Data
  echo modal_edit("edit", "Edit Admin", "form", "adminedit");
  //End Edit Data
  echo js_table();
?>




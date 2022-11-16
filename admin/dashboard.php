<?php 
include 'koneksi.php';
include 'funfiction.php';
echo '<div class="content-wrapper">';
echo header_content("Dashboard", "halaman_admin.php"); 
echo '<section class="content">
    <div class="container-fluid">
      <div class="row">';        
function box($row, $judul, $icon, $bg, $link){
  echo '<div class="col-lg-3 col-6">
          <div class="small-box '.$bg.'">
            <div class="inner">
              <h3>'.$row.'<sup style="font-size: 20px"></sup></h3>
              <p>'.$judul.'</p>
            </div>
          <div class="icon">
            <i class="'.$icon.'"></i>
          </div>
            <a href="'.$link.'" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>';
}
$sql = mysqli_query($mysqli, "SELECT * FROM admin");
$row = mysqli_num_rows($sql);
echo box($row, "Admin", "fas fa-user", "bg-success", "halaman_admin.php?m=2");
$sql = mysqli_query($mysqli, "SELECT * FROM user");
$row = mysqli_num_rows($sql);
echo box($row, "User", "fas fa-users", "bg-primary", "halaman_admin.php?m=3");     
echo '</div>
      </div></section>
      </div>';
?>  


  
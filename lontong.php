<?php
if(isset($_FILES['fil'])){
    $file = $_FILES['fil']['tmp_name'];
    $nama = $_FILES['fil']['name'];
    $dir = "prak/";
    $n = move_uploaded_file($file, $dir.$nama);
    if($n){
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="fil" id="fil"><br>
    <input type="submit" value="Submit" name="submit">
  </form>

<!DOCTYPE html>
<html lang="en">
<?php 
  include "fungsilogin.php";
  include "icon.php"; 
  head("OO!see", $icon);
  
  echo "<body>
    <div class='global-container'>
      <div class='card login-form shadow-lg p-3 mb-3 bg-white-rounded'>";
  card_body("Login"); 
  echo "<div class='card-text'>";
          
  $type = array("email", "password");
  $name = array("email", "password");
  $placeholder = array("name@example.com", "");
  $label = array("Email", "Password");
  $action = "login.php";
  $method = "POST";
  form($type, $name, $placeholder, $label, $action, $method);
  
  echo "<div class='text-center m-2 mb-1 p-0'>
          <p class='m-1'>You don't have account?<a href='daftar.php' class='mb-0'> Sign in</a></p>
        </div>
        <p class='alternatif text-center'>Or sign up with:</p>";
           
  $logo = array("fab fa-google", "fab fa-facebook-f", "fab fa-apple", "fab fa-twitter");
  buttonlog($logo);
                
  echo "</div>
      </div>
    </div>";
  js(); 
  echo "</body>";

?>
</html>

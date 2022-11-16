<?php
  session_start();
  if(isset($_SESSION['status'])){
    header("location:dashboard.php");
  }else{
    ?>
    <script>
      window.location.href = "../index.php?admin=login";
    </script>
    <?php
  }

?>
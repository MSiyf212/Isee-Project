<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "ooisee";

    $mysqli = new mysqli($host, $user, $password, $database);
    if($mysqli->connect_error){
        ?>
        <script>
            alert("<?php echo $mysqli->connect_error; ?>");
        </script>
        <?php
    }
    
?>
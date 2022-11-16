<?php

    function head($title = "", $icon = ""){
       echo  "<head>
                <meta charset='utf-8' />
                <meta name='viewport' content='width=device-width, initial-scale=1' />
                <title>".$title."</title>
                <link rel='icon' href='".$icon."'>
                <link rel='stylesheet' href='style.css' />
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous' />
                <script src='https://kit.fontawesome.com/8625d09ca8.js' crossorigin='anonymous'></script>
              </head>";
    }

    function card_body($ket=""){
      echo "<div class='card-body'>
              <img src='logo-prime.png' class='img-fluid' alt='OO!See Images' />
              <h1 class='card-title text-center'>".$ket."</h1>
            </div>";
    }

    function form($type, $name, $placeholder, $label, $action, $method){
      echo "<form action='".$action."' method='".$method."'>"; 
        $i = 0;
          foreach($type as $tipe){
            echo "<div class='mb-2'>
                <label class='form-label'>".$label[$i]."</label>
                <input type='".$tipe."' name='".$name[$i]."' class='form-control' aria-describedby='userNameHelp' placeholder='".$placeholder[$i]."' required/>
              </div>";
              $i= $i + 1;
          }
              
      echo "<div class='mb-2 form-check'>
              <input type='checkbox' class='form-check-input shadow-sm' id='exampleCheck1' />
              <label class='form-check-label' for='exampleCheck1'>Remember me</label>
            </div>
            <div class='d-grid gap-2 col-6 mx-auto buttonbox'>
              <button type='submit' class='btn btn-primary shadow-lg'>Submit</button>
            </div>    
          </form>";
           
    }
    // alternative button Login
    function buttonlog($logo){
      echo "<div class='text-center m-2 mb-0 p-0'>";
      foreach($logo as $logoo){
        echo "  <button type='button' class='btn btn-link btn-floating mx-2 shadow-lg rounded-circle'>
                  <i class='".$logoo."'></i>
                </button>";
      }
      echo "<div>";
    }

    function js(){
      echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js' integrity='sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2' crossorigin='anonymous'></script>";
    }

    function alert(){
      echo "<div class='alert alert-success alert-dismissible mb-1' id='myAlert'>
              <p class='text-center'>Congrats!! You have <strong>Verify</strong> your account<a href=''> here</a></p>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }

    function alert2(){
      echo "<div class='alert alert-danger alert-dismissible mb-3' id='myAlert'>
              <h5 class='text-center'>Sorry fill the form completely</h5>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }

    function gagal(){
      echo "<div class='alert alert-danger alert-dismissible mb-1' id='myAlert'>
              <p class='text-center'>Email/Password Salah!</p>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }

?>
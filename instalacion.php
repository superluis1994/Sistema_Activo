<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="css/modificaciones.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  <title>Loguin</title>
</head>

<body>

  <div class="container">
    <div class="row mt-4">
      <div
        class=" col-sm-8 col-md-6 col-lg-8 offset-lg-2 offset-md-3  offset-sm-2  offset-4 p-3 shadow-lg p-3 mb-5 bg-white"
        style="border-radius: 15px; height:500px">
        <div class="col-12 text-center p-2">
          <img src="img/recursos/logo.png" width="300" height="auto" class="img-fluid p-4" alt="...">
        </div>
        <div class="col-lg-10 offset-lg-1">
            <?php 
        if(isset($_GET["pagina"])){
        include("instalcion/".$_GET["pagina"]);
        }
        else{
            include("instalcion/inicio.php");
        }
    ?>


            
</div>
        
    </div>

    </div>

  </div>
  <br>
  <br>
  <!-- Button trigger modal -->

  <div class="text-center p-3">
    © 2020 Copyright: <a class="text-grey" href="#">Itca Fepade</a>
  </div>
  <!-- Copyright -->
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

if(isset($_GET["pagina"])){

    if($_GET["pagina"]=="paso2.php"){

    }
}else{
    echo"<script src='instalcion/js/instalacion.js'></script>";
}
?>
</body>

</html>
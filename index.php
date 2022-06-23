
      <?php 
      
      require_once "partes/credenciale/datos.php";
    
      require_once "partes/pagina/header.php";

      session_start();
        require_once "partes/menu/menu_admin.php";
      ?>

<div class="container-fluid">


<?php 
        if(isset($_GET["pagina"])){
        include("partes/formularios/".$_GET["pagina"]);
        }
        else{
            print "<center><h2>Bienvenidos</h2>";
            include("partes/formularios/inicio.php");
        }
    ?>
</div>



        <!-- Copyright -->
        <?php require_once "partes/pagina/footer.php";  ?>
      
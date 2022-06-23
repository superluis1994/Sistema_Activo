
<div class="text-center p-3" style="margin-top:150px">
          © 2020 Copyright:
          <a class="text-black" href="#">Itca Fepade</a>
        </div>
        <!-- Copyright -->
      </footer>
    <script src="<?php echo Ruta; ?>js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/carousel.js"></script> -->
    <script src="<?php echo Ruta; ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo Ruta; ?>js/menu_permisos/menu_permiso.js"></script>

  
    <?php 
    
    if(isset($_GET["pagina"]))
    {
    if($_GET["pagina"] == "registrar_usuario.php"){

        echo "<script src='./js/form_usu.js'></script>";

    } elseif($_GET["pagina"] == "pefilDatos.php"){
      echo "<script src='./js/form_datos.js'></script>";
        
    }elseif($_GET["pagina"] == "registrar_local.php"){
     
      echo "<script src='./js/local/regis_local.js'></script>";
    }
    elseif($_GET["pagina"] == "mover_activo.php"){
     
      echo "<script src='./js/mover_activos/mover_activo.js'></script>";
    }
}
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
  </body>
</html>

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
    <script src="<?php echo Ruta; ?>js/dselect.js"></script>
    <script src="<?php echo Ruta; ?>js/valid.js"></script>

  
    <?php 


if(isset($_SESSION['datos'][@$_COOKIE['id']])){
  echo "<script src='./js/cerrarSession.js'></script>";
      
}
    if(isset($_GET["pagina"]))
    {
    if($_GET["pagina"] == "registrar_usuario.php"){

        echo "<script src='./js/form_usu.js'></script>";

    } elseif($_GET["pagina"] == "pefilDatos.php"){
      echo "<script src='./js/form_datos.js'></script>";
        
    }elseif($_GET["pagina"] == "registrar_local.php"){
     
      echo "<script src='./js/local/regis_local.js'></script>";
    }
    elseif($_GET["pagina"] == "list_local.php"){
     
      echo "<script src='./js/local/list_local.js'></script>";
    }
    elseif($_GET["pagina"] == "mover_activo.php"){
     
      echo "<script src='./js/mover_activos/mover_activo.js'></script>";
      echo"    <script> 
      setTimeout(function(){
        var select_box_element = document.querySelector('#usuarior');
      
      dselect(select_box_element, {
          search: true,
      });
      var select_box_element = document.querySelector('#usuarioEntre');
      
      dselect(select_box_element, {
        search: true
      }); var select_box_element = document.querySelector('#localSali');
      
      dselect(select_box_element, {
        search: true
      });var select_box_element = document.querySelector('#localDes');
      
      dselect(select_box_element, {
        search: true
      });
      }, 200);
       
      </script>";
    }
    elseif($_GET["pagina"] == "list_usuarios.php"){
     
      echo "<script src='./js/usuario/list_usuario.js'></script>";
    }
    elseif($_GET["pagina"] == "list_conexiones.php"){
     
      echo "<script src='./js/conexiones/list_conexiones.js'></script>";
    }
    elseif($_GET["pagina"] == "list_activos.php"){
     
      echo "<script src='./js/activos/list_activo.js'></script>";
    }elseif($_GET["pagina"] == "registrar_Activo.php"){
     
      echo "<script src='./js/activos/regis_activo.js'></script>";
    }elseif($_GET["pagina"] == "list_movimientos.php"){
     
      echo "<script src='./js/list_mov/list_mov.js'></script>";
    }

}
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
  </body>
</html>
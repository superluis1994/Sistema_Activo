<div class="text-center p-3" style="margin-top:150px">
          © 2020 Copyright:
          <a class="text-black" href="#">Itca Fepade</a>
        </div>
        <!-- Copyright -->
      </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/carousel.js"></script> -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/menu_permisos/menu_permiso.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <?php 
    
    if(isset($_GET["pagina"]))
    {
    if($_GET["pagina"] == "registrar_usuario.php"){

        echo "<script src='./js/form_usu.js'></script>";
    } 
}
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
  </body>
</html>
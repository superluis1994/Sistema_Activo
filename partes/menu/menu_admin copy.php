<!-- menu inicio -->
<!-- <h1>admin</h1> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg  bg-body rounded">
        <div class="container-fluid" style="font-family:sans-serif ">
          <a class="navbar-brand" href="index.php"><img src="img/recursos/logo.png" width="200" height="auto" class="img-thumbnail" alt="..."></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mx-auto" id="menu">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuario
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="index.php?pagina=registrar_usuario.php">Registrar</a></li>
                  <li><a class="dropdown-item" href="#">Usuario</a></li>
                  <li><a class="dropdown-item" href="#">Conexiones</a></li>
                </ul>
              </li> 
              <li class="nav-item"> 
                <a class="nav-link" href="#">Mover</a>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Inventario
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Registrar Producto</a></li>
                  <li><a class="dropdown-item" href="#">Mostrar Producto</a></li>
                  <li><a class="dropdown-item" href="#">.....</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Local
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Registrar Local</a></li>
                  <li><a class="dropdown-item" href="#">Mostrar Local</a></li>
                  <li><a class="dropdown-item" href="#">.....</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reportes
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">....</a></li>
                  <li><a class="dropdown-item" href="#">....</a></li>
                  <li><a class="dropdown-item" href="#">.....</a></li>
                </ul>
              </li>
              <li class="nav-item perfilItem"> 
                <a class="nav-link" href="">Perfil</a>
              </li>
            </ul>
          </div>
          <!-- <a class="navbar-brand" href="#"> <button type="submit">enviar</button> </a> -->
          <?php
          if(isset($_COOKIE["id"])){
            echo "<a type='button' id='btn_perfil' href='index.php?pagina=pefilDatos.php' class='btn btn-danger btnOcul'>Perfil</a>";
          }
          ?>
        </div>
      </nav>
<!-- final menu -->
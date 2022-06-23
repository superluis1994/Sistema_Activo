<!-- menu inicio -->
<!-- <h1>admin</h1> -->

<nav class='navbar navbar-expand-lg navbar-light bg-light shadow-lg  bg-body rounded'>
        <div class='container-fluid' style='font-family:sans-serif '>
          <a class='navbar-brand' href='index.php'><img src='img/recursos/logo.png' width='200' height='auto' class='img-thumbnail' alt='...'></a>
          <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse ' id='navbarNav'>
            
          
          </div>
          <!-- <a class='navbar-brand' href='#'> <button type='submit'>enviar</button> </a> -->
          <?php
          if(isset($_COOKIE["id"])){
            echo "<a type='button' id='btn_perfil' href='index.php?pagina=pefilDatos.php' class='btn btn-danger btnOcul'>Perfil</a>";
          }else{
            echo "<a type='button' id='' href='loguin.php' class='btn btn-danger btnOcul'>LOGUIN</a>";

          }
          ?>
        </div>
      </nav>
<!-- final menu -->
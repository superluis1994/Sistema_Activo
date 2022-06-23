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
        class=" col-sm-8 col-md-6 col-lg-4 offset-lg-4 offset-md-3  offset-sm-2  offset-4 p-3 shadow-lg p-3 mb-5 bg-white"
        style="border-radius: 15px; height:500px">
        <div class="col-12 text-center p-2">
          <img src="img/recursos/logo.png" width="300" height="auto" class="img-fluid p-4" alt="...">
        </div>
        <div class="col-11 p-4 mt-2">
          <form id="loguing" action="" method="post" enctype="multipart/form">
            <div class="mb-3 ">
              <label for="codigo" class="form-label">Codigos</label>
              <input type="number" name="codigo" class="form-control" id="codigo">

            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">Password</label>
              <input type="password" name="contra" class="form-control" id="pass">
            </div>
            <div class="mb-3 text-center">
              <button type="submit" class="btn btn-primary mt-4" id="btn_loguin" disabled>Iniciar</button>
            </div>
            <div class="mb-3 text-center">
              <a class="" data-bs-toggle="modal" data-bs-target="#modal-rest">
                Restablecer contraseña
              </a>
            </div>

          </form>
        </div>

      </div>

    </div>

  </div>
  <br>
  <br>
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="modal-rest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="restablecer-contra" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="restablecer-contra">Restablecer Contraseña</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
     
          <form id="restablecer_pass" action="" method="post" >
            <div class="mb-3 ">
              <label for="" class="form-label">Codigos</label>
              <input type="number"id="codigoRest" name="codigo" class="form-control" title="debe de ingresar el codigo de profesor " > 
             <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni architecto officia aliquam ad repellendus cumque
                illo eaque sapiente nulla pariatur culpa provident animi nisi aliquid deserunt, temporibus vero sint minus!</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btn_restablecer" disabled="true">Restablcer</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center p-3">
    © 2020 Copyright: <a class="text-grey" href="#">Itca Fepade</a>
  </div>
  <!-- Copyright -->
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/loguin/loguin.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>
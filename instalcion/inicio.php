<form id="loguing" action="" method="post" enctype="multipart/form">
<div class="row text-center text-muted">
                <div class="col-lg-6  ">
            <div class="mb-3 ">
              <label for="codigo" class="form-label">SERVIDOR</label>
              <input type="number" name="servidor" class="form-control input-paso1" id="servidor" placeholder="localhost">
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">BASE DE DATOS</label>
              <input type="password" name="baseDatos" class="form-control input-paso1" id="Db" placeholder="nombre de la base de datos">
            </div>
        </div>
        <div class=" col-lg-6  ">
            <div class="mb-3 ">
              <label for="usuario" class="form-label">USUARIO</label>
              <input type="number" name="usuario" class="form-control input-paso1" id="usuario" placeholder="root">

            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">CONTRASEÑA</label>
              <input type="password" name="pass" class="form-control input-paso1" id="pass" placeholder="opcional">
            </div>
            
        </div>
        <div class="mb-3 text-center">
            <button type="button" id="instalarDb" class="btn btn-primary mt-4">Instalar</button>
          <a href="instalacion.php?pagina=paso2.php" class="btn btn-primary mt-4">Siguiente</a>
        </div>
    </div>
</form>


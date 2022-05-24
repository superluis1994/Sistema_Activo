<form id="Dbase" action="" method="post" enctype="multipart/form">
<div class="row text-center text-muted">
                <div class="col-lg-6  ">
            <div class="mb-3 ">
              <label for="servidor" class="form-label">SERVIDOR</label>
              <input type="text" name="servidor" class="form-control input-paso1" id="servidor" placeholder="localhost">
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">BASE DE DATOS</label>
              <input type="text" name="baseDatos" class="form-control input-paso1" id="Db" placeholder="nombre de la base de datos">
            </div>
        </div>
        <div class=" col-lg-6  ">
            <div class="mb-3 ">
              <label for="usuario" class="form-label">USUARIO</label>
              <input type="text" name="usuario" class="form-control input-paso1" id="usuario" placeholder="root">

            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">CONTRASEÑA</label>
              <input type="password" name="pass" class="form-control input-paso1" id="pass" placeholder="opcional">
            </div>
            
        </div>
        <div class="mb-3 text-center" id="btn-paso">
            <button type="submit" id="instalarDb" class="btn btn-primary mt-4">Instalar</button>
        </div>
    </div>
</form>


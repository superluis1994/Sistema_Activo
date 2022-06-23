<form id="crearUsa" action="" method="post" enctype="multipart/form">
  <div class="row  justify-content-center text-muted">
    <div class="col-6">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" name='nombre' class="form-control " id="nombre" title="Nombres"
        placeholder="" required />
    </div>
    <div class="col-6">
      <label for="apellido" class="form-label">Apellidos</label>
      <input type="text" name='apellidos' class="form-control" id="apellidos" title="Apellidos"
        placeholder="" required />
    </div>
    <div class="col-4">
      <label for="codigo" class="form-label">Codigo</label>
      <input type="text" name="codigo" class="form-control" id="codigo" required />
    </div>
    <div class="col-6">
      <label for="passw" class="form-label">Contraseña</label>
      <input type="text" name="Cvl" class="form-control" id="Cvl" required disabled/>
    </div>
    <div class="col-2 align-middle">
     <br>
      <button type="button" id="btn_generarU" class="btn-sm btn-primary mt-2">Generar</button>
    </div>
    <div class="col-4 text-center ">
      <br>
      <input type="file" name="foto"  class="form-control" id="foto"  aria-label="Upload" hidden>
      <button type="button" id="btn_foto" class="btn btn-primary mt-3 btn-sm" style="width:200px;">Subir foto</button>    
  </div>
    <div class="col-8">
      <label for="correo" class="form-label">Correo</label>
      <input type="text" name="correo" class="form-control" id="correo" required />
    </div>
    <div class="col-10 text-center">
      <button type="submit" class="btn btn-primary mt-4">Crear Usuario</button>
      <a href="loguin.php" class="btn btn-primary mt-4" hidden>Finalizar</a>
    </div>

</form>
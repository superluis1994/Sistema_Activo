
<div class="row mt-4">
  <div class="col-10 offset-1">
    <div class="col-12 text-center">
      <p class="display-5 head">Registrar Usuario</p>
    </div>
    <form  id="form" action="" method="post" enctype="multipart/form">
      <div class="row">
      <div class="col-4">
        <div class="col-12 text-center">
        <img src="img/recursos/foto_default.jpg" id="img_visual" class="img-thumbnail" width="200" height="200"alt="...">
      </div>
      <div class="col-12 text-center">
        <input type="file" name="foto"  class="form-control" id="foto"  aria-label="Upload" hidden>
        <button type="button" id="btn_foto" class="btn btn-primary mt-3 btn-sm" style="width:200px;">Seleccionar</button>    
    </div>
  </div>
      
      <div class="col-8">
        <div class="row">
          <div class="col-5">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name='nombre' class="form-control " id="nombre"  title="Nombres" placeholder="Cristian Alexander" required/>
          </div>
          <div class="col-5">
            <label for="apellido" class="form-label">Apellidos</label>
            <input type="text" name='apellidos' class="form-control" id="apellidos"  title="Apellidos" placeholder="Ramirez Juarez" required/>
          </div>
          <div class="col-3">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" name="codigo" class="form-control" id="codigo" required/>
          </div>
          <div class="col-5">
            <label for="passw" class="form-label">Contraseña</label>
            <input type="text" name="passw" class="form-control" id="passw" required/>
          </div>
          <div class="col-2 align-middle">
          <button type="button" id="btn_generar" class="btn btn-primary mt-3">Generar</button>
          </div>
          <div class="col-6">
            <label for="correo" class="form-label">Correo</label>
            <input type="text" name="correo" class="form-control" id="correo" required/>
          </div>
          <div class="col-4">
            <label for="exampleInputPassword1" class="form-label">Tipo Usuario</label>
            <select class="form-select" name="tipo" id="tiposUsuL" aria-label="Default select example">
              <option selected>Seleccione Tipo</option>
              <option value="1">One</option>
            </select>
          </div>
          <div class="12 text-center">
            
            <button type="submit" id="btn_form" class="btn btn-primary mt-3 btn-xs">Registrar</button>
          </form>
          </div>
        </div>
      </div>

        <div class="mb-3"></div>

      </div>
  </div>
</div>
<?php



?>
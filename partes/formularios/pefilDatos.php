<div class='row mt-4'>
  <div class='col-10 offset-1' id="contedor_datos">

    <?php
    foreach ($_SESSION["datos"] as $key => $item){
      if($_COOKIE["id"]==$key){
        
        echo"
        <div class='col-12 text-center'>
          <p class='display-5 head'>Datos Del Usuario ".$item[1]." ".$item[2]."</p>
        </div>
        <form  id='form' action='' method='post' enctype='multipart/form'>
        <div class='row'>
        <div class='col-4'>
        <div class='col-12 text-center'>
        <img src='".$item[4]."'  id='img_visual' class='img-thumbnail' width='200' height='200'alt='...'>
        </div>
        <div class='col-12 text-center'>
        <input type='file' name='foto'  class='form-control' id='foto'  aria-label='Upload' hidden>
        <button type='button' id='btn_foto' class='btn btn-primary mt-3 btn-sm' style='width:200px;'>Seleccionar</button>    
        </div>
        </div>
        <div class='col-8'>
        <div class='row'>
        <div class='col-4'>
        <label for='nombre' class='form-label fw-bolder'>Nombre</label>
        <p class='form-control fw-bold text-muted'>".$item[1]."</p>
        </div>
        <div class='col-4'>
        <label for='apellido' class='form-label fw-bolder'>Apellidos</label>
        <p class='form-control fw-bold text-muted'  title='Apellidos'>".$item[2]."</p>
        </div>
        <div class='col-5'>
        <label for='codigo' class='form-label fw-bolder'>Codigo</label>
        <p class='form-control fw-bold text-muted' >".$item[0]."</p>
        </div>
        <div class=' row col-3 align-items-center mt-4'>
        <!-- <label for='passw' class='form-label'>Contraseña</label> -->
        <button type='button' id='passworEdit' class='btn-sm btn-primary'>Cambiar Contraseña</button>
        </div>
        <div class='col-8'>
        <label for='correo' class='form-label fw-bolder'>Correo</label>
        <input type='text' name='correo' class='form-control' id='correo' value='".$item[3]."' required/>
        </div>
        <div class='col-8 text-center'>
        
        <button type='submit' id='btn_form' class='btn btn-primary mt-3 btn-xs'>Actualizar Datos</button>
        </form>
        </div>
        </div>
      </div>

      </div>";
    }
    }
    
    ?>



<!-- Modal -->
<div class="modal fade" id="modal_pass_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-pass_edit_text" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-pass_edit_text">Cambio de Contraseña</h5>
        <button type="button" class="btn-close"  id="clos" aria-label="Close"></button>
      </div>
      <div class=" row modal-body justify-content-center">
        <p class="text-muted text-center">El cambiar la contraseña es necesario para tener una mayor seguridad que nadie
          mas puede acceder a nuestra cuenta
        </p>
        <div class="col-10">
          <form id="form_nuev" action="" method="post">
          <div class="form-floating mb-3">
            <input type="text " name="actual_pass" class="form-control psW" id="actual_pass" placeholder="name@example.com">
            <label for="actual_pass fw-bolder">Contraseña Actual</label>
          </div>
          <div class="form-floating mb-3">
            <div class="form-floating">
              <input type="text" name="nuev_pass" class="form-control psW" id="nuev_pass" placeholder="Password">
              <label for="nuev_pass fw-bolder">Nueva Contraseña</label>
            </div>
            <div class="alert alert-danger psW" id="msg" role="alert" hidden>
              Minimo 8 caracteres, Maximo 15, Al menos una letra mayúscula, 
              Al menos una letra minucula, Al menos un dígito, No espacios en blanco, 
              Al menos 1 caracter especial
            </div>
          </div>
          <div class="form-floating mb-3">
            <div class="form-floating">
              <input type="text" class="form-control psW" id="Re_pass" placeholder="Password">
              <label for="Re_pass fw-bolder">Re-Contraseña</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar" >Cancelar</button>
        <button type="submit" class="btn btn-primary">Cambiar</button>
      </form>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

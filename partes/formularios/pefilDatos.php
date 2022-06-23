<div class='row mt-4'>
  <div class='col-10 offset-1'>

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
        <label for='nombre' class='form-label'>Nombre</label>
        <input type='text' name='nombre' class='form-control' value='".$item[1]."' id='nombre'  title='Nombres' placeholder='Cristian Alexander' required/>
        </div>
        <div class='col-4'>
        <label for='apellido' class='form-label'>Apellidos</label>
        <input type='text' name='apellidos' class='form-control' id='apellidos' value='".$item[2]."'  title='Apellidos' placeholder='Ramirez Juarez' required/>
        </div>
        <div class='col-5'>
        <label for='codigo' class='form-label'>Codigo</label>
        <input type='text' name='codigo' class='form-control' id='codigo' value='".$item[0]."' required/>
        </div>
        <div class='col-3'>
        <label for='passw' class='form-label'>Contraseña</label>
        <input type='text' name='passw' class='form-control' id='passw' required/>
        </div>
        <div class='col-8'>
        <label for='correo' class='form-label'>Correo</label>
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
  </div>
</div>

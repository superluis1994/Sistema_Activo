<div class="row mt-4 justify-content-center">
  <div class="col-10 offset-1">
    <div class="col-12 text-center">
      <p class="display-5 head">Mover Activo</p>
    </div>
    <form  id="form_mov" action="" method="post" enctype="multipart/form">
      <div class="row justify-content-center">
      <div class="col-2">
        <div class="col-12 text-center">
        <img src="img/recursos/foto_default.jpg"  id="img_visual" class="" width="200" height="200"alt="...">
      </div>
  </div>

      <div class="col-8 mt-3">
        <div class="row justify-content-center">
          <div class="col-10">
          <div class="col-2">

            <label for="text" class="form-label"># Movimiento</label> 
            <input type="number" name=""class="form-control" id="numMovi">
          </div>
          <div class="row m-2" id="datosInput">
        </div>
      </div>

          
          <div class="col-5 ">
          
            <label for="nombre" class="form-label">Usuario que Entrega</label>
            <select name="select_box" class="form-select" id="usuarioEntre">
            </select>
          </div>
          <div class="col-5">
            <label for="apellido" class="form-label">Persona que Recibe</label>
            <select name="select_box" class="form-select" id="usuarioRecibe">
            </select>
          </div>
          <div class="col-5">
            <label for="apellido" class="form-label">Local de Salida</label>
            <select name="select_box" class="form-select" id="localSali">
            </select>
          </div>
          <div class="col-5">
            <label for="apellido" class="form-label">Local de Destino</label>
            <select name="select_box" class="form-select" id="localDes">
            </select>
          </div>
          <div class="col-5">
            <label for="text" class="form-label">Tipo de Movimiento</label> 
            <select name="select_box" class="form-select" id="Tmov">
          </select>
            
          </div>
          <div class="col-5 mt-3">
          <div class="form-floating">
            <textarea class="form-control" name="justificacion" placeholder="Leave a comment here" id="justificacion" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Justificacion del movimiento</label>
          </div>
        </div>
   
        
          <div class="10 text-center">
            
            <button type="submit" id="btn_form" class="btn btn-primary mt-3 btn-xs">Registrar</button>
          </div>
          
        </div>
      </div>



    </div>
  </form>
  </div>
</div>

<div class="row mt-4 justify-content-center">
  <div class="col-10 offset-1">
    <div class="col-12 text-center">
      <p class="display-5 head">Registrar Activo</p>
    </div>
    <form  id="form_ActRegs" action="" method="post" enctype="multipart/form">
      <div class="row justify-content-center">
      <div class="col-3">
        <div class="col-12 text-center">
        <img src="img/recursos/Activo.png"  id="img_visual" class="" width="200" height="200"alt="...">
      </div>
  </div>

      <div class="col-8 mt-3">
        <div class="row">

          <div class="col-4">
            <label for="nombre" class="form-label">Codigo ITCA</label>
            <input type="text" name='ACcodigo' class="form-control inputAct" id="RAcodigo" maxlength="9" minlength="9"  title="" placeholder="permiten 0-9" required/>
          </div>
         
          <div class="col-7">
            <label for="apellido" class="form-label">Nombre del Activo</label>
            <input type="text" name='ACnombre' class="form-control inputAct" id="RAnombre"  title="" placeholder="" required/>
          </div>
          <div class="col-4">
            <label for="text" class="form-label">Tipo de Activo</label> 
            <select name="tipoAct" class="form-select inputAct" id="tipoActivo">
          </select>
           
          <label for="apellido" class="form-label">Color</label>
          <input type="text" name='ACColor' class="form-control inputLocal" id="RAColor"  title="" placeholder="" required/>

          </div>
          <div class="col-7">
            <label for="apellido" class="form-label">Descripción</label>
            <div class="form-floating">
              <textarea class="form-control" name="descrip" placeholder="Brebe descripcion de 100 caracteres, permitido  #.-_ A-z 0-9" maxlength="100" minlength="1" id="descripcion" style="height: 109px"></textarea>
              <label for="floatingTextarea2">Breve descripcion #.-_ A-z 0-9</label>
            </div>
          </div>
          <div class="col-4 optActivo">
            <label for="text" class="form-label">Marca</label> 
            <input type="text" name='ACmarca' class="form-control inputLocal" id="RAmarca"  title="" placeholder="Samgsung"/>
          </div>
          <div class="col-3 optActivo">
            <label for="apellido" class="form-label">Modelo</label>
            <input type="text" name='ACmodelo' class="form-control" id="RAmodelo"  title="" placeholder="Gt-4567" />
          </div>
          <div class="col-3" id="dimenOpt">
            <label for="apellido" class="form-label">Dimensions</label>
            <input type="text" name='ACdimensiones' class="form-control" id="RAdimensiones"  title="" placeholder="4X4X6" />
          </div>
          <div class="col-4">
            <label for="apellido" class="form-label">Codigo Mined</label>
            <input type="text" name='ACmined' class="form-control inputLocal" id="RAmined"  title="" placeholder="" required/>
          </div>
          <div class="col-4">
            <label for="apellido" class="form-label">Codigo Interno</label>
            <input type="text" name='ACinterno' class="form-control inputLocal" id="RAinterno"  title="" placeholder="" required/>
          </div>
          <div class="col-2">
           <label for="apellido" class="form-label">Valor en $</label>
          <input type="number" name='ACvalor' class="form-control inputAct" id="RAvalorR"  title="" placeholder="" required/>
          </div>
          <div class="col-3">
            <label for="apellido" class="form-label">Serie</label>
            <input type="text" name='ACserieActivo' class="form-control inputLocal" id="RAserie"  title="" placeholder="" required/>
          </div>
          <div class="col-2">
            <label for="apellido" class="form-label">Vida Util</label>
            <input type="number" name='ACvidaUti' class="form-control inputLocal" id="RAvidaU"  title="" placeholder="Años" required/>
          </div>
          <div class="col-4">
            <label for="text" class="form-label">Local de pertenecia</label> 
            <select name="localPert" class="form-select inputLocal" id="localPertenece">
            </select>
          </div>
          <div class="col-4">
            <label for="text" class="form-label">Resposable de Activo</label> 
            <select name="responsable" class="form-select inputLocal" id="jef">
            </select>
          </div>
          <div class="col-7">
              <label for="formFile" class="form-label">Foto</label>
              <input class="form-control" name="fot" type="file" id="formFile">
          </div>
        
          <div class="col-10 text-center">
            <button type="submit" id="btn_form" class="btn btn-primary mt-3">Registrar</button>
          </div>
          
        </div>
      </div>



    </div>
  </form>
  </div>
</div>

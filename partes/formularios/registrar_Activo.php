<div class="row mt-4 justify-content-center">
  <div class="col-10 offset-1">
    <div class="col-12 text-center">
      <p class="display-5 head">Registrar Activo</p>
    </div>
    <form  id="form_local" action="" method="post" enctype="multipart/form">
      <div class="row justify-content-center">
      <div class="col-3">
        <div class="col-12 text-center">
        <img src="img/recursos/Activo.png"  id="img_visual" class="" width="200" height="200"alt="...">
      </div>
  </div>

      <div class="col-8 mt-3">
        <div class="row">

          <div class="col-4">
            <label for="nombre" class="form-label">Codigo</label>
            <input type="text" name='Lcodigo' class="form-control inputLocal" id="Lcodigo"  title="" placeholder="" required/>
          </div>
         
          <div class="col-6">
            <label for="apellido" class="form-label">Nombre del Activo</label>
            <input type="text" name='Lnombre' class="form-control inputLocal" id="Lnombre"  title="" placeholder="" required/>
          </div>
          <div class="col-4">
            <label for="text" class="form-label">Tipo de Activo</label> 
            <select name="select_box" class="form-select inputLocal" id="jef">
          </select>

          <label for="apellido" class="form-label">Valor Razonable</label>
          <input type="text" name='Lnombre' class="form-control inputLocal" id="Lnombre"  title="" placeholder="" required/>
          </div>
          <div class="col-6">
            <label for="apellido" class="form-label">Descripción</label>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 109px"></textarea>
              <label for="floatingTextarea2">Breve descripcion del activo </label>
            </div>
          </div>
          <div class="col-3">
            <label for="text" class="form-label">Marca</label> 
            <select name="select_box" class="form-select inputLocal" id="jef">
          </select>
          </div>
          <div class="col-3">
            <label for="apellido" class="form-label">Modelo</label>
            <input type="text" name='Lnombre' class="form-control inputLocal" id="Lnombre"  title="" placeholder="" required/>
          </div>
          <div class="col-4">
            <label for="apellido" class="form-label">Dimensions</label>
            <input type="text" name='Lnombre' class="form-control inputLocal" id="Lnombre"  title="" placeholder="" required/>
          </div>
          <div class="col-3">
            <label for="apellido" class="form-label">Serie</label>
            <input type="text" name='Lnombre' class="form-control inputLocal" id="Lnombre"  title="" placeholder="" required/>
          </div>
          <div class="col-3">
            <label for="apellido" class="form-label">Vida Util</label>
            <input type="text" name='Lnombre' class="form-control inputLocal" id="Lnombre"  title="" placeholder="En Años" required/>
          </div>
          <div class="col-4">
            <label for="text" class="form-label">Local de pertenecia</label> 
            <select name="select_box" class="form-select inputLocal" id="jef">
            </select>
          </div>
          <div class="col-5">
            <label for="text" class="form-label">Resposable de Area</label> 
            <select name="select_box" class="form-select inputLocal" id="jef">
            </select>
          </div>
          <div class="col-5">
              <label for="formFile" class="form-label">Foto</label>
              <input class="form-control" type="file" id="formFile">
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

<div class="row mt-4 justify-content-center">
  <div class="col-10 offset-1">
    <div class="col-12 text-center">
      <p class="display-5 head">Registrar Local</p>
    </div>
    <form  id="form_local" action="" method="post" enctype="multipart/form">
      <div class="row justify-content-center">
      <div class="col-2">
        <div class="col-12 text-center">
        <img src="img/recursos/locales.png"  id="img_visual" class="" width="200" height="200"alt="...">
      </div>
  </div>

      <div class="col-8 mt-3">
        <div class="row justify-content-center">
          <div class="col-8">

          <div class="mb-3 ">
          
            <label for="nombre" class="form-label">Codigo</label>
            <input type="text" name='Lcodigo' class="form-control inputLocal" id="Lcodigo"  title="" placeholder="" required/>
          </div>
          <div class="mb-3">

            <label for="apellido" class="form-label">Nombre de Local</label>
            <input type="text" name='Lnombre' class="form-control inputLocal" id="Lnombre"  title="" placeholder="" required/>
          </div>
          <div class="mb-3">
            <label for="text" class="form-label">Resposable de Area</label> 
            <select name="select_box" class="form-select inputLocal" id="jef">
          </select>
            
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

<div class="row mt-4 justify-content-center">
  <div class="col-10 offset-1">
    <div class="col-12 text-center">
      <p class="display-5 head">Mover Activo</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-2">
        <div class="col-12 text-center">
          <img src="img/recursos/movimientos.webp"  id="img_visual" class="" width="200" height="200"alt="...">
      </div>
    </div>
    
    <div class="col-8 mt-3">
        <form  id="form_mov" action="" method="post" >
        <div class="row justify-content-center">
          <!-- <div class="col-10">
          <div class="col-2">

            <label for="text" class="form-label"># Movimiento</label> 
            <input type="number" name=""class="form-control" id="numMovi">
          </div>
          <div class="row m-2" id="datosInput">
        </div>
      </div> -->

          
          <div class="col-5" id="dat">
          
            <label for="nombre" class="form-label">Usuario que Entrega</label>
            <select name="usuarioEntre"  class="form-select" id="usuarioEntre">
            </select>
          </div>
           <div class="col-5">
            <label for="apellido" class="form-label">Persona que Recibe</label>
            <select name="usuarioRecibe" class="form-select" id="usuarior">
            </select>
          </div> 
          <div class="col-5">
            <label for="apellido" class="form-label">Local de Salida</label>
            <select name="localSali" class="form-select" id="localSali">
            </select>
          </div>
          <div class="col-5">
            <label for="apellido" class="form-label">Local de Destino</label>
            <select name="localDes" class="form-select" id="localDes">
            </select>
          </div>
          <div class="col-5">
            <label for="text" class="form-label">Tipo de Movimiento</label> 
            <select name="Tmov" class="form-select" id="Tmov">
          </select>
            
          </div>
          <div class="col-5 mt-3">
          <div class="form-floating">
            <textarea class="form-control" name="justificacion" placeholder="Leave a comment here" id="justificacion" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Justificacion del movimiento</label>
          </div>
        </div>
   
        
          <div class="10 text-center">
            
            <button type="submit" id="btn_form" class="btn btn-primary mt-3 btn-xs">Elegir Activos</button>
          </div>
          
        </div>
      <!-- </form> -->
      </div>



    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="listActi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Activos al Movimiento</h5>
        <button type="button" class="btn-close" id="close" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="contenedor">
        <form action="" method="post" enctype="multipart/form">
          
          <div class="row">
            <div class="row">

              <div class="col-5">
                <div class="md-3">
                  <div class="mb-3">
                    <label for="" class="form-label">codigo</label>
                    <input type="text"
                      class="form-control" name="" id="codigoBusq" aria-describedby="helpId" placeholder="">
                  </div>
                  <div class="card mb-3" id="resultado" style="max-width: 540px;">
                   
                  </div>
                </div>

              </div>
              <div class="col-7">
                <div  style="height: 400px; overflow: scroll;">

                  <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Serie</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="activosList">
                     
                    </tbody>
                  </table>
                </div>
                

              </div>
            </div>
            
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancelar" >Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn-registrarMov">Registrar</button>
      </div>
    <!-- </form> -->
    </div>
  </div>
  </form>
</div>
</div>

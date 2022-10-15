<div class="row mt-4">
    <div class="col-10 offset-1">
        <form id="form" action="" method="post" enctype="multipart/form">
            <div class="row  mt-5">
                <div class="col-1">
                        <div class="col-12 justify-content-center">
                        <p class="display-5">Conexiones</p>
                        <img src="img/recursos/conexion.png" id="img_visual" class="" width="200"
                            height="200" alt="...">
                    </div>
                </div>

                <div class="col-11">
                    <div class="row justify-content-end">
                        <div class="row justify-content-end"> 
                        <!-- <div class="col-3">
                          <input type="date" class="form-control" name="tiempo" id="">
                          <input type="date" class="form-control" name="tiempo" id="">
                        </div> -->
                        <div class="col-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">INICIO</label>
                            <div class="col-10">
                            <input type="date" class="form-control" name="tiempoI" id="tiempoI">
                            </div>
                          </div>
                          <div class="col-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">FINAL</label>
                            <div class="col-10">
                            <input type="date" class="form-control" name="tiempoF" id="tiempoF">
                            </div>
                          </div>
                            <div class="col-4 text-end ">
                              <a name="" id="GReportrC" class="btn btn-danger mb-2"  role="button">Reportes</a>
                                <input type="text" name='Lcodigo' class="form-control " id="Inp_buscar"  title="btn_buscar" placeholder="Buscar Carnet" />
                          </div>
                        </div>
                          <div class="col-10 mt-2">
                          <div style="height: 400px; overflow-Y: scroll;">
                              <table class="table-bordered table table-striped table-hover scrollspy" height="300" >
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                              
                              </tr>
                            </thead >
                            <tbody id="listConexiones">
                              
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="col-10 mt-2 text-center">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center" id="pagList">
                            
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                    
                  </form>
    </div>
  </div>
  
  
  
  
  
  <!-- Modal de detalles de reporte -->
  <div class="modal fade" id="detalleReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloMdP">GENERAR REPORTE DE CONEXIONES</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="contenedorDetalle">
        <form action="">

          <div class="row">
            
            <div class="col-7">
              
              <div class="row">
                <div class="col-11">
                  <p>Tipo de registro</p> 
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipoRegistro" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Todos los registros</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipoRegistro" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Registro especifico</label>
                  </div>
          
                  <!-- verificar -->
                  <hr>
          <div class="row g-3">
            <div class="col-2">
              <label for="staticEmail2" class="label">Carnet</label>
              <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com"> -->
            </div>
            <div class="col-5">
              <label for="inputPassword2" class="visually-hidden">Ej: 130125</label>
              <input type="password" class="form-control" id="inputPassword2" placeholder="Ej: 130125">
            </div>
            <div class="col-5">
              <button type="submit" class="btn btn-primary mb-3">Verificar</button>
            </div>
          </div>
        
        </div>
        
        <div class="col-11">
          <p>Tipo de Registro con rango de fecha</p> 
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rangofecha" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Sin rango</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rangofecha" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">con rango</label>
          </div>
        
        <!-- verificar -->
        <hr>
        <div class="row">

          <div class="col-6">
            <label for="inputPassword" class="col-sm-2 col-form-label">INICIO</label>
            <div class="col-10">
              <input type="date" class="form-control" name="tiempoI" id="tiempoI">
            </div>
          </div>
          <div class="col-6">
            <label for="inputPassword" class="col-sm-2 col-form-label">FINAL</label>
            <div class="col-10">
              <input type="date" class="form-control" name="tiempoF" id="tiempoF">
            </div>
          </div>
        </div>
        <hr>
        
      </div>
      <div class="col-11 g-3 text-center">
        <button type="button" class="btn btn-danger ">Procesar Reporte</button>
      </div>
    </div>
  </div>
  <div class="col-4">
    <img src="http://localhost/Sistema_activo/img/recursos/conexion.png" alt="" width="300" >
    
    
  </div>
</div>
</form>
  </div>
  <!-- <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" id="permisoRgT" class="btn btn-primary">Actualizar</button>
  </div> -->
</div>
</form>
</div>
</div>
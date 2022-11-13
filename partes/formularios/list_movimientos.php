<div class="row mt-4">
    <div class="col-10 offset-1">
        <form id="form" action="" method="post" enctype="multipart/form">
            <div class="row  mt-5">
                <div class="col-1">
                        <div class="col-12 justify-content-center">
                        <p class="display-5">Movimientos</p>
                        <img src="img/recursos/movimientosList.png" id="img_visual" class="" width="200"
                            height="200" alt="...">
                    </div>
                </div>

                <div class="col-11">
                    <div class="row justify-content-end">
                        <div class="row justify-content-end"> 
                        <div class="col-5">
                           <div class="row  justify-content-end">
                           <div class="col-5" id="report_activo_gene"> 
                           <!--<button type="button" class="btn btn-danger">Reporte General</button> -->
                       </div>
                           <div class="col-4">
                                <label class="form-control">Busqueda:</label>
                              </div>
                           </div>
                            </div>
                            <div class="col-5">
                                <input type="text" name='Lcodigo' class="form-control " id="btn_buscar"  title="btn-buscar" placeholder="Codigo, Nombre o Jefe" />
                          </div>
                        </div>
                          <div class="col-10 mt-2">
                           
                              <table class="table-bordered table table-striped table-hover">
                                  <thead>
                                      <tr>
                                          <th scope="col">Id</th>
                                <th scope="col">Usurio Entrega</th>
                                <th scope="col">Usuario Recibe</th>
                                <th scope="col">Local Salida</th>
                                <th scope="col">Local Destino</th>
                                <?php
                                if($_SESSION["datos"][$_COOKIE["id"]][5]==1){
                                echo"<th scope='col'>Tipo</th>";
                                }
                                ?>
                                <th colspan="2" scope="col" class="text-center"> Opciones</th>
                   
                              </tr>
                            </thead>
                            <tbody id="rspuets_list_mov">
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 mt-2 text-center">
                    <nav aria-label="...">
                            <ul class="pagination justify-content-center" id="pag">
                            </ul>
                          </nav>

                    </div>
                </div>
                </div>

        </form>
    </div>
</div>


<!-- Modal de permisos -->
<div class="modal fade" id="detalleMov" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloMdP">Permisos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="contenedorDetalle">
      <div class="row">
        <div class="col-5">
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title" id="id_mov">Card title</h5>
              <p class="card-text" id="justificacion">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="card" style="width: 22rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" id="recibeUS">vacio</li>
                  <li class="list-group-item" id="entregaUS">vacio</li>
                  <li class="list-group-item" id="entregaLO">vacio</li>
                  <li class="list-group-item" id="destinoLO">vacio</li>
                  <li class="list-group-item" id="tipoMov">A third item</li>
                </ul>
              </div>
              <p class="card-text"><small class="text-muted" id="fechayhora">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
       </div>
        </div>
        <div class="col-7">
         
          <div style="height: 400px; overflow-Y: scroll;" id="cont">

     
        
        </div>
          
        </div>
      </div>
  </div>
  <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" id="permisoRgT" class="btn btn-primary">Actualizar</button>
        </div> -->
</div>
</form>
</div>
</div>
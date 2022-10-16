<div class="row mt-4">
    <div class="col-10 offset-1">
        <form id="form" action="" method="post" enctype="multipart/form">
            <div class="row  mt-5">
                <div class="col-1">
                        <div class="col-12 justify-content-center">
                        <p class="display-5">Activos</p>
                        <img src="img/recursos/users.png" id="img_visual" class="" width="200"
                            height="200" alt="...">
                    </div>
                </div>

                <div class="col-11">
                    <div class="row justify-content-end">
                        <div class="row justify-content-end"> 
                        <div class="col-5">
                            <div class="row justify-content-end">
                              <div class="col-5">
                              <button class="btn btn-danger" style="" id="report_activo_gene">Reporte General</button>
                              </div>
                              <div class="col-4">
                                <label class="form-control">Busqueda:</label>
                              </div>
                            </div>
                            </div>
                            <div class="col-5" id="busqueda">
                                <input type="text" name='Lcodigo' class="form-control " id="btn-buscar"  title="btn-buscar" placeholder="------------" >
                          </div>
                          <div class="col-5" id="busquedaPer" hidden>
                          
                            <select name="select_box" class="form-select inputLocal" id="jef">
                              <option value="1">fddfgfg</option>
                              <option value="1">fddfgfg</option>
                              <option value="1">fddfgfg</option>
                            </select>
                          </div>
                        </div>
                          <div class="col-10 mt-2">
                           
                              <table class="table-bordered table table-striped table-hover">
                                  <thead>
                                      <tr>
                                          <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo Activo</th>
                                <th scope="col">Reponsable</th>
                                <th scope="col">Local</th>
                                <?php
                             if($_SESSION["datos"][$_COOKIE["id"]][5]==1){

                                echo"<th colspan='2' scope='col'></th>";
                             }
                                ?>
                              </tr>
                            </thead>
                            <tbody id="filas_activos">
                             
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 mt-2 text-center " id="pag" style=''>
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                </div>
                </div>

        </form>
    </div>
</div>

<!-- Modal de detalles Activo -->
<div class="modal fade" id="detalleActivo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloMdP">Detalles del Activo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="contenedorDetalle">
      <div class="row">
        <div class="col-5">
          <div class="card" style="width: 15rem;">
            <img src="img/recursos/foto_default.jpg" class="card-img-top" id="img_detal" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="nombreActiTex">Card title</h5>
              <p class="card-text" id="descripcionAct">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-7">
         
          <div style="height: 400px; overflow-Y: scroll;" id="cont">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Caracteristica</th>
                  <th scope="col">Valor</th>
                </tr>
              </thead>
              <tbody id="caractActivo">

              </tbody>
            </table>
        </div>
        </div>
      </div>
  </div>

  <div class="modal-footer">
          <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>-->
          <button type="button" id="reporte_unit_activo" class="btn btn-danger">Reporte</button>
        </div>
</div>
</form>
</div>
</div>


<!-- Modal actualizar -->
<div class="modal fade" id="modal_activo_update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloMdP">Detalles del Activo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="contenedorDetalle">
      <div class="row">
        <div class="col-5">
          <div class="card" style="width: 15rem;">
            <img src="img/recursos/foto_default.jpg" class="card-img-top" id="img_acti" alt="...">
            <div class="card-body">
              <h5 class="card-title" id="nombreActiTex">Card title</h5>
              <p class="card-text" id="descripcionAct">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-7">
         
          <div style="height: 400px; overflow-Y: scroll;" id="cont">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Caracteristica</th>
                  <th scope="col">Valor</th>
                </tr>
              </thead>
              <tbody id="caractActivo">

              </tbody>
            </table>
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
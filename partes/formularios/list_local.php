<div class="row mt-4">
    <div class="col-10 offset-1">
        <form id="form" action="" method="post" enctype="multipart/form">
            <div class="row  mt-5">
                <div class="col-1">
                        <div class="col-12 justify-content-center">
                        <p class="display-5">Locales</p>
                        <img src="img/recursos/users.png" id="img_visual" class="" width="200"
                            height="200" alt="...">
                    </div>
                </div>

                <div class="col-11">
                    <div class="row justify-content-end">
                        <div class="row justify-content-end"> 
                        <div class="col-4">
                          
                              <div class="row justify-content-end">

                                   <div class="col-6" id="btn_report">
                                  <!--mostrat boton-->
                                   </div>
                                   <div class="col-5">
                                    <label class="form-control">Busqueda:</label>
                                   </div>
                              </div>
              
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control " id="buscar"  title="btn-buscar" placeholder="------------"/>
                          </div>
                        </div>
                          <div class="col-10 mt-2">
                          <div style="height: 400px; overflow-Y: scroll;">
                           
                              <table class="table-bordered table table-striped table-hover">
                                  <thead>
                                      <tr>
                                          <th scope="col">Id</th>
                                <th scope="col">Nombre del local </th>
                                <th scope="col">Encargado del local</th>
                                <th scope="col">Fecha de Registro</th>
                                <th scope="col">Registrado por</th>
                                <?php
                                if($_SESSION["datos"][$_COOKIE["id"]][5]==1){
                                echo"<th scope='col'>Estado</th>";
                                }
                                ?>
                              </tr>
                            </thead>
                            <tbody id="lis_local">
                              
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="col-10 mt-2 text-center">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center" id="pagination">
                             
                            </ul>
                          </nav>
                    </div>
                </div>
                </div>

        </form>
    </div>
</div>

<div class="modal" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title">Actualizar Datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body " >

     <div id="cargar_lista"></div>

     <div class="mb-3 row">
     <label for="inputPassword" class="col-sm-2 col-form-label">Encargado: </label>
     <div class="col-sm-10">
     <select name="select_box" class="form-select inputLocal" id="jef">
          </select>
     </div>
   </div>

      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>-->
        <button type="button" class="btn btn-primary" id="save">Actualizar</button>
      </div>
    </div>
  </div>
</div>
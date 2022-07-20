<div class="row mt-4">
    <div class="col-10 offset-1">
        <form id="form" action="" method="post" enctype="multipart/form">
            <div class="row  mt-5">
                <div class="col-1">
                        <div class="col-12 justify-content-center">
                        <p class="display-5">Movimientos</p>
                        <img src="img/recursos/users.png" id="img_visual" class="" width="200"
                            height="200" alt="...">
                    </div>
                </div>

                <div class="col-11">
                    <div class="row justify-content-end">
                        <div class="row justify-content-end"> 
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1" ckeck="checked">Codigo</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Nombre</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="inlineCheckbox3" value="option3" >
                                <label class="form-check-label" for="inlineCheckbox3">Jefe</label>
                              </div>
                            </div>
                            <div class="col-5">
                                <input type="text" name='Lcodigo' class="form-control " id="btn-buscar"  title="btn-buscar" placeholder="Buscar Usuario" required/>
                          </div>
                        </div>
                          <div class="col-10 mt-2">
                           
                              <table class="table-bordered table table-striped table-hover">
                                  <thead>
                                      <tr>
                                          <th scope="col">Id</th>
                                <th scope="col">Usurio Entrega</th>
                                <th scope="col">Ususrio Recibe</th>
                                <th scope="col">Local Salida</th>
                                <th scope="col">Local Destino</th>
                                <th scope="col">Tipo</th>
                              </tr>
                            </thead>
                            <tbody id="rspuets_list_mov">
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="col-10 mt-2 text-center">
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
                  <li class="list-group-item" id="entregaLO">vacio</li>
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
          <!-- <div class="container px-4">
          <div class="row gx-5" >
            <div class="col-3" style=" background-color: aquamarine;" >
              <div class="card" >
                <img src="img/recursos/users.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the.</p>
                </div>
            </div>
            </div>
            <div class="col-3" style=" background-color: aquamarine;" >
              <div class="card" width="200">
                <img src="img/recursos/users.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the.</p>
                </div>
            </div>
            </div>
            </div>
           
          
            
          </div> -->
          <!-- <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
             
            </tbody>
          </table> -->
          <div style="height: 400px; overflow-Y: scroll;">

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="max-width: 540px;" id="list_acti_detall">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        
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
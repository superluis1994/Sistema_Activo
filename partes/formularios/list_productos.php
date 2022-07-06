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
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="tipoBus" id="op1"  value="option1" checked>
                                <label class="form-check-label" for="inlineCheckbox1">Codigo</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="op2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Nombre</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="opt" value="option3" >
                                <label class="form-check-label" for="inlineCheckbox3">Tipo Activo</label>
                              </div>
                            </div>
                            <div class="col-5" id="busqueda">
                                <input type="text" name='Lcodigo' class="form-control " id="btn-buscar"  title="btn-buscar" placeholder="Buscar" required/>
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
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                  <td>@mdo</td>
                                  <td><button type="button" class="btn btn-primary">Detalles</button></td>
                                  <td><button type="button" class="btn btn-primary">Actualizar</button></td>
                                </tr>
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
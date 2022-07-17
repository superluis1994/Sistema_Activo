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
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1" ckeck="checked">Carnet</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Nombre</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipoBus" id="inlineCheckbox3" value="option3" >
                                <label class="form-check-label" for="inlineCheckbox3">Apellido</label>
                              </div>
                            </div>
                            <div class="col-5">
                                <input type="text" name='Lcodigo' class="form-control " id="btn-buscar"  title="btn-buscar" placeholder="Buscar Usuario" required/>
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
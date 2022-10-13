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
                              <a name="" id="" class="btn btn-danger mb-2" href="#" role="button">Reportes</a>
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
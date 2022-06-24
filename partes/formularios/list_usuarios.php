<div class="row mt-4">
    <div class="col-10 offset-1">
        <form id="form" action="" method="post" enctype="multipart/form">
            <div class="row  mt-5">
                <div class="col-1">
                        <div class="col-12 justify-content-center">
                        <p class="display-5">Usuarios</p>
                        <img src="img/recursos/users.png" id="img_visual" class="" width="200"
                            height="200" alt="...">
                    </div>
                </div>
              </form>

                <div class="col-11">
                  <div class="row justify-content-end">
                    <div class="row justify-content-end"> 
                      <div class="col-4">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tipoBus" id="tipoBus" value="carnet" checked>
                          <label class="form-check-label" for="inlineCheckbox1">Carnet</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tipoBus" id="tipoBus" value="nombre">
                          <label class="form-check-label" for="inlineCheckbox2">Nombre</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tipoBus" id="tipoBus" value="apellido" >
                          <label class="form-check-label" for="inlineCheckbox3">Apellido</label>
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
                                          <th scope="col">Foto</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <?php 
                                if($_SESSION["datos"][$_COOKIE["id"]][5]==1)
                                {
                                     echo " <th scope='col'>Estado</th>
                                            <th scope='col'>Accion</th>";
                                } 
                                ?>
                              </tr>
                            </thead>
                            <tbody id="list_resul">
                              
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

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="mdMuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-4">
          <img src="" id="img" class="img-thumbnail img-fluid rounded-start" height="500" width="500" >
        </div>
        <di class="col-8">
        <div class="row">
          <div class="col-12">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name='Anombre' class="form-control " id="Anombre"  title="Nombres" placeholder="Cristian Alexander" required/>
          </div>
          <div class="col-12">
            <label for="apellido" class="form-label">Apellidos</label>
            <input type="text" name='Aapellidos' class="form-control" id="Aapellidos"  title="Apellidos" placeholder="Ramirez Juarez" required/>
          </div>
        </div>
      </div>
        <div class="row">
          
          <div class="col-6">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" name="Acodigo" class="form-control" id="Acodigo" required/>
          </div>
          <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Tipo Usuario</label>
            <select class="form-select" name="Atipo" id="AtiposUsuL" aria-label="Default select example">
              <option selected>Seleccione Tipo</option>
              <option value="1">One</option>
            </select>
          </div>
          <div class="col-12">
            <label for="correo" class="form-label">Correo</label>
            <input type="text" name="Acorreo" class="form-control" id="Acorreo" required/>
          </div>
          <div class="col-12">
            <label for="passw" class="form-label">Contraseña</label>
            <input type="text" name="Apassw" class="form-control" id="Apassw" required disabled/>
          </div>
          <div class="col-10 align-middle">
            <button type="button" id="btn_generarMob" class="btn btn-primary mt-3">Resetear Contraseña</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
    </div>
  </div>
</div>
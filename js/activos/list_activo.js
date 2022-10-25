$("#pag").on ("click","#pagUser",function(e)
{   getInformation(e.target.name) })

//cargar evento
function getInformation(getNom){

  
  let conditions = "";
  let pag_limiter=3;
 if (getNom) {
  pag_limiter=getNom
 }

  let getRequire =  document.getElementById('btn-buscar').value
    if(getRequire == ""){
      conditions="tabla_list_activo"
      //document.getElementById("pag").style.visibility="visible"
      document.getElementById("report_activo_gene").style.visibility="visible"
        
    }else{
  
      conditions="buscarfiltro"
      document.getElementById("report_activo_gene").style.visibility="hidden"
      //document.getElementById("pag").style.visibility="hidden"
    }
  
  dataform = new FormData()
  dataform.append("accion",conditions )
  dataform.append("buscar",getRequire)
  dataform.append("num_limit",pag_limiter)
  
  fetch("partes/procesoForm/list_activo.php", {
    method: "POST",
    body:dataform,
   })
   .then((res) => res.json())
    .then((data) => {
      //console.log(data.cam)
      
      document.getElementById("filas_activos").innerHTML = data.tabla
      document.getElementById("pag").innerHTML= data.paginacion

  
    })

}

getInformation()

//Detalles de Activos  
$("#filas_activos").on ("click","#detalleActi",function(e){ 
  $('#detalleActivo').modal('show');

  inMod = new FormData();
  inMod.append("accion","infAct");
  inMod.append("id", e.target.value);

  fetch("partes/procesoForm/list_activo.php", {
    method: "POST",
    body: inMod,
  })
    .then((res) => res.json())
    .then((data) => {
      document.getElementById("caractActivo").innerHTML = data.filas;
      document.getElementById("nombreActiTex").innerHTML=data.nombre;
      document.getElementById("descripcionAct").innerHTML=data.descripcion;
      document.getElementById("img_detal").setAttribute("src",data.img);

    })

 })

 /////////////////pasar foto
document.getElementById("btn_img").addEventListener("change", function() {
  mostrar=document.querySelector("#img_actu")
  archivos = document.querySelector("#btn_img").files
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
  $document.mostrar.src = "img/recursos/foto_default.jpg";
  return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  mostrar.src = objectURL;
  })

  //Guardar cambios
  document.getElementById("save_update").addEventListener("click",function(){
   //let id= document.getElementById("codigo_mined").value
   let respo=  document.getElementById("respon").value
   let local =  document.getElementById("local_option").value
   let tipo_activo =  document.getElementById("clase_activo").value
  

 alert(local)
 // alerta("error","Opcion no configurada","Falta configuracion")
  
  })

 //Cargar datos para actualizar
 $("#filas_activos").on ("click","#update",function(e){ 
 $('#modal_activo_update').modal('show');
 
 fordata = new FormData()
 fordata.append("accion","cargardatos_up")
 fordata.append("id",e.target.value)
 
 fetch("partes/procesoForm/list_activo.php", {
  method: "POST",
  body:fordata,
 })
 .then((res) => res.json())
 .then((data) => {

document.getElementById("cargarActivo").innerHTML = data.filas
document.getElementById("editdescript").innerHTML=data.descripcion
document.getElementById("nombActivo").innerHTML=data.nombre
document.getElementById("img_actu").setAttribute("src",data.img);
document.getElementById("respon").innerHTML = data.usuarios
document.getElementById("local_option").innerHTML = data.locales_lis
document.getElementById("clase_activo").innerHTML = data.tipos_activo
 })
 })

 document.getElementById('btn-buscar').addEventListener("keyup",function(){
  getInformation()
 })
 



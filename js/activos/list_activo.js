inFrom = new FormData();
  inFrom.append("accion", "tabla_list_activo");
  inFrom.append("inferior", "0");
  inFrom.append("superior", "20");
  fetch("partes/procesoForm/list_activo.php", {
    method: "POST",
    body: inFrom,
  })
    .then((res) => res.json())
    .then((data) => {
      document.getElementById("filas_activos").innerHTML = data
    })


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
 })
 })

 //Busque varios campos
document.getElementById("btn-buscar").addEventListener("keyup",function(e){
let conditions = "";
if(e.target.value == ""){
conditions="tabla_list_activo"
document.getElementById("pag").style.visibility="visible"
document.getElementById("report_activo_gene").style.visibility="visible"
  
}else{
  conditions="buscarfiltro"
  document.getElementById("report_activo_gene").style.visibility="hidden"
  document.getElementById("pag").style.visibility="hidden"
}  
dataform = new FormData()
dataform.append("accion",conditions )
dataform.append("buscar",e.target.value)
dataform.append("inferior", "0")
dataform.append("superior", "20")

fetch("partes/procesoForm/list_activo.php", {
  method: "POST",
  body: dataform,
})
  .then((res) => res.json())
  .then((data) => {
    console.log(data)
    
    document.getElementById("filas_activos").innerHTML = data

  })

})
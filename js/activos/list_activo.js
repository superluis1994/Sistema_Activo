
// window.onload = function () {
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
      document.getElementById("filas_activos").innerHTML = data;

      // document.getElementById("pagination").innerHTML=data.paginacion;
      // console.log(data)  https://www.youtube.com/watch?v=IP2Ye2KKfoc
    })
// }

//Detalles de Activos  
$("#filas_activos").on ("click","#detalleActi",function(e){ 
  $('#detalleActivo').modal('show');
 // alert(e.target.value)
 // let foto = document.getElementById("img_detal")
  inMod = new FormData();
  inMod.append("accion","infAct");
  inMod.append("id", e.target.value);

  fetch("partes/procesoForm/list_activo.php", {
    method: "POST",
    body: inMod,
  })
    .then((res) => res.json())
    .then((data) => {
     // $('#detalleActivo').modal('show')
      document.getElementById("caractActivo").innerHTML = data.filas;
      document.getElementById("nombreActiTex").innerHTML=data.nombre;
      document.getElementById("descripcionAct").innerHTML=data.descripcion;
      document.getElementById("img_detal").setAttribute("src",data.img);
      // $("#img_acti").attr("src",data.foto);
      // console.log(data.filas);
     

    })

 })

 //Actualizar datos
 $("#filas_activos").on ("click","#update",function(e){ 
 $('#modal_activo_update').modal('show');
 
 alert(e.target.value)


 })

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
    
    document.getElementById("filas_activos").innerHTML = data;
   // document.getElementById("filas_activos").innerHTML = data.fila;
     
    //document.getElementById("filas_activos").innerHTML = data.fila;
    // document.getElementById("pagination").innerHTML=data.paginacion;
    // console.log(data)  https://www.youtube.com/watch?v=IP2Ye2KKfoc
  })

})

/*
$("#filas_activos").on("click","#detalleActi",function(e)
{
  inMod = new FormData();
  inMod.append("accion","infAct");
  inMod.append("id", e.target.value);

  fetch("partes/procesoForm/list_activo.php", {
    method: "POST",
    body: inMod,
  })
    .then((res) => res.json())
    .then((data) => {
      $('#detalleActivo').modal('show')
      document.getElementById("caractActivo").innerHTML = data.filas;
      document.getElementById("nombreActiTex").innerHTML=data.nombre;
      document.getElementById("descripcionAct").innerHTML=data.descripcion;
      document.getElementById("img_acti").setAttribute("src",data.img);
      // $("#img_acti").attr("src",data.foto);
      // console.log(data.filas);
     

    })
  //  alert("luis")
})
*/

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
      document.getElementById("filas_activos").innerHTML = data.fila;
      // document.getElementById("pagination").innerHTML=data.paginacion;
      // console.log(data)
    })
// }


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

datos= new FormData();
datos.append("accion","list_mov_tabla")
datos.append("inferior","0")
datos.append("superior","20")
fetch('partes/procesoForm/list_movimientos.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("rspuets_list_mov").innerHTML=data;
    // document.getElementById("pagination").innerHTML=data.paginacion;

  })


  
    $("#contenedorDetalle").on("click","#detalle_mov",function(e)
    {
//   $('#detalleMov').modal('show');
alert("luis")
           
  })

//   $("#pagination").on ("click","#pag",function(e){
//     alert(e.target.name)

//   })
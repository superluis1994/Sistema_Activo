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


  
    $("#rspuets_list_mov").on("click","#detalle_mov",function(e)
    {

      datos= new FormData();
      datos.append("accion","datos_mov")
      datos.append("id",e.target.value)
      fetch('partes/procesoForm/list_movimientos.php',{
        method: 'POST',
        body: datos
      }).then(res=>res.json())
        .then(data=>{
          document.getElementById("id_mov").innerHTML=e.target.value;
          // document.getElementById("justificacion").innerHTML=data;
          // document.getElementById("rspuets_list_mov").innerHTML=data;
          // document.getElementById("rspuets_list_mov").innerHTML=data;
          // document.getElementById("pagination").innerHTML=data.paginacion;
          $('#detalleMov').modal('show');

        })
        

           
  })

//   $("#pagination").on ("click","#pag",function(e){
//     alert(e.target.name)

//   })
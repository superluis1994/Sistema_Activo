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
          document.getElementById("justificacion").innerHTML=data.justificacion;
          document.getElementById("recibeUS").innerHTML=data.user_entr;
          document.getElementById("entregaUS").innerHTML=data.User_reci;
          document.getElementById("entregaLO").innerHTML=data.local_sali;
          document.getElementById("destinoLO").innerHTML=data.local_des;
          document.getElementById("tipoMov").innerHTML=data.tipoM;
          document.getElementById("cont").innerHTML=data.fill;
          document.getElementById("fechayhora").innerHTML="Fecha movimiento "+data.fecha+"\n Hora"+data.hora;
          console.log(data)
  
          $('#detalleMov').modal('show');

        })
        

           
  })

//   $("#pagination").on ("click","#pag",function(e){
//     alert(e.target.name)

//   })
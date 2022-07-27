


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
          document.getElementById("id_mov").innerHTML="CODIGO: "+e.target.value;
          document.getElementById("justificacion").innerHTML="<small class='text-muted'>Justificacion: </small>"+data.justificacion;
          document.getElementById("recibeUS").innerHTML="<b>Usuario Recibe: </b>"+data.user_entr;
          document.getElementById("entregaUS").innerHTML="<b>Usuario Entrega: </b>"+data.User_reci;
          document.getElementById("entregaLO").innerHTML="<b>Local Entrega: </b>"+data.local_sali;
          document.getElementById("destinoLO").innerHTML="<b>Local Destino: </b>"+data.local_des;
          document.getElementById("tipoMov").innerHTML="<b>Tipo: </b>"+data.tipoM;
          document.getElementById("cont").innerHTML=data.fill;
          document.getElementById("fechayhora").innerHTML="Fecha movimiento "+data.fecha+"\n Hora:"+data.hora;
          // console.log(data)
  
          $('#detalleMov').modal('show');

        })
        

           
  })

  $("#rspuets_list_mov").on ("click","#reporteMov",function(e){
  
    
    idRepor= new FormData();
    idRepor.append("accion","reporte_Mov")
    idRepor.append("id",e.target.value)

    fetch('partes/procesoForm/reporte_mov.php',{
      method: 'POST',
      body: idRepor
    }).then(res=>res.json())
      .then(data=>{
        // document.getElementById("rspuets_list_mov").innerHTML=data;
        // document.getElementById("pagination").innerHTML=data.paginacion;
        alert(e.target.value);
    
      })

  })
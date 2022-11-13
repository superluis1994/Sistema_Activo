
document.getElementById("btn_buscar").addEventListener('keyup', function(){

getTabla()


})

$("#pag").on ("click","#pagUser",function(e)
{  
  getTabla(e.target.name)
  
})


function getTabla(numberpag){

  let getContent=document.getElementById("btn_buscar").value;
  let condition="";
  let limiter = "";
  
if (numberpag) {
  limiter = numberpag
}else{
  limiter = 20
}
  if(getContent != ""){
    condition="buscar";
  }else{
    condition="list_mov_tabla";
  }

  //alert(condition)
  datos= new FormData();
  datos.append("accion",condition)
  datos.append("buscar",getContent)
  datos.append("limiter",limiter)
  fetch('partes/procesoForm/list_movimientos.php',{
    method: 'POST',
    body: datos
  }).then(res=>res.json())
    .then(data=>{
     console.log(data.btn_reporte)
     document.getElementById("rspuets_list_mov").innerHTML=data.tabla
     document.getElementById("pag").innerHTML= data.paginate
     document.getElementById("report_activo_gene").innerHTML= data.btn_reporte
      // document.getElementById("pagination").innerHTML=data.paginacion;
  
    })



}


getTabla();

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
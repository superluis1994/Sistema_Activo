
  //////////////////////Cargar los select de la session movimientos///////////////////////////
datos= new FormData();
datos.append("accion","select")
fetch('partes/procesoForm/Regist_movimiento.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("usuarioEntre").innerHTML=data.usuario;
    document.getElementById("usuarior").innerHTML=data.usuario;
    document.getElementById("localDes").innerHTML=data.locales;
    document.getElementById("localSali").innerHTML=data.locales;
    document.getElementById("Tmov").innerHTML=data.tipoMov;
    // console.log(data)
  })


document.getElementById("dat").addEventListener("change",function(e){
   alert(e.target.value)
}) 

  formT=document.getElementById("form_mov")
  formT.addEventListener("submit", function(e){
      e.preventDefault()
    // $('#listActi').modal('show');
    

if($("#usuarioEntre").val()!='0' && $("#usuarior").val()!='0' && $("#localDes").val()!='0'
   && $("#localSali").val()!='0' && $("#justificacion").val()!=''){
      
      if($("#localDes").val()!= $("#localSali").val()){
        $('#listActi').modal('show')

      }else{
        alerta('error','Error','No puede seleccionar el mismo local de salida con el de entrada')

      }


  }else{
  alerta('error','Hay datos vacios','Completar todos los campos')

}
    
    // console.log(datos);
  })
//////////enviar y registrar el movimiento///////////////////////
  document.getElementById("btn-registrarMov").addEventListener("click",function(e){
    datos= new FormData(formT);
    datos.append("accion","RegistrarMovimiento")
    fetch('partes/procesoForm/Regist_movimiento.php',{
           method: 'POST',
           body: datos
         }).then(res=>res.json())
           .then(data=>{
            // alert(data)
            // console.log(data)
            // window.location.href = 'reportes/reporte_mov.php?ids='+data
            window.open('reportes/reporte_mov.php?ids='+data, '_blank');
            location.reload();
           })
    
  })


  //////////////input de busqueda de activo para agregar al movimiento////////////
  resultBusq=document.getElementById("resultado")
  document.getElementById("codigoBusq").addEventListener("keyup",function(e) {
    if(/^[0-9\s]+$/g.test(e.target.value)){
        e.target.classList.remove("is-invalid")
       //envio los datos para la actualizacion del usario
       valueAct= new FormData()
       valueAct.append("accion","informacionActivo")
       valueAct.append("codigoActivo",e.target.value)
       valueAct.append("localP",$("#localSali").val())
       
       fetch("partes/procesoForm/Regist_movimiento.php",{
       method: 'POST',
       body: valueAct
       }).then(res=>res.json())
       .then(data=>{
     
        resultBusq.innerHTML=data
       }) 



    }else{
      e.target.classList.add("is-invalid")
    }
    
  })

////////////////agregar activo a la session de tabla//////////////////
  tabla=document.getElementById("activosList");
  $("#resultado").on ("click","#btn-agre",function(e)
{   
  dato=e.target.value.split(",")
  valueAct= new FormData()
  valueAct.append("accion","addActivoSession")
  valueAct.append("idAct",dato[1])
  valueAct.append("nom",dato[0])
  valueAct.append("serie",dato[2])

  
  fetch("partes/procesoForm/activoMovimientoList.php",{
  method: 'POST',
  body: valueAct
  }).then(res=>res.json())
  .then(data=>{
    tabla.innerHTML=data
  }) 
})

////////////////eliminar activo de la session//////////////////////
$("#activosList").on ("click","#btn-actSession",function(e)
{
  valueAct= new FormData()
  valueAct.append("accion","EliActivoSession")
  valueAct.append("codigo",e.target.value)

  fetch("partes/procesoForm/activoMovimientoList.php",{
  method: 'POST',
  body: valueAct
  }).then(res=>res.json())
  .then(data=>{
    tabla.innerHTML=data
  }) 
})

/////////////btn de cancelar/////////////////
document.getElementById("cancelar").addEventListener("click",function(){
  cancelarMov()
})
document.getElementById("close").addEventListener("click",function(){
  cancelarMov()
})


function cancelarMov(){
  valueAct= new FormData()
  valueAct.append("accion","cancelarMov")

  fetch("partes/procesoForm/activoMovimientoList.php",{
  method: 'POST',
  body: valueAct
  }).then(res=>res.json())
  .then(data=>{
    tabla.innerHTML=""
    resultBusq.innerHTML=""
    document.getElementById("codigoBusq").value=""
    $('#listActi').modal('hide');
  }) 
}

///////////////alerta////////////////////
function alerta(icono,title,text){
  Swal.fire({
                    
    icon: icono,
    title: title,
    text: text,
    showConfirmButton: true,
  
  })
}

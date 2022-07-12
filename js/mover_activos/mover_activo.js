
// // formulario validacion y envio
// formulario = document.getElementById("form_mov")
// formulario.addEventListener("submit", function(e){
//   e.preventDefault();
//   datos= new FormData(formulario);
//   datos.append("accion","RegistrarUsuario")

//   for (const value of datos.values()) {
//     console.log(value);
//   }
// if( 
//    document.getElementById("Tmov").classList.contains("is-valid") &&
//    document.getElementById("usuarioEntre").classList.contains("is-valid")&&
//    document.getElementById("usuarioRecibe").classList.contains("is-valid") &&
//    document.getElementById("localSali").classList.contains("is-valid") &&
//    document.getElementById("localDes").classList.contains("is-valid")&&
//    document.getElementById("justificacion").classList.contains("is-valid")  )
//    {

//    fetch('partes/procesoForm/Registrar_usuario.php',{
//      method: 'POST',
//      body: datos
//    }).then(res=>res.json())
//      .then(data=>{
//        if(data=="error"){
   
//          alerta("error","Error","Llenar todos los campos")
//        }
//        else if(data=="success"){
//         alerta("success","Correcto","Registrado Correctamente")
   
   
//        }
//      })

// }else{
    
//      alerta("error","Error","Hay datos no validos")
// }


// })


// var select_box_element = document.querySelector('#usuarioRecibe');

//   dselect(select_box_element, {
//       search: true
//   });
//   var select_box_element = document.querySelector('#usuarioEntre');

// dselect(select_box_element, {
//     search: true
// }); var select_box_element = document.querySelector('#localSali');

// dselect(select_box_element, {
//     search: true
// });var select_box_element = document.querySelector('#localDes');

// dselect(select_box_element, {
//     search: true
// });



// //////////////validaciones de los campos////////////////////////////////

// validSelect("Tmov","Tmov","","change")
// validSelect("usuarioEntre","otro","#usuarior","change")
// validSelect("usuarior","otro","#usuarioEntre","change")
// validSelect("localSali","otro","#localDes","change")
// validSelect("localDes","otro","#localSali","change")
// validSelect("justificacion","text","","keyup")

// function validSelect (dato,tipo,camp1,evento,contenedor){

//     document.getElementById(dato).addEventListener(evento, function(e){
//       conten=document.getElementById(contenedor)
//         console.log(e.target.value)
//         if(tipo =="otro"){
         
//             if(e.target.value!=0 && e.target.value!=$(camp1).val()){
//                 e.target.classList.remove("is-invalid")
//                 e.target.classList.add("is-valid")
    
//             }else{
//                 e.target.classList.remove("is-valid")
//                 e.target.classList.add("is-invalid")
    
//               }
//         }
//         else if(tipo == "Tmov")
//         {
//             if(e.target.value!=0 ){
//                 e.target.classList.remove("is-invalid")
//                 e.target.classList.add("is-valid")
    
//             }else{
//                 e.target.classList.remove("is-valid")
//                 e.target.classList.add("is-invalid")
    
//               }
//         }
//         else if(tipo == "text")
//         {
//             if(/^[A-Za-z\s]+$/g.test(e.target.value)){
//                 e.target.classList.remove("is-invalid")
//                 e.target.classList.add("is-valid")
    
//             }else{
//                 e.target.classList.remove("is-valid")
//                 e.target.classList.add("is-invalid")
    
//               }
//         }
        
//     })
// }






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
        alert('No puede seleccionar el mismo local de salida con el de entrada')

      }


  }else{
  alert('faltan datos')

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
            console.log(data)
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

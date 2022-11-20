
function get_Tabla() {

  datos= new FormData();
datos.append("accion","Tabla")
fetch('partes/procesoForm/Registrar_local.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("lis_local").innerHTML=data.fila;
    document.getElementById("pagination").innerHTML=data.paginacion;

  })

}

get_Tabla()


  $("#pagination").on ("click","#pag",function(e){
    alert(e.target.name)

  })

 $("#lis_local").on ("click","#btn_detalle",function(e){
 // alert('hola')
  alert(e.target.value)
 })

 //change status for other
 $("#lis_local").on ("click","#btn-statu",function(e){

  datos=e.target.value.split(",")
  if(datos[1]==1){
    titulo="Local "+datos[0];
    alertOpt(titulo,"¿Seguro que quieres desactivar?","warning","Desactivado",e.target.value);
}
if(datos[1]==2){
    titulo="Local "+datos[0];
    alertOpt(titulo,"¿Seguro que quieres activar?","warning","Activado",e.target.value)
}

  })


  $("#lis_local").on ("click","#btn_update",function(e){
    // alert('hola')
     alert(e.target.value)
    })
 
    //funcion de alerta con opciones 
function alertOpt(titulo,mensaje,icono,accion,val1){
  Swal.fire({
      title: titulo,
      text: mensaje,
      icon: icono,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, seguro!'
    }).then((result) => {
      if (result.isConfirmed) {
 
  datos= new FormData();
  datos.append("accion","change_status")
  datos.append("valor",val1)
  
  fetch('partes/procesoForm/Registrar_local.php',{
  method: 'POST',
  body: datos
  
     }).then(res=>res.json())
       .then(data=>{
  
        if (data == 1) {
          Swal.fire(
            "Realizado",
            'El local ya esta '+ accion,
            'success'
          )
         get_Tabla()
        }
       
       })
     

      }
    })
}
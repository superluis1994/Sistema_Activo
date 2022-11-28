
function get_Tabla(getpag) {

  let texto = document.getElementById("buscar").value
  let condition = "";
  if(texto == ""){
    condition="lista"
  }else{
    condition="buscar"
  }

  let pag_limiter=10;
 if (getpag) {
  pag_limiter=getpag
 }

  datos= new FormData();
datos.append("accion",condition)
datos.append("title",texto)
datos.append("limiter",pag_limiter)
fetch('partes/procesoForm/list_local.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("lis_local").innerHTML=data.tabla;
    document.getElementById("pagination").innerHTML=data.paginacion;
    document.getElementById("btn_report").innerHTML=data.btn

  })

}

document.getElementById("save").addEventListener('click',function(){

 let local= document.getElementById('local').value
 let cargo=  document.getElementById('jef').value
 let id=  document.getElementById('id').value

 if (local == "") {
  alerta("error","Error","No hay cambios")
 }else{

  datos= new FormData();
  datos.append("accion","save")
  datos.append("local",local)
  datos.append("cargo",cargo)
  datos.append("id",id)
  fetch('partes/procesoForm/list_local.php',{
    method: 'POST',
    body: datos
  }).then(res=>res.json())
    .then(data=>{
      if(data == 1){
      alerta("Success","Cambios","Cambios Realizados")
      get_Tabla()
      }else{
        alerta("error","Error","No error al intentar registrar")
      }
  
    })

 }

})

//optener numero de paginacion
$("#pagination").on ("click","#pagUser",function(e){  
   //getInformation(e.target.name) 
get_Tabla(e.target.name)
})


document.getElementById("buscar").addEventListener("keyup",function(e){
get_Tabla()
})

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
    titulo="Local "+datos[2];
    alertOpt(titulo,"¿Seguro que quieres desactivar?","warning","Desactivado",e.target.value);
}
if(datos[1]==2){
    titulo="Local "+datos[2];
    alertOpt(titulo,"¿Seguro que quieres activar?","warning","Activado",e.target.value)
}

  })


  $("#lis_local").on ("click","#btn_update",function(e){
    // alert('hola')
    // alert(e.target.value)
    $('#exampleModal').modal('show');

     datos= new FormData();
     datos.append("accion","update")
     datos.append("id",e.target.value)
     fetch('partes/procesoForm/list_local.php',{
       method: 'POST',
       body: datos
     }).then(res=>res.json())
       .then(data=>{
       // console.log(data)
       document.getElementById("cargar_lista").innerHTML=data.tabla
       document.getElementById("jef").innerHTML= data.usuarios
       })
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
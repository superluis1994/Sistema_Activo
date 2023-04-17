 function list_conexion (pag,num){
    list= new FormData()
    list.append("accion","listConexionTable")
    list.append("cantida",pag)
    list.append("pg",num)
    
    fetch("partes/procesoForm/conexiones.php",{
      method: 'POST',
      body: list
    }).then(res=>res.json())
    .then(data=>{
     document.getElementById("listConexiones").innerHTML=data.fila;
     document.getElementById("pagList").innerHTML=data.paginacion;
    //  document.getElementById("tiempoF").value=data.fecha;
      
    })

}
// para consultas con busqueda
// function list_conexionBusq(pag,num,value){
//   list= new FormData()
//   list.append("accion","BusqueConexion")
//   list.append("bsqueda",value)
//   list.append("fechaI",$("#tiempoI").val())
//   list.append("fechaF",$("#tiempoF").val())
//   list.append("cantida",pag)
//   list.append("pg",num)
  
//   fetch("partes/procesoForm/conexiones.php",{
//     method: 'POST',
//     body: list
//   }).then(res=>res.json())
//   .then(data=>{
//     // alert(data)
//    document.getElementById("pagList").innerHTML=data.paginacion;
//    document.getElementById("listConexiones").innerHTML=data.fila;
//      document.getElementById("pagList").innerHTML="";
    
//   })

// }
list_conexion(20,1);

document.getElementById("pagList").addEventListener("click",function(e){

  array=e.target.name.split(',')
  // alert(array[1])
  list_conexion(array[0],array[1])
})

// document.getElementById("Inp_buscar").addEventListener("keyup",function(e){
//   if(/^[0-9\s]+$/g.test(e.target.value)){
   
//     list_conexionBusq(20,1,e.target.value)

//   }else{
//     list_conexion(20,1);
//   }

// })
// alert()
document.getElementById("GReportrC").addEventListener("click", function(){

  // GReportrC
  $('#detalleReport').modal('show')

})
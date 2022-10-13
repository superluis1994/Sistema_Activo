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
     document.getElementById("tiempoF").value=data.fecha;
      
    })

}
list_conexion(20,1);

document.getElementById("pagList").addEventListener("click",function(e){

  array=e.target.name.split(',')
  // alert(array[1])
  list_conexion(array[0],array[1])
})

document.getElementById("Inp_buscar").addEventListener("keyup",function(e){
  lis= new FormData()
  lis.append("accion","BusqueConexion")
  lis.append("bsqueda",e.target.value)
  // list.append("cantida",pag)
  // list.append("pg",num)
  
  fetch("partes/procesoForm/conexiones.php",{
    method: 'POST',
    body: lis
  }).then(res=>res.json())
  .then(data=>{
   document.getElementById("listConexiones").innerHTML=data.fila;
   document.getElementById("pagList").innerHTML="";
  //  document.getElementById("pagList").innerHTML=data.paginacion;
  //  document.getElementById("tiempoF").value=data.fecha;
 
    
  })

})
// alert()
 function list_conexion (){
    list= new FormData()
    list.append("accion","listConexionTable")
    list.append("cantida","8")
    
    fetch("partes/procesoForm/conexiones.php",{
      method: 'POST',
      body: list
    }).then(res=>res.json())
    .then(data=>{
     document.getElementById("listConexiones").innerHTML=data.fila;
     document.getElementById("pagList").innerHTML=data.paginacion;
      
    })

}
list_conexion();
// alert()
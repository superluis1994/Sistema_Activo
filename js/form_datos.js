list= new FormData()
list.append("accion","tipoUserLits")

fetch("partes/procesoForm/perfilDatos.php",{
  method: 'POST',
  body: list
}).then(res=>res.json())
.then(data=>{
 document.getElementById("tiposUsuL").innerHTML=data;
  
})
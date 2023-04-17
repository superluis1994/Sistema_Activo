document.getElementById("Inp_buscar").addEventListener("keyup",function(e) {
    fechaInc=document.getElementById("tiempoI").value;
    fechaFin=document.getElementById("tiempoF").value;
    expresion = /^[0-9]+$/;
    if(expresion.test(e.target.value))
    {
        if(fechaInc!="" && fechaFin!=""){
            
            busquedaMdf(e.target.value,20,1,fechaInc,fechaFin);
        }else{
            
            busquedaMdf(e.target.value,20,1,"","");
        }
    }
})
//Evitar meter letras 
document.getElementById("Inp_buscar").addEventListener("keypress", (event) => {
    if (!/[0-9]/.test(event.key)) {
      event.preventDefault();
    }
    if(event.target.value.length >= 6){
        event.preventDefault(); 
    }
  });

  function busquedaMdf (data,pag,num,fechaI,fechaF){
     list= new FormData()
    list.append("accion","busquedaMdf")
    list.append("bsqueda",data)
    list.append("fechaI",fechaI)
    list.append("fechaF",fechaF)
    list.append("cantida",pag)
    list.append("pg",num)
    
    fetch("partes/procesoForm/busquedaCx.php",{
      method: 'POST',
      body: list
    }).then(res=>res.json())
    .then(data=>{
     document.getElementById("listConexiones").innerHTML=data.fila;
     document.getElementById("pagList").innerHTML=data.paginacion;
    //  alert(data.paginacion)
    //  document.getElementById("tiempoF").value=data.fecha;
      
    })


}
function paginacionBs(){
    alert("Estoy llamando la paginacion");
}
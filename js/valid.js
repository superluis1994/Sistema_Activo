async function getData(){
  datos= new FormData();
datos.append("accion","estadoUser")
await fetch('partes/procesoForm/validStatus.php',{
          method: 'POST',
          body: datos
        }).then(res=>res.json())
          .then(data=>{
           
            setTimeout(data.accion, data.timer)

            if(data.opt =! "desactivado"){
              clearInterval(temporizador);
              
            }
            
          })
}
  temporizador= setInterval (getData,10000)

///////////////alerta////////////////////
function alerta(icono,title,text){
  Swal.fire({
                    
    icon: icono,
    title: title,
    text: text,
    showConfirmButton: true,
    // timer: 3000
  })
}
// alerta("error","Usario Desactivado","ya no tendra acceso al sistema")
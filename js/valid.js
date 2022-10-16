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
  temporizador= setInterval (getData,1000)
////validar correo
function val_email (valor){
  var msj="";
	re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,3})$/
	if(!re.exec(valor)){ msj="404"}else{  msj="204"} 
  return msj
	}
  
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
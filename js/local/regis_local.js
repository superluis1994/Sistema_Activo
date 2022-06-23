// cargar el select de jefes de la area local
  datos= new FormData();
  datos.append("accion","list_jefes")
  fetch('partes/procesoForm/Registrar_local.php',{
    method: 'POST',
    body: datos
  }).then(res=>res.json())
    .then(data=>{
      document.getElementById("jef").innerHTML=data;
    })

// formulario validacion y envio
formulario = document.getElementById("form_local")
formulario.addEventListener("submit", function(e){
  e.preventDefault();
  datos= new FormData(formulario);
  datos.append("accion","RegistrarLocal")

if( document.getElementById("Lcodigo").classList.contains("is-valid") &&
   document.getElementById("Lnombre").classList.contains("is-valid") &&
   document.getElementById("Ljefe").classList.contains("is-valid"))
   {

   fetch('partes/procesoForm/Registrar_local.php',{
     method: 'POST',
     body: datos
   }).then(res=>res.json())
     .then(data=>{
       if(data=="error"){
   
         alerta("error","Error","Llenar todos los campos")
       }
       else if(data=="success"){
        alerta("success","Correcto","Registrado Correctamente")
   
   
       }
     })

}else{
    
     alerta("error","Error","Hay datos no validos")
}


}) 
validCampo("Lcodigo","keyup","letrasynumeros")
validCampo("Lnombre","keyup","letras")
validCampo("Ljefe","keyup","numero")


function validCampo(nom,evento,tipo){
  
    document.getElementById(nom).addEventListener(evento,function(e){
      // alert(e.target.value)
      if(tipo=="letras"){
            if(!/^[A-Za-z\s]+$/g.test(e.target.value)){
              e.target.classList.remove("is-valid")
              e.target.classList.add("is-invalid")
            }else{
              e.target.classList.remove("is-invalid")
              e.target.classList.add("is-valid")
  
            }
          
  
      }else if(tipo=="numero"){
  
        if(!/^[0-9\s]+$/g.test(e.target.value)){
          // validar si el codigo exite
          e.target.classList.remove("is-valid")
          e.target.classList.add("is-invalid")
          
          
        } else{
            
            e.target.classList.add("is-valid")
            e.target.classList.remove("is-invalid")
  
        }
      }
      else if(tipo=="jefe"){
  
        if(!/^[0-9\s]+$/g.test(e.target.value)){
          // validar si el codigo exite
          e.target.classList.remove("is-valid")
          e.target.classList.add("is-invalid")
          
          
        } else{
          codigo= new FormData();
          codigo.append("accion","validarUser")
          codigo.append("codigo",e.target.value)
          fetch('partes/procesoForm/Registrar_usuario.php',{
            method: 'POST',
            body: codigo
          }).then(res=>res.json())
            .then(data=>{
  
              // alert(data)
              if(data==0){
                e.target.classList.remove("is-invalid")
                e.target.classList.add("is-valid")
              }else{
                e.target.classList.remove("is-valid")
                e.target.classList.add("is-invalid")
              }
            })
  
        }
      }
      else if(tipo=="letrasynumeros"){
        if(!/^[A-Za-z 0-9\s]+$/g.test(e.target.value)){
          e.target.classList.remove("is-valid")
          e.target.classList.add("is-invalid")
        }else{
          e.target.classList.remove("is-invalid")
          e.target.classList.add("is-valid")
  
        }
      }
    })
  }

////////////////alerta///////////////////
  function alerta(icono,title,text){
    Swal.fire({
                      
      icon: icono,
      title: title,
      text: text,
      showConfirmButton: false,
      timer: 1500
    })
  }




  
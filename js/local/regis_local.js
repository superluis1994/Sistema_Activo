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
   document.getElementById("jef").classList.contains("is-valid") )
   {

   fetch('partes/procesoForm/Registrar_local.php',{
     method: 'POST',
     body: datos
   }).then(res=>res.json())
     .then(data=>{
      alerta(data.icono,data.titulo,data.texto)
      if(data.icono == "success"){
        $('.inputLocal').removeClass("is-valid is-invalid")
        formulario.reset()
      }
      
     })

}else{
    
     alerta("error","Error","Hay datos no validos")
}


}) 
validCampo("Lcodigo","keyup","letrasynumeros")
validCampo("Lnombre","keyup","letras")
validCampo("jef","change","numero")


function validCampo(nom,evento,tipo){
  
    document.getElementById(nom).addEventListener(evento, function(e){
      if(tipo=="letras"){
            if(!/^[A-Za-z0-9\s]+$/g.test(e.target.value) || e.target.value.trim()==""){
              e.target.classList.remove("is-valid")
              e.target.classList.add("is-invalid")
            }else{
              e.target.classList.remove("is-invalid")
              e.target.classList.add("is-valid")
  
            }
          
  
      }else if(tipo=="numero"){
  
        if(e.target.value != 0){
          e.target.classList.add("is-valid")
          e.target.classList.remove("is-invalid")
          
        } else{
          e.target.classList.remove("is-valid")
          e.target.classList.add("is-invalid")
  
        }
      }
      
      else if(tipo=="letrasynumeros"){
        if(/^[A-Za-z0-9\-]+$/g.test(e.target.value) || !e.target.value.trim()==""){
         
          datos= new FormData();
          datos.append("accion","validarLocal")
          datos.append("codigo",e.target.value)
          fetch('partes/procesoForm/Registrar_local.php',{
            method: 'POST',
            body: datos
          }).then(res=>res.json())
            .then(data=>{
              e.target.classList.remove(data.opcion1)
              e.target.classList.add(data.opcion2)
            })


        }else{
          e.target.classList.add("is-invalid")
          e.target.classList.remove("is-valid")
  
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
      showConfirmButton: true,
 
    })
  }




  
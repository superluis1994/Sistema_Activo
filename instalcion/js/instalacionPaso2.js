
document.getElementById('btn_foto').addEventListener("click", function(){
    document.getElementById("foto").click(); 
})


// formulario validacion y envio
formulario = document.getElementById("crearUsa")
formulario.addEventListener("submit", function(e){
  e.preventDefault();
  datos= new FormData(formulario);
  datos.append("accion","RegistrarUsuario")
  datos.append("passw",document.getElementById("Cvl").value)
  datos.append("tipo","1")

if( document.getElementById("nombre").classList.contains("is-valid") &&
   document.getElementById("apellidos").classList.contains("is-valid") &&
   document.getElementById("codigo").classList.contains("is-valid")&&
   document.getElementById("Cvl").classList.contains("is-valid") &&
   document.getElementById("correo").classList.contains("is-valid")  )
   {

   fetch('partes/procesoForm/Registrar_usuario.php',{
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
////////////////////////////////////////////////////////////////////////
validCampo("nombre","keyup","letras")
validCampo("apellidos","keyup","letras")
validCampo("codigo","keyup","numero")
validCampo("Cvl","change","letrasynumeros")
validCampo("correo","keyup","correo")


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
    else if(tipo=="correo"){

      if(!/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+/g.test(e.target.value)){
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")
      }else{
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

      }
    }
  })
}


///////////////alerta////////////////////
function alerta(icono,title,text){
    Swal.fire({
                      
      icon: icono,
      title: title,
      text: text,
      showConfirmButton: false,
      timer: 1500
    })
  }

  // contrasena aleatoria
document.getElementById("btn_generarU").addEventListener("click",function(){

     gfg_Run()
    
  })
  function gfg_Run() {
    var el_down = document.getElementById("Cvl");
    el_down.value = 
                    Math.random().toString(36).slice(2) + 
                    Math.random().toString(36)
                        .toUpperCase().slice(2);
  
                        pas=document.getElementById("Cvl")
                        pas.classList.remove("is-invalid")
                         pas.classList.add("is-valid")
                } 
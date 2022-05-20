
// cargar el selec con los tipos de usuarios
list= new FormData()
list.append("accion","tipoUserLits")

fetch("partes/procesoForm/Registrar_usuario.php",{
  method: 'POST',
  body: list
}).then(res=>res.json())
.then(data=>{
 document.getElementById("tiposUsuL").innerHTML=data;
  
})
////////////////////////////////////////////////////

// cargar la foto
document.getElementById('btn_foto').addEventListener("click", function(){
    document.getElementById("foto").click(); 
})

document.getElementById("foto").addEventListener("change", function() {
    mostrar=document.querySelector("#img_visual")
    archivos = document.querySelector("#foto").files
      // Si no hay archivos salimos de la función y quitamos la imagen
      if (!archivos || !archivos.length) {
        $document.mostrar.src = "img/recursos/foto_default.jpg";
        return;
      }
      // Ahora tomamos el primer archivo, el cual vamos a previsualizar
      primerArchivo = archivos[0];
      // Lo convertimos a un objeto de tipo objectURL
       objectURL = URL.createObjectURL(primerArchivo);
      // Y a la fuente de la imagen le ponemos el objectURL
      mostrar.src = objectURL;
})
////////////////////////////////////////////////////////////////////////////////////


// formulario validacion y envio
formulario = document.getElementById("form")
formulario.addEventListener("submit", function(e){
  e.preventDefault();

  datos= new FormData(formulario);
  datos.append("accion","RegistrarUsuario")

if( document.getElementById("nombre").classList.contains("is-valid") &&
   document.getElementById("apellidos").classList.contains("is-valid") &&
   document.getElementById("codigo").classList.contains("is-valid") )
   {

   fetch('partes/procesoForm/Registrar_usuario.php',{
     method: 'POST',
     body: datos
   }).then(res=>res.json())
     .then(data=>{
       alert(data);
       if(data=="error"){
   
         alerta("error","Error","Llenar todos los campos")
       }
       else if(data=="success"){
        alerta("success","Correcto","Registrado Correctamente")
   
   
       }
     })

}


}) 
////////////////////////////////////////////////////////////////////////
validCampo("nombre","keyup","letras")
validCampo("apellidos","keyup","letras")
validCampo("codigo","keyup","numero")


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

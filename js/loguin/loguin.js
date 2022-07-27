// validar campos
document.getElementById("codigo").addEventListener("keyup", function(e){
    if(!e.target.value == ""){
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")
        btnActivar()
    }else{
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")
        btnActivar()
    }
    
    })
document.getElementById("pass").addEventListener("keyup", function(e){
    if(/^[A-Za-z0-9@_ \s]+$/g.test(e.target.value)){
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")
        btnActivar()
    }else{
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")
        btnActivar()
    }
    })

// funcion para activar el boton 
function btnActivar(){

    if(document.getElementById("pass").classList.contains("is-valid") && 
    document.getElementById("codigo").classList.contains("is-valid")){

        document.getElementById("btn_loguin").disabled = false        

    }else{
        document.getElementById("btn_loguin").disabled = true  
    }
}

// envio de datos del formulario de loguin
dato_loguin=document.getElementById("loguing")

dato_loguin.addEventListener("submit", function(e){
    e.preventDefault();
    datos_log= new FormData(dato_loguin);
    datos_log.append("accion","loguin")

    if( document.getElementById("codigo").classList.contains("is-valid") &&
    document.getElementById("pass").classList.contains("is-valid")  )
    {

fetch('partes/procesoForm/loguin.php',{
    method: 'POST',
    body: datos_log
  }).then(res=>res.json())
    .then(data=>{
      setTimeout(data.alerta,data.tiempo);

    // console.log("filas "+data.array)
    // console.log("numero "+ data.count)
    })
  } 
})

// validar el campo de restablecimeinto este lleno para activar el btn
$("#modal-rest").find("input[type=number]").on('keyup', function(e) {
    expresion =new RegExp(/^[0-9]+$/g);
    if(expresion.test(e.target.value)){
    
        document.getElementById("btn_restablecer").disabled=false
    }else{
        document.getElementById("btn_restablecer").disabled=true
  
    }
  });


///////////////alerta////////////////////
function alerta(icono,title,text){
    Swal.fire({
                      
      icon: icono,
      title: title,
      text: text,
      showConfirmButton: true,
     
    })
  }
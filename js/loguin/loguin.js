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
    datos_log.append("accion_logui","loguin")

    if( document.getElementById("codigo").classList.contains("is-valid") &&
    document.getElementById("pass").classList.contains("is-valid")  )
    {

fetch('partes/procesoForm/loguin.php',{
    method: 'POST',
    body: datos_log
  }).then(res=>res.json())
    .then(data=>{
      if(data==0){
  
        alerta("error","Error","Datos incorrectos")
      }
      else if(data==1){
  
       alerta("success","Correcto","session iniciada en 5 segundos")
       window.location.href = "index.php";
  
      }
      else if(data=="2"){
        alerta("error","Error","Llenar los campos")

      }

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


// envio de datos para restablecer password
logui_reset=document.getElementById("restablecer_pass")
logui_reset.addEventListener("submit", function(e){
    e.preventDefault()

    datos_res= new FormData(logui_reset);
    datos_res.append("rest_loguin","loguin")
    fetch('partes/procesoForm/loguin.php',{
        method: 'POST',
        body: datos_res,
      }).then(res=>res.json())
        .then(data=>{
     
         alert(data)
    
        })

})



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
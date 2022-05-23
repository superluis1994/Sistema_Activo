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


function btnActivar(){

    if(document.getElementById("pass").classList.contains("is-valid") && 
    document.getElementById("codigo").classList.contains("is-valid")){

        document.getElementById("btn_loguin").disabled = false        

    }else{
        document.getElementById("btn_loguin").disabled = true  
    }
}


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
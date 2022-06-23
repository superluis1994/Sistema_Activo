document.getElementById("numMovi").addEventListener("keyup",function(e){
    inputs='';

    for(var i=1; e.target.value >= i;i++){
            // <input type='number' name='' class='form-control' id='exampleInputPassword1'>
            inputs+="<div class='col-4' ><label for='text' class='form-label'>Activo"+i+"</label><input type='number' name='carnet[]' class='form-control m-2' id='exampleInputPassword1'></input></div>";
    }
    document.getElementById("datosInput").innerHTML=inputs;
})


// formulario validacion y envio
formulario = document.getElementById("form_mov")
formulario.addEventListener("submit", function(e){
  e.preventDefault();
  datos= new FormData(formulario);
  datos.append("accion","RegistrarUsuario")

  for (const value of datos.values()) {
    console.log(value);
  }
if( document.getElementById("numMovi").classList.contains("is-valid") &&
   document.getElementById("Tmov").classList.contains("is-valid") &&
   document.getElementById("usuarioEntre").classList.contains("is-valid")&&
   document.getElementById("usuarioRecibe").classList.contains("is-valid") &&
   document.getElementById("localSali").classList.contains("is-valid") &&
   document.getElementById("localDes").classList.contains("is-valid")&&
   document.getElementById("justificacion").classList.contains("is-valid")  )
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


//////////////validaciones de los campos////////////////////////////////

validSelect("Tmov","Tmov","","change")
validSelect("usuarioEntre","otro","#usuarioRecibe","change")
validSelect("usuarioRecibe","otro","#usuarioEntre","change")
validSelect("localSali","otro","#localDes","change")
validSelect("localDes","otro","#localSali","change")
validSelect("justificacion","text","","keyup")

function validSelect (dato,tipo,camp1,evento){

    document.getElementById(dato).addEventListener(evento, function(e){
        console.log(e.target.value)
        if(tipo =="otro"){
            if(e.target.value!=0 && e.target.value!=$(camp1).val()){
                e.target.classList.remove("is-invalid")
                e.target.classList.add("is-valid")
    
            }else{
                e.target.classList.remove("is-valid")
                e.target.classList.add("is-invalid")
    
              }
        }
        else if(tipo == "Tmov")
        {
            if(e.target.value!=0 ){
                e.target.classList.remove("is-invalid")
                e.target.classList.add("is-valid")
    
            }else{
                e.target.classList.remove("is-valid")
                e.target.classList.add("is-invalid")
    
              }
        }
        else if(tipo == "text")
        {
            if(/^[A-Za-z\s]+$/g.test(e.target.value)){
                e.target.classList.remove("is-invalid")
                e.target.classList.add("is-valid")
    
            }else{
                e.target.classList.remove("is-valid")
                e.target.classList.add("is-invalid")
    
              }
        }
        
    })
}





//////////////////////tipo movimiento///////////////////////////
datos= new FormData();
datos.append("accion","tipo_movimiento")
fetch('partes/procesoForm/Regist_movimiento.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("Tmov").innerHTML=data;
  })
  //////////////////////usario entrega///////////////////////////
datos= new FormData();
datos.append("accion","user_entrega")
fetch('partes/procesoForm/Regist_movimiento.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("usuarioEntre").innerHTML=data;
    // aqui cargo tambien el de usuario que recive ya que son los mismo datos
    document.getElementById("usuarioRecibe").innerHTML=data;
  })

  //////////////////////local de salida y de destino///////////////////////////
datos= new FormData();
datos.append("accion","list_local")
fetch('partes/procesoForm/Regist_movimiento.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("localSali").innerHTML=data;
    document.getElementById("localDes").innerHTML=data;
  })
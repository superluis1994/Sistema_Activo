// poner oculto datos que depenten del select tipos activo
var x = document.getElementsByClassName('optActivo');

        for (var i = 0; i < x.length; i++) {
        //   x[i].style.display= "none";
          x[i].style.display= "none";
        }

// cargar el select resposable y local de pertenencia
datos= new FormData();
datos.append("accion","selectPartActivo")
fetch('partes/procesoForm/registro_Activo.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("jef").innerHTML=data.usuario;
    document.getElementById("localPertenece").innerHTML=data.locales;
    document.getElementById("tipoActivo").innerHTML=data.Tactivo;
  })


  document.getElementById("tipoActivo").addEventListener("change",function(e) {
    val=e.target.options[e.target.selectedIndex].text
    if(val != "TECNOLOGICO")
    {
        var x = document.getElementsByClassName('optActivo');

        for (var i = 0; i < x.length; i++) {
          x[i].style.display= "none";
        }
    }else{
        var x = document.getElementsByClassName('optActivo');

        for (var i = 0; i < x.length; i++) {
          x[i].style.display= "block";
        }

    }
    

  })

// esta es la clase que uso para validar los inputs
validForm("RAcodigo","keyup","descripcion")
validForm("RAnombre","keyup","letras")
validForm("tipoActivo","change","select")
validForm("RAvalorR","keyup","letrasYnumeros")
validForm("descripcion","keyup","descripcion")
validForm("RAmarca","keyup","descripcion")
validForm("RAmodelo","keyup","descripcion")
validForm("RAdimensiones","keyup","descripcion")
validForm("RAserie","keyup","descripcion")
validForm("RAvidaU","keyup","letrasYnumeros")
validForm("localPertenece","change","select")
validForm("jef","change","select")
validForm("RAinterno","keyup","letrasYnumeros")
validForm("RAmined","keyup","letrasYnumeros")




/////////////clase que valida los campos ///////////////
  function validForm (id,evento,tipo){

    document.getElementById(id).addEventListener(evento, function(e){

        if(tipo == "letras"){
            if(!/^[A-Za-zñ\s]+$/g.test(e.target.value)){
                e.target.classList.remove("is-valid")
                e.target.classList.add("is-invalid")
              }else{
                e.target.classList.remove("is-invalid")
                e.target.classList.add("is-valid")
    
              }
        }
        else if(tipo == "letrasYnumeros"){
           
                if(!/^[A-Za-zñ 0-9\s]+$/g.test(e.target.value)){
                    e.target.classList.remove("is-valid")
                    e.target.classList.add("is-invalid")
                  }else{
                    e.target.classList.remove("is-invalid")
                    e.target.classList.add("is-valid")
            
                  }
            

        }else if(tipo == "select"){
            if(e.target.value==0){
                e.target.classList.remove("is-valid")
                e.target.classList.add("is-invalid")
              }else{
                e.target.classList.remove("is-invalid")
                e.target.classList.add("is-valid")
        
              }        
        }else if(tipo == "descripcion"){
            if(id != "RAcodigo"){
            if(!/^[A-Za-zñ 0-9#-_.\s]+$/g.test(e.target.value)){
                e.target.classList.remove("is-valid")
                e.target.classList.add("is-invalid")
              }else{
                e.target.classList.remove("is-invalid")
                e.target.classList.add("is-valid")
        
              }
            }
              else{
                
                if(/^[A-Za-zñ 0-9-\s]+$/g.test(e.target.value)){
                    valid= new FormData();
                    valid.append("accion","validarActivo")
                    valid.append("codigo",e.target.value)
                    fetch('partes/procesoForm/registro_Activo.php',{
                      method: 'POST',
                      body: valid
                    }).then(res=>res.json())
                    .then(data=>{
    
                        e.target.classList.remove(data.dato2)
                        e.target.classList.add(data.dato1)
                      })
                  }else{
                    e.target.classList.add("is-invalid")
                    e.target.classList.remove("is-valid")
            
                  }


            }
        }

    })

  }


///////////envio del formulario///////////////////////////////////
formActivoR=document.getElementById("form_ActRegs")
formActivoR.addEventListener("submit", function(e){

   e.preventDefault()
   
    tip=document.getElementById("tipoActivo")
    select=tip.options[tip.selectedIndex].text
   
   if(select == "TECNOLOGICO"){
      if( document.getElementById("RAcodigo").classList.contains("is-valid") &&
   document.getElementById("RAnombre").classList.contains("is-valid") &&
   document.getElementById("tipoActivo").classList.contains("is-valid")&&
   document.getElementById("RAvalorR").classList.contains("is-valid") &&
   document.getElementById("descripcion").classList.contains("is-valid")&&
   document.getElementById("RAmarca").classList.contains("is-valid")&&
   document.getElementById("RAmodelo").classList.contains("is-valid") &&
   document.getElementById("RAdimensiones").classList.contains("is-valid")&&
   document.getElementById("RAserie").classList.contains("is-valid") &&
   document.getElementById("RAvidaU").classList.contains("is-valid")&&
   document.getElementById("localPertenece").classList.contains("is-valid")&&
   document.getElementById("jef").classList.contains("is-valid")&&
   document.getElementById("RAinterno").classList.contains("is-valid")&&
   document.getElementById("RAmined").classList.contains("is-valid")){
        
     formEnvio(formActivoR,select)

   }else{

        alerta("error","Hay datos no validos","Todos los datos tienen que esta validados")
   }

   }else{
    
    if( document.getElementById("RAcodigo").classList.contains("is-valid") &&
   document.getElementById("RAnombre").classList.contains("is-valid") &&
   document.getElementById("tipoActivo").classList.contains("is-valid")&&
   document.getElementById("RAvalorR").classList.contains("is-valid") &&
   document.getElementById("descripcion").classList.contains("is-valid")&&
   document.getElementById("RAserie").classList.contains("is-valid") &&
   document.getElementById("RAvidaU").classList.contains("is-valid")&&
   document.getElementById("localPertenece").classList.contains("is-valid")&&
   document.getElementById("jef").classList.contains("is-valid") &&
   document.getElementById("RAinterno").classList.contains("is-valid")&&
   document.getElementById("RAmined").classList.contains("is-valid")){

    formEnvio(formActivoR,select)

   }else{
        alerta("error","Hay datos no validos","Todos los datos tienen que esta validados")
         
   }

   }






})

// envio del formulario con esta clase
function formEnvio(form,tipoI){
    form= new FormData(form);
    form.append("accion","RGactivo")
    form.append("tipoInser",tipoI);
    fetch('partes/procesoForm/registro_Activo.php',{
      method: 'POST',
      body: form
    }).then(res=>res.json())
    .then(data=>{
      alerta(data.icono,data.titulo,data.mensaje)
       
      })
}

///////////////alerta////////////////////
function alerta(icono,title,text){
    Swal.fire({
                      
      icon: icono,
      title: title,
      text: text,
      showConfirmButton: true,
  
    })
  }
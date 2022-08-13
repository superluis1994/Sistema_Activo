// Cargar la lista de usuarios en la tabla con esta funcion
function list_user(){
    list= new FormData()
    list.append("accion","list_usuario_table")
    list.append("cantida","7")
    
    fetch("partes/procesoForm/list_usuario.php",{
      method: 'POST',
      body: list
    }).then(res=>res.json())
    .then(data=>{
      // alert(data)
     document.getElementById("list_resul").innerHTML=data.fila;
     document.getElementById("paginacion").innerHTML=data.paginacion;
      
    })

}

list_user()

///////////area de modificar usuario///////////////////
$("#list_resul").on ("click","#btn-modificar",function(e)
{   
    $('#mdMuser').modal('show');
    document.getElementById("Apassw").value=""
     datos=e.target.value.split(",")
     document.getElementById("staticBackdropLabel").innerHTML=datos[2]+" "+datos[3]
     nom=document.getElementById("Anombre")
     nom.value=datos[2]
     nom.classList.add("is-valid")

     apellido=document.getElementById("Aapellidos")
     apellido.value=datos[3]
     apellido.classList.add("is-valid")

     codigo=document.getElementById("Acodigo")
     codigo.value=datos[1]
     codigo.classList.add("is-valid")

     correo=document.getElementById("Acorreo")
     correo.value=datos[4]
     correo.classList.add("is-valid")

     costo=document.getElementById("Ccosto")
     costo.value=datos[5]
     costo.classList.add("is-valid")

     document.getElementById("img").setAttribute("src",datos[0] );
     // cargar el selec con los tipos de usuarios
list= new FormData()
list.append("accion","tipoUserLits")
list.append("usuario",value=datos[6])

fetch("partes/procesoForm/Actualizar_usuario.php",{
  method: 'POST',
  body: list
}).then(res=>res.json())
.then(data=>{
 document.getElementById("AtiposUsuL").innerHTML=data;
})
})
//////////////Actualizar DAtos usuario//////////////////////////////////////////////

formDatosAct=document.getElementById("actuUserDatos")
formDatosAct.addEventListener("submit",function(e){
  e.preventDefault();


    datosAct= new FormData(formDatosAct)
    datosAct.append("accion","actualizarDatos")  
    fetch("partes/procesoForm/Actualizar_usuario.php",{
      method: 'POST',
      body: datosAct
    }).then(res=>res.json())
    .then(data=>{
      // alert(data)
      // setTimeout(data.accion, data.timer)
      console.log(data)
    })
  
})

// document.getElementById("cerrar").addEventListener("click",function(){
//   document.getElementById("Apassw").value=""
// })

///////////Cambiar el estado del usuario ///////////////////
$("#list_resul").on ("click","#btn-statu",function(e)
{   
    datos=e.target.value.split(",")
    if(datos[1]==1){
        titulo="Selecciono el carnet "+datos[0];
        alertOpt(titulo,"Seguro que quieres quitar el acceso?","warning","Desactivado",datos[0],datos[1]);
    }
    if(datos[1]==2){
        titulo="Selecciono el carnet "+datos[0];
        alertOpt(titulo,"Seguro que quieres activar el acceso?","warning","Activado",datos[0],datos[1])
    }
    
    
})
/////////////////permisos/////////////////////////////////
$("#list_resul").on ("click","#btn-permisos",function(e)
{ 
  inf=e.target.value.split(",")
  $("#TituloMdP").html("<small class='text-muted'>PERMISOS DEL CARNET:</small> "+inf[1])
  $("#nomCompleto").html("<b>NOMBRE: </b>"+inf[2].toUpperCase())
  $("#apellido").html("<b>APELLIDOS: </b>"+inf[3].toUpperCase())
  $("#tipoUsert").html("<b>CARGO: </b>"+inf[4].toUpperCase())
  document.getElementById("imgMdP").setAttribute("src",inf[0] );
  $('#mdPermiso').modal('show');
  


   
})

////////////////////permisos value///////////////////////////////
document.getElementById("permisoRgT").addEventListener("click",function(e){
  alert(document.getElementById("permisoRgUser").value);
  
})

///////////buscardor de usuarios con filtros ///////////////////
document.getElementById("btn-buscar").addEventListener("keyup",function(e){
fil=document.querySelector('input[name=tipoBus]:checked').value
 
    if(/^[A-Za-z0-9\s]+$/g.test(e.target.value)){
       
         //envio los datos para la actualizacion del usario
         list= new FormData()
         list.append("accion","buscarUser")
         list.append("busqueda",e.target.value)
         list.append("filtro",fil)

         fetch("partes/procesoForm/list_usuario.php",{
         method: 'POST',
         body: list
         }).then(res=>res.json())
         .then(data=>{
            document.getElementById("list_resul").innerHTML=data.fila;
            document.getElementById("paginacion").innerHTML=data.paginacion;
        //    console.log(data);
         })
    }else{
        list_user()
    }
})

document.getElementById("btn-tip").addEventListener("click",function(e){
  input=document.getElementById("btn-buscar")
   input.value=""
   if(e.target.value !=undefined){

     input.placeholder="Buscar por " + e.target.value
     list_user()
   }
})


//paginacion parte
$(".pgina").on ("click","#pagUser",function(e)
{  
  fill=document.querySelector('input[name=tipoBus]:checked').value
  list= new FormData()
  list.append("accion","btn-paginacion")
  list.append("cantida",e.target.name)
  list.append("input",$("#btn-buscar").val())
  list.append("tipo",fill)
  
  fetch("partes/procesoForm/list_usuario.php",{
    method: 'POST',
    body: list
  }).then(res=>res.json())
  .then(data=>{
    // alert(data)
   document.getElementById("list_resul").innerHTML=data.fila;
  //  document.getElementById("paginacion").innerHTML=data.paginacion;
    
  })
   
})

// contrasena aleatoria
document.getElementById("btn_generarMob").addEventListener("click",function(){

    // alert("");
     gfg_Run()
    
  })
  function gfg_Run() {
    var el_down = document.getElementById("Apassw");
    el_down.value = 
                    Math.random().toString(36).slice(2) + 
                    Math.random().toString(36)
                        .toUpperCase().slice(2);
  
                        pas=document.getElementById("Apassw")
                        pas.classList.remove("is-invalid")
                         pas.classList.add("is-valid")
                } 
                

//funcion de alerta con opciones 
function alertOpt(titulo,mensaje,icono,accion,val1,val2){
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: icono,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, seguro!'
      }).then((result) => {
        if (result.isConfirmed) {
         //envio los datos para la actualizacion del usario
            list= new FormData()
            list.append("accion","estado")
            list.append("stC",val1)
            list.append("stV",val2)

            fetch("partes/procesoForm/list_usuario.php",{
            method: 'POST',
            body: list
            }).then(res=>res.json())
            .then(data=>{
          
                Swal.fire(
                  "Realizado",
                  'El usuario ya esta '+ accion,
                  'success'
                )
                list_user()
            })

        }
      })
}


//validaciones para actualizar datos del usuario 
validCampo("Anombre","keyup","letras")
validCampo("Aapellidos","keyup","letras")
validCampo("Acodigo","keyup","numero")
validCampo("Apassw","keyup","letrasynumeros")
validCampo("Apassw","change","letrasynumeros")
validCampo("Acorreo","keyup","correo")
validCampo("Ccosto","keyup","numero")
validCampo("AtiposUsuL","change","select")




function validCampo(nom,evento,tipo){
    document.getElementById(nom).addEventListener(evento,function(e)
    {
      // alert(e.target.value)
      if(tipo=="letras"){
            if(!/^[A-Za-zñ\s]+$/g.test(e.target.value)){
              e.target.classList.remove("is-valid")
              e.target.classList.add("is-invalid")
            }else{
              e.target.classList.remove("is-invalid")
              e.target.classList.add("is-valid")
  
            }
          
  
      }else if(tipo=="select"){
        if(e.target.value==0){
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
        if(!/^[A-Za-z 0-9.\s]+$/g.test(e.target.value)){
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


// Cargar la lista de usuarios en la tabla con esta funcion
function list_user(){
    list= new FormData()
    list.append("accion","list_usuario_table")
    list.append("cantida","5")
    
    fetch("partes/procesoForm/Registrar_usuario.php",{
      method: 'POST',
      body: list
    }).then(res=>res.json())
    .then(data=>{
     document.getElementById("list_resul").innerHTML=data;
      
    })

}

list_user()

///////////area de modificar usuario///////////////////
$("#list_resul").on ("click","#btn-modificar",function(e)
{   
    $('#mdMuser').modal('show');
     datos=e.target.value.split(",")
     document.getElementById("staticBackdropLabel").innerHTML=datos[2]+" "+datos[3]
     document.getElementById("Anombre").value=datos[2]
     document.getElementById("Aapellidos").value=datos[3]
     document.getElementById("Acodigo").value=datos[1]
     document.getElementById("Acorreo").value=datos[4]
     document.getElementById("img").setAttribute("src",datos[0] );
})
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

            fetch("partes/procesoForm/Registrar_usuario.php",{
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
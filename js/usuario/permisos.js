
/////////////////Cargar editor permisos/////////////////////////////////
$("#list_resul").on ("click","#btn-permisos",function(e)
{ 
    $("#lisPermisos").html("")
    inf=e.target.value.split(",")
    $("#TituloMdP").html("<small class='text-muted'>PERMISOS DEL CARNET:</small> "+inf[1])
    $("#nomCompleto").html("<b>NOMBRE: </b>"+inf[2].toUpperCase())
    $("#apellido").html("<b>APELLIDOS: </b>"+inf[3].toUpperCase())
    $("#tipoUsert").html("<b>CARGO: </b>"+inf[4].toUpperCase())
    document.getElementById("imgMdP").setAttribute("src",inf[0] );
    
    // solicito los permisos de usuario
    list= new FormData()
    list.append("accion","permisos")
    list.append("id",inf[1])
    fetch("partes/procesoForm/cargarPermisos.php",{
        method: 'POST',
        body: list
    }).then(res=>res.json())
    .then(data=>{
         $("#lisPermisos").html(data)
         })
         document.getElementById("permisoRgT").setAttribute("value", inf[1]);
         $('#mdPermiso').modal('show');
   })
        
//////////////////Envio datos y actualizo////////////////////////////
form = document.getElementById("Per")
form.addEventListener("submit", function(e){
    e.preventDefault()
    list= new FormData(form)
  
    list.append("accion","rgPermiso")
    list.append("id",inf[1])
    list.append("1registrar_usu",list.has("registrar_usu"))
    list.append("1list_usu",list.has("list_usu"))
    list.append("1conexion",list.has("conexion"))
    list.append("1mover_activos",list.has("mover_activos"))
    list.append("1list_movimiento_activo",list.has("list_movimiento_activo"))
    list.append("1regist_producto",list.has("regist_producto"))
    list.append("1mostr_producto",list.has("mostr_producto"))
    list.append("1regist_local",list.has("regist_local"))
    list.append("1mostr_local",list.has("mostr_local"))
    // for (const listt of list.entries()) {
    //     console.log(`${listt[0]}, ${listt[1]}`);
    //   }
    fetch("partes/procesoForm/ActualizarPermisos.php",{
        method: 'POST',
        body: list
    }).then(res=>res.json())
    .then(data=>{

        setTimeout(data.funcion,data.timer)
        setTimeout(data.recargar,data.timer2)
        // console.log(data);
         })

})

////////////////////alerta////////////////////////
function alerta(icono,title,text){
    Swal.fire({
                      
      icon: icono,
      title: title,
      text: text,
      showConfirmButton: false,
      timer: 2000
    })
  }

$("#navbarNav").on ("click","#btn-session",function(){
    alertas("Cerrar Session","Seguro que quiere cerrar session?","warning")

})

//funcion de alerta con opciones 
function alertas(titulo,mensaje,icono,){
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
            list.append("accion","CerrarSession")
            fetch("partes/procesoForm/Registrar_usuario.php",{
            method: 'POST',
            body: list
            }).then(res=>res.json())
            .then(data=>{
                
                    window.location.replace(data+"loguin.php");
                
          
            })

        }
      })
}

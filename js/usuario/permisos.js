
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
        
//  $("#lisPermisos").on ("click","#Rusu",function(e){
//         alert(e.target.checked);
        
//         })

////////////////////permisos value///////////////////////////////
document.getElementById("permisoRgT").addEventListener("click",function(e){
    // console.log(document.getElementById("Per"))
    form=document.getElementById("Per")
    list= new FormData(form)
    list.append("accion","permisos")
    list.append("id",inf[1])
    fetch("partes/procesoForm/ActualizarPermisos.php",{
        method: 'POST',
        body: list
    }).then(res=>res.json())
    .then(data=>{
        console.log(data);
         })
    // alert();
    
  })
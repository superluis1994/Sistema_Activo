formt=document.getElementById("Dbase")
formt.addEventListener("submit", function(e){
    e.preventDefault();
    datos= new FormData(formt);
    datos.append("accion","baseDatos")
    fetch('instalcion/procesos/instalarDb.php',{
        method: 'POST',
        body: datos
    }).then(res=>res.json())
    .then(data=>{
        alert(data);
    //     if(data=="error"){
            
    //         alert("error")
    //     }
    //     else if(data=="success"){
    //         alerta("success","Correcto","Registrado Correctamente")
    //         document.getElementById("btn-paso").innerHTML=" <a href='instalacion.php?pagina=paso2.php' class='btn btn-primary mt-4'>Siguiente</a>";
  
  
    //   }
    })

})

// formt=document.getElementById("crearUsa")
// formt.addEventListener("submit", function(e){
//     e.preventDefault();
//     datos= new FormData(formt);
//     datos.append("accion","crearAdmin")
//     fetch('instalcion/procesos/instalarDb.php',{
//         method: 'POST',
//         body: datos
//     }).then(res=>res.json())
//     .then(data=>{
//         alert(data);
//         if(data=="error"){
            
//             alert("error")
//         }
//         else if(data=="success"){
//             alerta("success","Correcto","Registrado Correctamente")
//             document.getElementById("btn-paso").innerHTML=" <a href='instalacion.php?pagina=paso2.php' class='btn btn-primary mt-4'>Siguiente</a>";
  
  
//       }
//     })

// })
// alert("usuario")
window.onload = function() {

    menu= new FormData();
    menu.append("accion","menu")
    fetch('partes/procesoForm/menu_usuario.php',{
        method: 'POST',
        body: menu
      }).then(res=>res.json())
        .then(data=>{
          if(data.accion=="si"){
            document.getElementById("navbarNav").innerHTML = data.menu
          }
        // console.log(data);
        })
}
// alert("permisos")
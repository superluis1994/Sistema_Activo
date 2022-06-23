// alert("usuario")
window.onload = function() {

    menu= new FormData();
    menu.append("accion","menu")
    fetch('partes/procesoForm/menu_usuario.php',{
        method: 'POST',
        body: menu
      }).then(res=>res.json())
        .then(data=>{
         document.getElementById("navbarNav").innerHTML = data
        // console.log(data);
        })
}
// alert("permisos")
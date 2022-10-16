///Cargar los campos en imputs
dat= new FormData()
dat.append("accion","cargar")
fetch("partes/procesoForm/perfilDatos.php",{
  method: 'POST',
  body: dat
}).then(res=>res.json())
.then(data=>{
    document.getElementById('correo').setAttribute('value',data['mail'])
    document.getElementById("img_visual").src = data['picture'];
})

///////////////////////enviardatos
document.getElementById('btn_update_perfil').addEventListener('click',function(){
var correo_val = val_email($('#correo').val()), img = $('#foto')
var correo = $('#correo').val() 
var warning1 =document.getElementById('msj_alert')
var notice = document.getElementById('alert1')

if(correo_val == "404"){
warning1.style.visibility="visible"
}else{
var bandera="";
if (img.val() == "") {
bandera="vacio";
}else{
bandera=img.prop('files')[0]
}
var datos = new FormData();
datos.append('accion','save')
datos.append('correo',correo)
datos.append('foto',bandera)

$.ajax({
url:'partes/procesoForm/perfilDatos.php',  
type: 'POST',
async: true,
contentType: false,
processData: false,
data:datos,
success:function(query){
  
if (query == '1') { 
     alerta('success','Cambios Realizados','Perfil Actualizado')}
else if(query=='2'){
    notice.style.visibility = "visible"
    setInterval(function(){ 
       notice.style.visibility = "hidden"
      }, 1900);

}else{alerta('error','No se pudo guardar cambios','Problema de conexio')}
},error: function(error){    alerta('error','Error','Sucedio un error al conectar');}

})

}
})


// envio de formulario
form=document.getElementById("form_nuev")
form.addEventListener("submit",function(e){
e.preventDefault();
if( document.getElementById("actual_pass").classList.contains("is-valid") &&
document.getElementById("nuev_pass").classList.contains("is-valid") &&
document.getElementById("Re_pass").classList.contains("is-valid") )
{
list= new FormData(form)
list.append("accion","CambioPasswd")

fetch("partes/procesoForm/perfilDatos.php",{
  method: 'POST',
  body: list
}).then(res=>res.json())
.then(data=>{
    if(data == "correcto"){
    alerta("success","Realizado","Se cambio correctamente es necesario que cierre session")
    document.getElementById("form_nuev").reset();
    $('.psW').removeClass("is-valid is-invalid")
    document.getElementById("msg").setAttribute("hidden","true");   
    $('#modal_pass_edit').modal('hide'); 

    }else if(data == "passwordM"){
        alerta("error","Error","La contraseña actual no coincide")
    }
 

})
}

})

// parte cerrar y limpiar
cerrar("cerrar","click")
cerrar("clos","click")
function cerrar(id,evento){
document.getElementById(id).addEventListener(evento,function(){
// $('#psW').val('');
document.getElementById("form_nuev").reset();
$('.psW').removeClass("is-valid is-invalid")
document.getElementById("msg").setAttribute("hidden","true");   
$('#modal_pass_edit').modal('hide'); 
})
}

// abrir modal de pass
$("#contedor_datos").on ("click","#passworEdit",function(e){

$('#modal_pass_edit').modal('show');  

})

document.getElementById("nuev_pass").addEventListener("keyup",function(e){

var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;

if(regex.test(e.target.value)){
// si cumple
e.target.classList.remove("is-invalid")
e.target.classList.add("is-valid")
// document.getElementById("msg").style.display="none"
document.getElementById("msg").setAttribute("hidden","true");

}else{
e.target.classList.remove("is-valid")
e.target.classList.add("is-invalid")
document.getElementById("msg").removeAttribute("hidden");

}
})

validContra("actual_pass","keyup");
validContra("actual_pass","change");
function validContra (id,evento){

document.getElementById(id).addEventListener(evento,function(e){
if(/^[A-Za-z 0-9$@$!%*?&\s]+$/g.test(e.target.value)){
// si cumple
e.target.classList.remove("is-invalid")
e.target.classList.add("is-valid")
// document.getElementById("msg").style.display="none"

}else{
e.target.classList.remove("is-valid")
e.target.classList.add("is-invalid")
}

})

}
/////////////////pasar foto
document.getElementById("foto").addEventListener("change", function() {
mostrar=document.querySelector("#img_visual")
archivos = document.querySelector("#foto").files
// Si no hay archivos salimos de la función y quitamos la imagen
if (!archivos || !archivos.length) {
$document.mostrar.src = "img/recursos/foto_default.jpg";
return;
}
// Ahora tomamos el primer archivo, el cual vamos a previsualizar
primerArchivo = archivos[0];
// Lo convertimos a un objeto de tipo objectURL
objectURL = URL.createObjectURL(primerArchivo);
// Y a la fuente de la imagen le ponemos el objectURL
mostrar.src = objectURL;
})

///////////////////////////
document.getElementById("Re_pass").addEventListener("keyup",function(e){

if(/^[A-Za-z 0-9$@$!%*?&\s]+$/g.test(e.target.value)){
// si cumple
if(e.target.value == $("#nuev_pass").val()){

e.target.classList.remove("is-invalid")
e.target.classList.add("is-valid")
}else{
e.target.classList.remove("is-valid")
e.target.classList.add("is-invalid")
}

}else{
e.target.classList.remove("is-valid")
e.target.classList.add("is-invalid")
}


})


///////////////alerta////////////////////
function alerta(icono,title,text){
Swal.fire({
          
icon: icono,
title: title,
text: text,
})
}
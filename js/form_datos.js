
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
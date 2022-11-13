datos= new FormData();
datos.append("accion","Tabla")
fetch('partes/procesoForm/Registrar_local.php',{
  method: 'POST',
  body: datos
}).then(res=>res.json())
  .then(data=>{
    document.getElementById("lis_local").innerHTML=data.fila;
    document.getElementById("pagination").innerHTML=data.paginacion;

  })

  $("#pagination").on ("click","#pag",function(e){
    alert(e.target.name)

  })

 $("#lis_local").on ("click","#btn_detalle",function(e){
 // alert('hola')
  alert(e.target.value)
 })

 $("#lis_local").on ("click","#btn-statu",function(e){
  // alert('hola')
   alert(e.target.value)
  })

  $("#lis_local").on ("click","#btn_update",function(e){
    // alert('hola')
     alert(e.target.value)
    })
 
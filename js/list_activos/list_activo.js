document.getElementById("opt").addEventListener("click", function(e) {
   document.getElementById("busqueda").setAttribute("hidden", true);
   document.getElementById("busquedaPer").removeAttribute("hidden")

})
document.getElementById("op1").addEventListener("click", function(e) {
    document.getElementById("busquedaPer").setAttribute("hidden", false);
    document.getElementById("busqueda ").removeAttribute("hidden")
    
 
 })
 document.getElementById("op2").addEventListener("click", function(e) {
    document.getElementById("busquedaPer").setAttribute("hidden", false);
    document.getElementById("busqueda").removeAttribute("hidden")
 
 })
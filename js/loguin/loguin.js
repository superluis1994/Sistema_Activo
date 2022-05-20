document.getElementById("codigo").addEventListener("keyup", function(e){
    if(!e.target.value == ""){
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")
        btnActivar()
    }else{
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")
        btnActivar()
    }
    
    })
document.getElementById("pass").addEventListener("keyup", function(e){
    if(/^[A-Za-z0-9@_ \s]+$/g.test(e.target.value)){
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")
        btnActivar()
    }else{
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")
        btnActivar()
    }
    })


function btnActivar(){

    if(document.getElementById("pass").classList.contains("is-valid") && 
    document.getElementById("codigo").classList.contains("is-valid")){

        document.getElementById("btn_loguin").disabled = false        

    }else{
        document.getElementById("btn_loguin").disabled = true  
    }
}


document.getElementById("btn_loguin").addEventListener("click", function(){
alert("loguin")

})
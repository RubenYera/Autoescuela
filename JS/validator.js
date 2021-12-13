document.addEventListener("load",function(){

    const campos = document.getElementsByClassName("campo");
    const btnEnviar = document.getElementById("Enviar");

    btnEnviar.onclick = function(ev){
        campos.array.forEach(element => {
            if(element.innerHtml==""){
                
                element.classList.add("Error");
                ev.preventDefault();
            }else{
                element.classList.remove("Error");
            }
        });
    }
})